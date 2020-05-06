<?php

namespace app\controller;

use app\core\{App, Base\View};
use app\model\Adminsc;
use app\model\Mail;
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
            $email = (string)$data['values']['email'];
            $password = $data['values']['password'];
            $user = User::getByEmailAndPass($email, $password);
            if ($user === false) { // Почта с паролем существуют, но нет подтверждения
                $msg[] = "Пользователь с 'e-mail' : {$email} не зарегистрирован";
                $msg[] = "Перейдите по <a href = 'https://vitexopt.ru/user/register'>ССЫЛКЕ</a> чтобы зарегистрироваться.";
                exit(include ROOT . '/app/view/User/alert.php');
            } elseif ($user === NULL) {// Пароль, почта в порядке, но нет подтверждения
                $msg[] = 'Зайдите на <a href ="https://mail.vitexopt.ru/webmail/login/">РАБОЧУЮ ПОЧТУ</a>, найдите письмо "Регистрация VITEX" и перейдите по ссылке в письме.';
                exit(include ROOT . '/app/view/User/alert.php');
            } else {// Если данные правильные, запоминаем пользователя (в сессию)
                User::setAuth($user);
                $this->set(compact('user'));
                if (in_array('5', $user['rights'])) {
                    exit ('в админку');
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

         $headers = "From: Admin <admin@mail.ru> \r\n";
            $tema = "Регистрация VITEX";
            $mail_body = "Для продолжения работы перейдите по ссылке: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . "/user/confirm?hash=" . $user->hash;
         mail('', $tema, $mail_body, $headers);
//			App::$app->user->send_mail($user->email, $tema, $mail_body, $headers);
			Adminsc::email($user->email, $tema, $mail_body, $headers);

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
        $_SESSION['id'] = '';
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
        $this->auth();

        if ($data = $this->isAjax()) {
            $val = $data['values'];
            $user = \R::dispense('user');
            $user->id = $data['id'];
            $user->name = $val['name'];
            $user->surname = $val['surname'];
            $user->middlename = $val['middlename'];
            $user->birthdate = $val['birthdate'];
            $user->phone = $val['phone'];
            $user->email = $val['email'];
            $id = \R::store($user);
        }

        View::setJsN('/public/build/services.js');
        View::setCssN('/public/build/services.css');
        View::setMeta('Профиль', 'Профиль', 'Профиль');

//        if (isset($_SESSION['id'])) {
//            $userId = $_SESSION['id'];
//        }
//        $user = \R::findOne($this->table, 'id=?', [$userId]);
//
//
//        $this->set(compact('user'));
    }

    public function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        $msg[] = "Пароль не должен быть короче 6-ти символов";
        exit(include ROOT . '/app/view/User/alert.php');
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        $msg[] = "Неверный формат email";
        exit(include ROOT . '/app/view/User/alert.php');
    }
}
