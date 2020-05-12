<?php


namespace app\model;


class Right
{
	private $table = 'right';

	static function getAllRights()
	{
		$rights = \R::getAll("SELECT * FROM `right`");
		foreach ($rights as $right){
			$arr[$right['alias']] = $right;
		}
		return $arr;
	}

}