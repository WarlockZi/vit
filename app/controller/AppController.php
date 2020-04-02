<?php

namespace app\controller;

use app\model\{User};
use app\core\Base\{View, Controller};

class AppController extends Controller
{
//	protected $list;

	public function __construct(array $route)
	{
		parent::__construct($route);
		$this->layout = 'vitex';
		View::setJsN("/public/build/mainIndex.js");
		View::setCssN("/public/build/mainIndex.css");
	}

	public function auth()
	{
		try {
			if (isset($_SESSION['id']) && !$_SESSION['id'] && $_SERVER['QUERY_STRING'] != '') { // REDIRECT на регистрацию, если запросили не корень
				throw new \Exception();
			} elseif (isset($_SESSION['id'])) {
				$user = User::getById($_SESSION['id']);

				if ($user === false) {
					$errors[] = 'Неправильные данные для входа на сайт';
				} elseif ($user === NULL) {
					$errors[] = 'Чтобы получить доступ, зайдите на рабочую почту, найдите письмо "Регистрация VITEX" и перейдите по ссылке в письме.';
				} else {
					$this->set(compact('user'));
				}
			} elseif (!isset($_SESSION['id'])) {
				header("Location:/user/login");
				$_SESSION['back_url'] = $_SERVER['QUERY_STRING'];
				exit();
			}
		} catch (\Exception $e) {
			header("Location:/user/login");
			$_SESSION['back_url'] = $_SERVER['QUERY_STRING'];
			exit();
		};
	}

}
