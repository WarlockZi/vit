<?php


namespace app\model;


class Right
{
	protected $table = 'right';

	static function getAll()
	{
		$rights = \R::getAll("SELECT * FROM {self::table");
		foreach ($rights as $right){
			$arr[$right['alias']] = $right;
		}
		return $arr;
	}

}