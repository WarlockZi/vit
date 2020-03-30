<!DOCTYPE html>
<html>
<!--ADMIN-LAYOUT-->
<head>
	<meta name="robots" content="noindex,nofollow"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
	<link rel="preload" href='<? $this::getCSS(); ?>' as="style" onload="this.rel='stylesheet'" media="all">
	<link rel="preload" href="/pic/admin-mainmenu-items-bg.png" as="image"/>
	<link rel="preload" href="/pic/admin-mainmenu-items.png" as="image"/>
	<link rel="preload" href="/pic/header-big.png" as="image"/>
	<meta name="csrf-token" content=<?=$_SESSION['token']?>>
	<style>
		a {
			color: #2f2f2f;
		}
	</style>
</head>

<body class="column">
<header class='row'>

	<div class="header-tabs">
		<div>Сайт
			<a href="/"></a>
		</div>
		<div>Администирование</div>
	</div>

	<div class="clear-cache" title='очистить кэш'></div>

	<div class="user-menu">

                    <span class="FIO">
	                    <? $rightId = $user['rights'];
							  if (isset($user)) {
								  echo $user['surName'] . ' ' . $user['name'] . ' ' . $user['middleName'];
							  } ?>
                    </span>

		<div class="nav_user">
			<a href="/user/edit">Редактировать свой профиль</a>
			<?
			if (in_array('3', $rightId)):
				?>
				<a href="/adminsc">Admin</a>
			<? endif; ?>
			<? if (in_array('1', $rightId)): ?>
				<a href="test/edit/1">Ред. закрытые тесты</a>
				<a href="/freetest/edit/41">Ред. открытые тест</a>
			<? endif; ?>
			<? if (in_array('2', $rightId)): ?>
				<a href="/test/1">Закрытый тест</a>
				<a href="/freetest/41">Открытый тест</a>
			<? endif; ?>


			<? if (isset($user)): ?>
				<a href="/test/contacts">
					<span class="icon-envelope">✉ Напишите нам</span>
				</a>

				<a href="/user/logout">
					<svg width="16" height="8" xmlns="http://www.w3.org/2000/svg"
					     xmlns:svg="http://www.w3.org/2000/svg" viewBox="-5 0 16 8">
						<title>lock 1</title>
						<rect stroke="#e30000" stroke-opacity="0" id="svg_2" height="4.582587" width="4.582587"
						      y="3.349051" x="0.267697" stroke-linecap="null" stroke-linejoin="null"
						      stroke-dasharray="null" stroke-width="null" fill="#e30000"/>
						<path stroke="#e30000" fill-opacity="0" id="svg_17"
						      d="m0.813005,3.42179c0.127532,-4.291629 3.592734,-3.018688 3.527173,-1.091092"
						      stroke-linecap="null" stroke-linejoin="round" stroke-dasharray="null" fill="#e30000"/>
					</svg>
					Выход</a>
			<? endif; ?>
		</div>


	</div>


</header>


<div class="a-wrap row">


	<div class="a-menu column">

		<a href="/adminsc" class="module home"><span>Admin</span></a>
		<a href="/adminsc/catalog" class="module catalog"><span>Каталог</span></a>
		<a href="/adminsc/settings" class="module settings"><span>Настройки</span></a>
		<a href="/adminsc/crm" class="module crm"><span>CRM</span></a>
		<a href="#" class="module marketing"><span>Маркетинг</span></a>

	</div>


	<?= $content ?>


</div>

<div class="page-buffer"></div>

<footer></footer>

<script src="<? $this::getJS(); ?>"></script>


</body>
</html>