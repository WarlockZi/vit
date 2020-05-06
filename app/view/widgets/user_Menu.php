<?php

namespace app\view\widgets;

use app\model\User;

class User_Menu
{
	public function __construct($user)
	{
		$rights = User::getRights($user);
		echo $this->toHtml($rights);
	}

	public function getOptions($rightId)
	{
		$str = "";
		$str .= in_array('3', $rightId) ? "<a class='admin' href='/adminsc'>Admin</a>" : "";
		$str .= in_array('1', $rightId) ?
			"<a class = 'test_edit' href='test/edit/1'>Ред. закрытые тесты</a>
			<a class = 'freetest_edit' href='/freetest/edit/41'>Ред. открытые тест</a>"
			: "";

		$str .= in_array('2', $rightId) ?
			"<a class = 'test' href='/test/1'>Закрытый тест</a>
			<a class = 'freetest' href='/freetest/41'>Открытый тест</a>"
			: "";

		$str .= "<a class='envelope' href='/test/contacts'>Напишите нам</a>
					<a class='logout' href='/user/logout' >Выход</a>";
		return $str;
	}


	public function toHtml($rights)
	{
		$content = "<div class='nav_user'>".
			"<a class='resume' href='/user/profile'>Редактировать свой профиль</a>" .
			$this->getOptions($rights) .
			"</div>";
		return $content;
	}
}

