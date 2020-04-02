<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="MobileOptimized" content="320">
	<meta name="ROBOTS" CONTENT="INDEX, FOLOOW">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="yandex-verification" content="003253e624aad5b6"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="token" content=<?=$_SESSION['token']?>>
	<link rel="canonical" href="/<?= isset($vars['canonical']) ? $vars['canonical'] : '' ?>"/>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
	<link rel="preload" href="/pic/header-big.png" as="image"/>
	<link rel="preload" href="/pic/logo-square.svg" as="image"/>
	<link rel="preload" href="/pic/logo-vitex.svg" as="image"/>
	<link rel="preload" href="/pic/user.svg" as="image"/>
	<? $this::getMeta(); ?>
	<link rel="preload" href='<? $this::getCSS(); ?>' as="style" onload="this.rel='stylesheet'" media="all">
	<style>
		body {
			margin: 0;
			overflow-x: hidden;
			overflow-y: scroll;
			font-family: 'Roboto', sans-serif;
			color: #4e4e4e;
		}

		body *::selection {
			background: rgba(0, 0, 0, 0);
		}

		a, p {
			color: #4e4e4e;
			text-decoration: none;
		}


		.top-menu {
			/*background: #4e4e4e;*/
			background: #fff;
			position: fixed;
			width: 100%;
			top: 0;
			z-index: 7;
		}

		.top-menu-wrap {
			height: auto;
			max-width: 970px;
			margin: 0 auto;
			top: 0;
			z-index: 3;
			display: flex;
			align-items: center;
			justify-content: flex-end;
		}

		.top-menu a {
			font: normal 14px 'Verdana';
			text-decoration: none;
			/*padding: 0 10px;*/
		}

		.user-menu {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			/*border: 1px solid transparent;*/
			height: 100%;
			position: relative;
		}

		.user-menu {
			padding: 14px 14px;
			margin: 6px 6px;
			display: flex;
			flex: 1;
			background: url(/pic/user.svg) no-repeat
		}

		.FIO {
			display: flex;
			align-items: center;
			padding-right: 10px;
			font-size: 8px;
		}

		main {
			max-width: 970px;
			margin: auto;
		}

		#burger-button, .nav, nav, .logo-square {
			display: none;
		}

		.inner-wrap {
			max-width: 970px;
			margin: 0 auto;
			padding-bottom: 3px;
		}


		.h-upper {
			padding: 12px 0 10px 0;
			position: relative;
		}

		.logo-vitex {
			width: 177px;
		}

		.logo-wrap {
			display: flex;
			align-items: center;
			/*min-width: 400px;*/
			font-size: 13px;
			position: relative;
			flex: 3;
			flex-wrap: wrap;
		}

		.logo-wrap img {
			padding: 10px 10px 0 0;
		}

		.logo-wrap span {
			width: 206px;
			font: 100 1.1rem/1.5rem sans-serif;
			display: flex;
			align-items: center;
			padding-top: 6px;
		}

		.swiper-slide {
			width: 25%;
			margin-right: 30px;
		}

		.swiper-slide img {
			height: 240px;
		}
	</style>
</head>

<body class="column">

<div class="top-menus">

</div>


