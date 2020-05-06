<?php

namespace app\controller;

use app\core\{App, Base\View};
use app\model\{User, Catalog};

class MainController Extends AppController
{

	public function __construct($route)
	{
		parent::__construct($route);
	}

	public function actionIndex()
	{
		if (isset($_SESSION['id']) && $_SESSION['id']) {
			$user = \R::findOne('user', 'id=?',[($_SESSION['id'])]);
			$user['rights'] = User::getRights($user);
			$this->set(compact('user'));
		}

		$sale = App::$app->cache->get('sale');
		if (!$sale) {
			$sale = App::$app->product->getSale();
			App::$app->cache->set('sale', $sale, 30);
		}
		$this->set(compact('sale'));

		View::setMeta('Медицинские расходные материалы', 'Доставим медицинские расходные материалы в любую точку России', 'медицинские расходные материалы, доставка, производство, по России');
	}

	public function actionPoliticaconf()
	{
	}

	public function actionDiscount()
	{
	}

	public function actionDelivery()
	{
	}

	public function actionPayment()
	{
	}

	public function actionContacts()
	{
	}

	public function actionOferta()
	{
	}

	public function actionAbout()
	{
	}

	public function actionReturn_change()
	{
	}

	public function actionArticles()
	{
	}

}
