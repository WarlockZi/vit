<?php

namespace app\controller;

use app\core\{App, Base\View};
use app\model\User;

//use app\core\Base\View;

class UserController extends AppController
{

	public function __construct($route)
	{
		parent::__construct($route);
	}

	public function actionContacts()
	{
		$this->auth();
		if (isset($_POST['token'])) {
			if ($_SESSION['token'] !== $_POST['token']) {
				echo $_POST['token'] . '  +  +  ' . $_SESSION['token'];
				exit('Обновите страницу.');
			}
		}
		View::setMeta('Задайте вопрос', 'Задайте вопрос', 'Задайте вопрос');
	}

	public function actionCabinet()
	{
		$this->auth(); // Авторизация

		if ($this->vars['user'] === false) {
			// Если пароль или почна неправильные - показываем ошибку
			$errors[] = 'Неправильные данные для входа на сайт';
		} elseif ($this->vars['user'] === NULL) {
			// Пароль почта в порядке, но нет подтверждения
			$errors[] = 'Чтобы получить доступ, зайдите на рабочую почту, найдите письмо "Регистрация VITEX" и перейдите по ссылке в письме.';
		} else {
			View::setMeta('Личный кабинет', 'Личный кабинет', '');
		}
	}

	public function actionLogin()
	{

		View::setJsN('/public/build/services.js');
		View::setCssN('/public/build/services.css');
		if ($data = $this->isAjax()) {

			$params['email'] = $email = (string)$data['email'];
			if (!App::$app->user->checkEmail($email)) {
				$msg[] = "Неверный формат email";
				exit(include ROOT . '/app/view/User/alert.php');
			}
			$params['password'] = $password = $data['pass'];
			if (!App::$app->user->checkPassword($password)) {
				$msg[] = "Пароль не должен быть короче 6-ти символов";
				exit(include ROOT . '/app/view/User/alert.php');
			}

			$user = User::getUserByEmail($params);

			if ($user === false) { // Почта с паролем существуют, но нет подтверждения
				// Нет пользователя с таким паролем
				$msg[] = "Пользователь с 'e-mail' : $email не зарегистрирован";
				$msg[] = "Перейдите по <a href = 'https://vitexopt.ru" . PROJ . "/user/register'>ССЫЛКЕ</a> чтобы зарегистрироваться.";
				exit(include ROOT . '/app/view/User/alert.php');
			} elseif ($user === NULL) {// Пароль, почта в порядке, но нет подтверждения
				$msg[] = 'Зайдите на <a href ="https://mail.vitexopt.ru/webmail/login/">РАБОЧУЮ ПОЧТУ</a>, найдите письмо "Регистрация VITEX" и перейдите по ссылке в письме.';
				echo include ROOT . '/app/view/User/alert.php';
				exit();
			} else {// Если данные правильные, запоминаем пользователя (в сессию)
				$user['rights'] = explode(",", $user['rights']);
				App::$app->user->setAuth($user);

				$this->set(compact('user'));
				$msg[] = "Все ок";
				$_SESSION['id'] = $user['id'];
				if (in_array('5', $user['rights'])) {
					exit ('Переходим в админку');
				} else {
					exit('в кабинет');
				}

			}
		}

		if (isset($_SESSION['id'])) {
//			$user = \R::load('user', $_SESSION['id']);
			$this->set(compact('user'));
		}

	}

	public function actionRegister()
	{

		if ($this->isAjax()) {

			[$email,$password,$confPass,$name,$surName,$secName] = $_POST;

			$email = $_POST['email'];
			$password = $_POST['password'];
			$confPass = $_POST['confPass'];
			$name = $_POST['name'];
			$surName = $_POST['surName'];
			$secName = $_POST['secName'];

			if ($msg = $this->regDataWrong($email, $password, $confPass, $name, $surName, $secName)) {
				echo include APP . '/view/User/alert.php';
				exit();
			}

			$password = md5($password);
			$hash = md5(microtime());

			$user = \R::dispense('user');
			$user->rightId = 2;
			$user->surName = $surName;
			$user->secName = $secName;
			$user->name = $name;
			$user->email = $email;
			$user->password = $password;
			$user->hash = $hash;
			$id = \R::store($user);

//			$sql = 'INSERT INTO users (rightId, surName, middleName, name, email, password, hash)'
//				. 'VALUES (,?,?,?,?,?,?,?)';
//			$params = [2, $surName, $secName, $name, $email, $password, $hash];
//
//			$res = App::$app->user->insertBySql($sql, $params);

			if (!$id) {
				$msg[] = "Ошибка при добавлении пользователя в базу данных";
				echo include APP . '/view/User/alert.php';
				exit();
			}

			$headers = "Content-Type: text/plain; charset=utf8";	// Все прошло гладко. Отправим почту.
//         $headers .= "From: Admin <admin@mail.ru> \r\n";
			$tema = "Регистрация VITEX";
			$mail_body = "Для продолжения работы перейдите по ссылке: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . PROJ . "/user/confirm?hash=" . $hash;
//         mail('', $tema, $mail_body, $headers);
			App::$app->user->send_mail($email, $tema, $mail_body, $headers);


			$msg[] = "Для подтвержения регистрации перейдите по ссылке в <br><a href ='https://mail.vitexopt.ru/webmail/login/'>ПОЧТЕ</a>.<br>Письмо может попасть в папку 'Спам'";
			echo include APP . '/view/User/alert.php';
			exit();
		}
		View::setMeta('Регистрация', 'Регистрация', 'Регистрация');

//		$token = $this->token;
//		$this->set(compact('token'));

		View::setCssN('/public/build/services.css');
		View::setJsN('/public/build/services.js');

	}

