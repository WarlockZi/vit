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
//      $str =  mysql_real_escape_string($str);
		return strip_tags(trim($str));

	}

	public function findAll($table, $sort = '')
	{
		$sql = "SELECT * FROM " . ($table ?: $this->table) . ($sort ? " ORDER BY {$sort}" : "");
		return $this->pdo->query($sql);
	}

	/**
	 * Получить строку из таблицы table по полю field, где id искомый параметр<br/>
	 * @param str $field <p>field поле, по которому ищем</p>
	 * @param integer $id <p>$id значение (по умолч - id)</p>
	 * @return array <p>строку таблицы</p>
	 */
	public function findOne($id, $field = '')
	{
		$field = $field ?: $this->pk;
		$sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
		$result = $this->pdo->query($sql, [$id]);
		return $result ? $result[0] : FALSE;
	}

	/**
	 * Получить строку из таблицы table по полю field, где id искомый параметр<br/>
	 * @param str $field <p>field поле, по которому ищем</p>
	 * @param integer $id <p>$id значение (по умолч - id)</p>
	 * @return array <p>строку таблицы</p>
	 */
	public function findWhere($id, $field, $table)
	{
		$table = $table ?: $this->table;
		$field = $field ?: $this->pk;
		$sql = "SELECT * FROM {$table} WHERE $field = ?";
		return $this->pdo->query($sql, [$id]);
	}

	/**
	 * Получить <br/>
	 * @param str $field <p>field поле, по которому ищем</p>
	 * @param integer $id <p>$id значение (по умолч - id)</p>
	 * @return array <p>строку таблицы</p>
	 */
	public function findBySql($sql, $params = [])
	{
		return $this->pdo->query($sql, $params);
	}

	public function insertBySql($sql, $params = [])
	{
		return $this->pdo->execute($sql, $params);
	}

	/**
	 * @param $table
	 * @param string $db
	 * @return mixed
	 */
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

	public function create($arr)
	{
		$values = $arr['values'];
		$table = $arr['table'];
		$vals = $arr['values'];
		$str = '';
		$vs = '';
		$valsCount = count($vals);
		$k = 1;
		$param = [];
		foreach ($values as $i => $val) {
			if ($k < $valsCount) {
				$str .= "`$i`,";
				$vs .= '?, ';
				$k++;
			} else {
				$str .= "`$i`";
				$vs .= '?';
			}
			array_push($param, $val);
		}
		$sql = "INSERT INTO {$table} ({$str}) VALUES ({$vs})";
		return $this->insertBySql($sql, $param);
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

//    public function updateShared($arr)
//    {
//        $category = \R::load('category', $arr['id']);
//        $prop = \R::load($arr['values']['shared']['table'], $arr['values']['shared']['id']);
//        $category->sharedPropList[] = $prop;
//        \R::store($category);
//    }

	public function updateShared($arr)
	{
		$host = $arr['table'];
		$shared = $arr['values']['shared']['table'];

		$hostEl = \R::load("{$host}", $arr['id']);
		$action = 'shared' . ucfirst($shared) . 'List';

		foreach ($arr['values']['shared']['ids'] as $id) {
			$sharedEL = \R::load($arr['values']['shared']['table'], $id);
			$hostEl->$action[] = $sharedEL;
			\R::store($hostEl);
		}
	}

	public function updateOwn($arr)
	{
		$table = $arr['table'];
		$pkey = $arr['pkey'];
		$pkeyVal = $arr['pkeyVal'];
		$vals = $arr['values'];
		$valsCount = count($vals);
		$str = '';
		$param = [];
		$k = 1;
		foreach ($vals as $i => $val) {
			if ($k < $valsCount) {
				$str .= "`$i`" . '= ?, ';
				$k++;
			} else {
				$str .= "`$i`" . '= ?';
			}
			array_push($param, $val);
		}
		$sql = "UPDATE `{$table}` SET {$str} WHERE `{$pkey}` = ?";
		array_push($param, $pkeyVal);
		if ($this->insertBySql($sql, $param)) {
			return true;
		}
		return 'Видимо, ошибка в запросе!';
	}

	/**
	 * @param $arr [table]
	 * @param $arr [pkey]
	 * @param $arr [pkeyVal]
	 * @param $arr [values]
	 * @return bool|string
	 */
	public function update($arr)
	{
		if (isset($arr['values']['shared'])) {
			$this->updateShared($arr);
		} else {
			$this->updateOwn($arr);
		}


	}

}
