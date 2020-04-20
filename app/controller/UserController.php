<?php

namespace app\controller;

use app\core\{App, Base\View};
use app\model\User;

class UserController extends AppController
{
	public $table = 'user';

	public function __construct($route)
	{
		parent::__construct($route);
	}

	public function actionContacts()
	{
		View::setMeta('Задайте вопрос', 'Задайте вопрос', 'Задайте вопрос');
	}

	public function actionCabinet()
	{
		$this->auth(); // Авторизация
		View::setMeta('Личный кабинет', 'Личный кабинет', '');
	}

	public function actionLogin($msg)
	{
		View::setJsN('/public/build/services.js');
		View::setCssN('/public/build/services.css');
		if ($data = $this->isAjax()) { //accesed from form trying to login
			$params['email'] = $email = (string)$data['email'];
			$params['password'] = $password = $data['pass'];
			$this->checkEmail($email);
			$this->checkPassword($password);
			$user = User::getByEmailAndPass($params);
			if ($user === false) { // Почта с паролем существуют, но нет подтверждения
				$msg[] = "Пользователь с 'e-mail' : {$email} не зарегистрирован";
				$msg[] = "Перейдите по <a href = 'https://vitexopt.ru/user/register'>ССЫЛКЕ</a> чтобы зарегистрироваться.";
				exit(include ROOT . '/app/view/User/alert.php');
			} elseif ($user === NULL) {// Пароль, почта в порядке, но нет подтверждения
				$msg[] = 'Зайдите на <a href ="https://mail.vitexopt.ru/webmail/login/">РАБОЧУЮ ПОЧТУ</a>, найдите письмо "Регистрация VITEX" и перейдите по ссылке в письме.';
				exit(include ROOT . '/app/view/User/alert.php');
			} else {// Если данные правильные, запоминаем пользователя (в сессию)
				$user['rights'] = User::getRights($user);
				User::setAuth($user);
				$this->set(compact('user'));
				if (in_array('5', $user['rights'])) {
					exit ('Переходим в админку');
				} else {
					exit('в кабинет');
				}
			}
		}

		if (isset($_SESSION['id']) && $_SESSION['id'] != 0) { //accesed directly
			$user = \R::load('user', $_SESSION['id']);
			$this->set(compact('user'));
		}

	}

	public function actionRegister()
	{
		if ($data = $this->isAjax()) {
			$values = $data['values'];

			if (User::emailExists($values['email'])) {
				exit('email occupied');
			}

			$user = \R::dispense('user');
			$user->email = $values['email'];
			$user->password = md5($values['password']);
			$user->hash = md5(microtime());
			$right = \R::findOne('right', 'id = 2');
			$user->sharedRightList[] = $right;
			$id = \R::store($user);

//         $headers .= "From: Admin <admin@mail.ru> \r\n";
			$tema = "Регистрация VITEX";
			$mail_body = "Для продолжения работы перейдите по ссылке: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . "/user/confirm?hash=" . $hash;
//         mail('', $tema, $mail_body, $headers);
//			App::$app->user->send_mail($email, $tema, $mail_body, $headers);
//
			return false;
		}

//            $msg[] = "Для подтвержения регистрации перейдите по ссылке в <br><a href ='https://mail.vitexopt.ru/webmail/login/'>ПОЧТЕ</a>.<br>Письмо может попасть в папку 'Спам'";
//            echo include APP . '/view/User/alert.php';
//            exit();
		View::setMeta('Регистрация', 'Регистрация', 'Регистрация');
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
		$_SESSION = array();
		session_destroy();
		header("Location: /");
	}

	public function actionConfirm()
	{
		try {
			$hash = App::$app->user->clean_data($_GET['hash']);
			if (!$hash) {
				throw new \Exception();
			}
		} catch (\Exception $e) {
			header('Location:/');
			exit();
		};

		if (!User::confirm($hash)) {
			exit('Не удалось подтвердить почту');
		};
		$user = User::getUserByHash($hash);
		// Сохраним id пользователя в сессии
		App::$app->user->setAuth($user);

		View::setMeta('Проверка почты', 'Почта пользователя проверена', 'проверка почты');

		$this->set(compact('user', 'rightId'));
		View::setJsN('/public/build/services.js');
		View::setCssN('/public/build/services.css');

	}

	public function actionForgot()
	{
		$_SESSION['id'] = '';
		App::$app->user->returnPass();
		View::setMeta('Забыли пароль', 'Забыли пароль', 'Забыли пароль');
		View::setJsN('/public/build/services.js');
		View::setCssN('/public/build/services.css');
	}


	public function actionProfile()
	{
		View::setJsN('/public/build/services.js');
		View::setCssN('/public/build/services.css');
		View::setMeta('Профиль', 'Профиль', 'Профиль');

		$this->auth();

		if (isset($_SESSION['id'])) {
			$userId = $_SESSION['id'];
		}
		$user = \R::findOne($this->table, $userId);

		$result = false;

		if (isset($_POST['submit'])) { //нажали кнопку сохранить

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
				$result = App::$app->user->update($ff);
			}

			$this->set(compact('user', 'result', 'errors'));
		} else {// форма из базы данных

			$this->set(compact('user'));
		}
	}

	/**
	 * Проверяет имя: не меньше, чем 6 символов
	 * @param string $password <p>Пароль</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public function checkPassword($password)
	{
		if (strlen($password) >= 6) {
			return true;
		}
		$msg[] = "Пароль не должен быть короче 6-ти символов";
		exit(include ROOT . '/app/view/User/alert.php');
//		return false;
	}

	/**
	 * Проверяет email
	 * @param string $email <p>E-mail</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		$msg[] = "Неверный формат email";
		exit(include ROOT . '/app/view/User/alert.php');
//		return false;
	}
}
