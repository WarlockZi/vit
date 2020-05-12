<?php

namespace app\core\Base;

use app\core\DB;
use app\core\App;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Model
{

	protected $pdo;
	protected $sql;
	protected $table;
	protected $pk = 'id'; // Конвенция Первичный ключ по умолчанию будет 'id', но можно его переопределить

	public function __construct()
	{
		$this->pdo = DB::instance();
	}

	function multi_implode($glue, $array)
	{
		$_array = array();
		foreach ($array as $val)
			$_array[] = is_array($val) ? $this->multi_implode($glue, $val) : $val;
		return implode($glue, $_array);
	}

	public function clean_data($str)
	{
		return strip_tags(trim($str));
	}

	public function findOne($id, $field = '')
	{
		$field = $field ?: $this->pk;
		$sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
		$result = $this->pdo->query($sql, [$id]);
		return $result ? $result[0] : FALSE;
	}


	public function findWhere($id, $field, $table)
	{
		$table = $table ?: $this->table;
		$field = $field ?: $this->pk;
		$sql = "SELECT * FROM {$table} WHERE $field = ?";
		return $this->pdo->query($sql, [$id]);
	}


	public function findBySql($sql, $params = [])
	{
		return $this->pdo->query($sql, $params);
	}

	public function insertBySql($sql, $params = [])
	{
		return $this->pdo->execute($sql, $params);
	}


	public function autoincrement($table, $db = 'vitex_test')
	{
		$params = [$db, $table];
		$sql = "SHOW TABLE STATUS FROM vitex_test LIKE '$table'";
		return $this->pdo->query($sql, $params)[0]['Auto_increment'];
	}

	static function removeDirectory($dir)
	{
		if ($objs = glob($dir . "/*")) {
			foreach ($objs as $obj) {
				is_dir($obj) ? rmdir($obj) : unlink($obj);
			}
		}
		return rmdir($dir);
	}

	public function getBreadcrumbs($category, $parents, $type)
	{
		if ($type == 'category') {
// в parents массив из адресной строки - надо получить aliases
			foreach ($parents as $key) {
				$params = [$key['name']];
				$sql = 'SELECT * FROM category WHERE name = ?';
//если это категория, а ее не нашли вернем 404  ошибку
				if ($arrParents[] = $this->findBySql($sql, $params)[0]) {

				} else {
					http_response_code(404);
					include '../public/404.html';
					exit();
				}
			}
		}
		$breadcrumbs = "<a href = '/'>Главная</a>";
		if ($type == 'category') {
			foreach ($parents as $parent) {
				$breadcrumbs .= "<a  data-id = {$parent['id']} href = '/{$parent['alias']}'>{$parent['name']}</a>";
			}
			return $breadcrumbs . "<span data-id = {$category['id']}>{$category['name']}</span>";
		} else {
			$parents = array_reverse($parents);
			foreach ($parents as $parent) {
				$breadcrumbs .= "<a  data-id = {$parent['id']} href = '/{$parent['alias']}'>{$parent['name']}</a>";
			}
			return $breadcrumbs . "<span data-id = {$category['id']}>{$category['name']}</span>";
		}
	}

	protected function hierachy()
	{
		$tree = [];
		$data = $this->data;
		foreach ($data as $id => &$node) {
			if (isset($node['parent']) && !$node['parent']) {
				$tree[$id] = &$node;
			} elseif (isset($node['parent']) && $node['parent']) {
				$data[$node['parent']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}

	public function getAssoc($table)
	{
		$params = array();
		$res = App::$app->{$table}->findBySql($this->sql, $params);

		if ($res !== FALSE) {
			$all = [];
			foreach ($res as $key => $v) {
				$all[$v['id']] = $v;
			}
			return $all;
		}
		return false;
	}

	public function create($arr)
	{
		unset($arr['values']['shared']);
		$bean = \R::dispense($arr['table']);
		foreach ($arr['values'] as $key => $v) {
			if ($key == 'password') {
				$v = md5($v);
			}
			$bean->{$key} = $v;
		}
		$id = \R::store($bean);

	}

	public function read($arr)
	{
		return \R::load($arr['table'], $arr['id']);
	}

	public function delete($arr)
	{
		$table = $arr['table'];
		$field = $arr['field'];
		$id = $arr['id'];
		$val = $arr['val'];
		$param = [$table, $field, $id];
		$sql = "DELETE FROM ? WHERE  ? = ?";
		return $this->insertBySql($sql, $param);
	}

	public function update($arr)
	{
		$errorOwn = $this->updateOwn($arr);
		if (isset($arr['values']['shared'])) {
			$errorShared = $this->updateShared($arr);
		}
		return ($errorOwn * $errorShared) ? false : true;
	}

	public function updateShared($arr)
	{
		$host = $arr['table'];
		$hostEl = \R::load("{$host}", $arr['id']);
		$error = 1;
		foreach ($arr['values']['shared'] as $shTable => $ids) {
			$action = 'shared' . ucfirst($shTable) . 'List';
			$hostEl->$action = [];
			foreach ($ids as $id) {
				$sharedEL = \R::load($shTable, $id);
				$hostEl->$action[] = $sharedEL;
			}
			$error = $error * \R::store($hostEl);
		}
		return $error;
	}

	public function updateOwn($arr)
	{
		unset($arr['values']['shared']);
		$b = \R::load($arr['table'], $arr['id']);
		foreach ($arr['values'] as $name => $val) {
			$b->{$name} = $val;
		}
		return \R::store($b);
	}
}
