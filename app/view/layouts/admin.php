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
	<meta name="token" content=<?=$_SESSION['token']?>>
	<style>
		a {
			color: #2f2f2f;
		}
	</style>
</head>

<body>
<header>

	<div class="header-tabs">
		<div>Сайт
			<a href="/"></a>
		</div>
		<div>Администирование</div>
	</div>

	<div class="clear-cache" title='очистить кэш'></div>

	<div class="user-menu">

                    <span class="FIO">
	                    <? use app\view\widgets\User_Menu;
	                    $rightId = $user['rights'];
							  if (isset($user)) {
								  echo $user['surname'] . ' ' . $user['name'] . ' ' . $user['middlename'];
							  } ?>
                    </span>

		<? new User_Menu($user);?>

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