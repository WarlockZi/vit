<?php

namespace app\controller;

use app\core\App;
use app\core\Base\View;

class SearchController extends AppController
{

	public function actionIndex()
	{

		$q = empty($_GET['q']) ? mb_strtolower($_GET['term']) : mb_strtolower($_GET['q']);
		if (get_magic_quotes_gpc()) {
			$q = stripslashes($q);
		}
		$qSql = addslashes('%' . $q . '%');

		$sql = "SELECT alias, name, preview_pic FROM product WHERE name LIKE ? AND `act`= 'Y' LIMIT 10";
		$params = [$qSql];
		$arr = App::$app->product->findBySql($sql, $params);

		$result = array();
		foreach ($arr as $key => $value) {
				array_push($result, array(
					'pic' => $value['preview_pic'],
					'url' => $value['alias'],
					'value' => strip_tags($value['name'])));
		}
		$json = json_encode($result);

		header('Content-Type: application/json');
		exit($json);
	}
}