<header>
	<div class="inner-wrap" itemscope itemtype="http://schema.org/Organization">
		<div class='h-upper'>

			<div class="top-menu-wrap">
				<div class="logo-wrap">
					<?= !($this->route['action'] == "index" && $this->route['controller'] == "Main") ? "<a href = '/' aria-label = 'На главную'>" : "" ?>
					<img src="/pic/logo-square.svg" class="logo-square" alt="logo  медицицинские расходные материалы">
					<img src="/pic/logo-vitex.svg" class="logo-vitex" alt="vitex медицицинские расходные материалы">
					<?= !($this->route['action'] == "index" && $this->route['controller'] == "Main") ? "</a>" : "" ?>
					<span>медицинские расходные материалы оптом</span>
				</div>
				<div class="header-actions-wrap">
					<input id="burger-button" type="checkbox">
					<label id="burger-label" for="burger-button"><span></span></label>
					<nav id="burger-menu">
						<div class="wrap column">
							<a class="item" href="/perchatki-rezinovye-tekhnicheskie">перчатки</a>
							<a class="item" href="/about/payment">бахилы</a>
							<a class="item" href="/about/payment">сиз</a>
							<a class="item" href="/about/payment">шприцы</a>
							<hr>
							<a class="item" href="/about/payment">акции</a>
							<a class="item" href="/about/payment">ОПЛАТА</a>
							<a class="item" href="/about/delivery">ДОСТАВКА</a>
							<a class="item" href="/about/return_change">ВОЗВРАТ И ОБМЕН</a>
							<a class="item" href="/about/discount">СИСТЕМА СКИДОК</a>
							<hr>
							<a class="item" href="/about/contacts">Контакты</a>
							<a class="item" href="/about/contacts">СТАТЬИ</a>
							<a class="item" href="/about/contact-us">✉ Напишите нам</a>
						</div>
					</nav>

					<span class="find"></span>
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
<!--					<div class="user-menu">-->
<!--						--><?// if (!isset($user)): ?>
<!--							<a href="/user/login" aria-label="login">-->
<!--								<div class="icon"></div>-->
<!--							</a>-->
<!--						--><?// else: ?>
<!--							<div class="icon"></div>-->
<!---->
<!--							<span class="FIO">-->
<!--                    --><?//= $user['surName']; ?>
<!--                    <br>-->
<!--                    --><?//= $user['name']; ?>
<!--								--><?//= $user['middleName']; ?>
<!--                </span>-->
<!---->
<!--							<div class="nav column">-->
<!--								<a href="/user/edit">Редактировать свой профиль</a>-->
<!--								--><?//=
//								in_array('1', $user['rights']) ? // редактировать
//									'<a href="/edit/1">Редактировать тесты</a>
//                      <a href="/freetest/edit/41">Редактировать свободный тест</a>' : ''
//								?>
<!--								--><?//=
//								in_array('2', $user['rights']) ? // проходить
//									'<a href="/test/1">Проходить тесты</a>
//                         <a href="/freetest/41">Свободный тест</a>' : '';
//								?>
<!---->
<!--								--><?//=
//								in_array('3', $user['rights']) ?
//									'<a href="/adminsc">Admin</a>' : ''; // Admin
//								?>
<!---->
<!--								--><?// if (isset($user)): ?>
<!--									<a href="/user/logout" aria-label="logout">-->
<!--                            <span class="icon-logout">-->
<!--                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="20"-->
<!--                                   viewBox="0 0 20 20">-->
<!--                              <path fill='#e30000'-->
<!--                                    d="M4 8v-2c0-3.314 2.686-6 6-6s6 2.686 6 6v0h-3v2h4c1.105 0 2 0.895 2 2v0 8c0 1.105-0.895 2-2 2v0h-14c-1.105 0-2-0.895-2-2v0-8c0-1.1 0.9-2 2-2h1zM9 14.73v2.27h2v-2.27c0.602-0.352 1-0.996 1-1.732 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.736 0.398 1.38 0.991 1.727l0.009 0.005zM7 6v2h6v-2c0-1.657-1.343-3-3-3s-3 1.343-3 3v0z"></path>-->
<!--                              </svg>-->
<!--                            </span>Выход</a>-->
<!--								--><?// endif; ?>
<!--							</div>-->
<!--						--><?// endif; ?>
<!---->
<!--					</div>-->
				</div>


			</div>

			<div class="search-wrap">

				<input id="autocomplete" type="text" placeholder="Поиск" name="q" value="" size="15"
				       maxlength="15" autocomplete="off" aria-label="поиск"
				       onkeyup="autoComplete(this.value)">

				<div class="result-search"></div>

			</div>

		</div>

	</div>
</header>

<?= $content ?>


<div class="page-buffer"></div>
<footer class='column'>

	<div class="row">
		<div class="column">
			<a href="/about/contacts" nofollow noindex>Контакты</a>
			<a href="/about/requisites" nofollow noindex>Реквизиты</a>

		</div>
		<div class="column">
			<a href="#">Новости</a>

		</div>
		<div class="column">
			<a href="/about/return_change" nofollow noindex>Возврат и обмен</a>
			<a href="/about/politicaconf" nofollow noindex>Политика конфиденциальности</a>
			<a href="/about/oferta" nofollow noindex>Оферта</a>


		</div>

	</div>
	<div class="row">
		<p>© <? echo date('Y') ?> Витекс. Цены, указанные на сайте, не являются публичной офертой, определяемой
			положением Статьи 437 (2) ГК РФ и зависят от объема заказа. ОГРН:1173525018292</p>
		<p>Created by VORONIKLAB</p>
	</div>
</footer>


</div>


<!--</div>-->

<!-- Yandex.Metrika counter -->
<!--<script defer>-->
<!--    (function (m, e, t, r, i, k, a) {-->
<!--        m[i] = m[i] || function () {-->
<!--            (m[i].a = m[i].a || []).push(arguments)-->
<!--        };-->
<!--        m[i].l = 1 * new Date();-->
<!--        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)-->
<!--    })-->
<!--    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");-->
<!---->
<!--    ym(7715905, "init", {-->
<!--        clickmap: true,-->
<!--        trackLinks: true,-->
<!--        accurateTrackBounce: true,-->
<!--        webvisor: true-->
<!--    });-->
<!--</script>-->
<!--<noscript>-->
<!--	<div><img src="https://mc.yandex.ru/watch/7715905" style="position:absolute; left:-9999px;" alt=""/></div>-->
<!--</noscript>-->
<!-- /Yandex.Metrika counter -->
<script src="<? $this::getJS(); ?>"></script>
</body>
<div id="call"></div>
</html>