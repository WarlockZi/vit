<?php


namespace app\model;


use app\core\Base\Model;

class Right extends Model
{
	protected static $rightTable = 'right';

	static function getAll()
	{
		$d = self::$rightTable;
		$rights = \R::getAll("SELECT * FROM `{$d}`");
		foreach ($rights as $right){
			$arr[$right['alias']] = $right;
		}
		return $arr;
	}

}