	public function regDataWrong($email, $password, $confPass, $name, $surName, $secName)
	{

		if (isset($_POST)) {

			$msg = [];
			if (empty($password)) {
				$msg[] = "Введите пароль.";
			}
			if (empty($email)) {
				$msg[] = "Введите адрес почтового ящика.";
			}
			if (!App::$app->user->checkEmail($email) && !empty($email)) {
				$msg[] = "Введите правильный адрес почтового ящика.";
			}
			if (empty($name)) {
				$msg[] = "Введите имя.";
			}
			if (empty($surName)) {
				$msg[] = "Введите фамилию.";
			}
			if (empty($secName)) {
				$msg[] = "Введите отчество.";
			}
			if ($confPass != $password) {
				$msg[] = "Вы не правильно подтвердили пароль";
			}
			// Если есть пользователь с таким email.
			if (App::$app->user->checkEmailExists($email)) {
				$msg[] = "Пользователь с таким e-mail уже существует<br>"
					. "Перейдите по ссылке, чтобы получить пароль на эту почту. <br>"
					. "<a href='" . PROJ . "/user/returnpass'>Забыли пароль</a>";
			}
			if ($msg) {//есть ошибки
				return $msg;
			}
		}
		return false;
	}

	public function actionLogout()
	{
		//очистить массив  $_SESSION
		$_SESSION = array();
		session_destroy();
		// Перенаправляем пользователя на главную страницу
		header("Location: /");
	}

	public function actionConfirm()
	{ // Забишем что пользователь подтвердил почту в базу данных
		// Получим id пользователя по hash
		try {
			$hash = App::$app->user->clean_data($_GET['hash']);
			if (!$hash) {
				throw new \Exception();
			}
		} catch (\Exception $e) {
			header('Location:/');
			exit();
		};

		if (!App::$app->user->confirm($hash)) {
			exit('Не удалось подтвердить почту');
		};
		$user = App::$app->user->getUserByHash($hash);
		// Сохраним id пользователя в сессии
		App::$app->user->setAuth($user);

		View::setMeta('Проверка почты', 'Почта пользователя проверена', 'проверка почты');

		$rightId = explode(",", $user['rights']);
		$js = $this->getJSCSS('.js');
		$this->set(compact('user', 'rightId'));

	}

	public function actionReturnPass()
	{

		$_SESSION['id'] = '';
		App::$app->user->returnPass();

		View::setMeta('Забыли пароль', 'Забыли пароль', 'Забыли пароль');
		$this->set(compact('user'));
	}


	public function actionEdit()
	{
		$this->auth(); // Авторизация $_SESSION['id']
		// Получаем идентификатор пользователя из сессии, если есть
		if (isset($_SESSION['id'])) {
			$userId = $_SESSION['id'];
		}
		// Получаем информацию о пользователе из БД
		$user = App::$app->user->getUser($userId);

		// Флаг результата
		$result = false;

		// Обработка формы
		if (isset($_POST['submit'])) { //нажали кнопку сохранить
			// Если форма отправлена
			// Получаем данные из формы редактирования

			$ff['table'] = 'users';
			$ff['pkey'] = 'id';
			$ff['pkeyVal'] = $user['id'];
			$ff['values']['email'] = App::$app->user->clean_data($_POST['email']);
			$ff['values']['name'] = App::$app->user->clean_data($_POST['name']);
			$ff['values']['surName'] = App::$app->user->clean_data($_POST['surName']);
			$ff['values']['middleName'] = App::$app->user->clean_data($_POST['middleName']);
			$ff['values']['birthDate'] = App::$app->user->clean_data($_POST['birthDate']);
			$ff['values']['phone'] = App::$app->user->clean_data($_POST['phone']);

			$errors = false;

			if (!App::$app->user->checkName(App::$app->user->clean_data($_POST['name']))) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}

			if ($errors == false) {
				// Если ошибок нет, сохраняет изменения профиля
				$result = App::$app->user->update($ff);
			}
			View::setMeta('Профиль', 'Профиль', 'Профиль');
//            $css = 'style.css';
//            $rightId = explode(",", $user['rights']);
			$this->set(compact('user', 'result', 'errors'));
		} else {// форма из базы данных
			$email = $user['email'];
			$name = $user['name'];
			$surName = $user['surName'];
			$middleName = $user['middleName'];
			$birthDate = $user['birthDate'];
			$phone = $user['phone'];
//            $password = $user['password'];

			View::setMeta('Профиль', 'Профиль', 'Профиль');
//         $rightId = explode(",", $user['rights']);
			$this->set(compact('user'));
		}
	}

}
