<?php


namespace app\model;


class Right
{
	private $table = 'right';

	static function getAll()
	{
		$rights = \R::getAll("SELECT * FROM `right`");
		foreach ($rights as $right){
			$arr[$right['alias']] = $right;
		}
		return $arr;ge
	}

}