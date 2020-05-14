<?php


namespace app\model;
use \app\core\Base\Model;

class Tag extends Model
{
	protected $table = 'tag';

	static function getAll()
	{
		$rights = \R::getAll("SELECT * FROM `{self::table}`");
		foreach ($rights as $right){
			$arr[$right['alias']] = $right;
		}
		return $arr;
	}
}