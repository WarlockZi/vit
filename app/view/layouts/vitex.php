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
	<meta name="token" content=<?= $_SESSION['token'] ?>>
	<link rel="canonical" href="/<?= isset($vars['canonical']) ? $vars['canonical'] : '' ?>"/>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
	<link rel="preload" href="/pic/header-big.png" as="image"/>
	<link rel="preload" href="/pic/logo-square.svg" as="image"/>
	<link rel="preload" href="/pic/logo-vitex.svg" as="image"/>
	<link rel="preload" href="/pic/0serv/icons8-contacts-50.svg" as="image"/>
	<!--	<link rel="preload" href="/pic/user.svg" as="image"/>-->
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
			max-width: 970px;
			margin: 0 auto;
			z-index: 3;
			display: flex;
			align-items: center;
			justify-content: flex-end;
		}

		.top-menu a {
			font: normal 14px 'Verdana';
			text-decoration: none;
		}

		.nav_user {
			min-width: 230px;
		}

		.user-menu-wrap {
			color: #fff0;
			align-self: stretch;
			margin: 0;
		}

		.FIO {
			display: none;
			align-items: center;
			padding-right: 10px;
			font-size: 8px;
		}

		main {
			max-width: 970px;
			margin: auto;
		}

		.nav, nav, .logo-square {
			display: none;
		}

		.inner-wrap {
			max-width: 970px;
			margin: 0 auto;
		}

		.h-upper {
			position: relative;
		}

		.logo-vitex {
			width: 155px;
		}

		.logo-wrap {
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 13px;
			position: relative;
			flex: 3;
			flex-wrap: wrap;
		}

		.logo-wrap img {
			padding: 10px;
		}

		.logo-wrap div {
			width: 100px;
			font: 100 .7rem/.8rem sans-serif;

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

<div class="top-menu"></div>


<header>
	<div class="inner-wrap" itemscope itemtype="http://schema.org/Organization">
		<div class='h-upper'>

			<div class="top-menu-wrap">

				<div class="burger-wrap">
						<img src="/pic/0serv/icons8-menu-50.svg" alt="burger" class="burger img-svg">
				</div>

				<div class="logo-wrap">
					<?= !($this->route['action'] == "index" && $this->route['controller'] == "Main") ? "<a href = '/' aria-label = 'На главную'>" : "" ?>
					<img src="/pic/logo-square.svg" class="logo-square" alt="logo  медицицинские расходные материалы">
					<img src="/pic/logo-vitex.svg" class="logo-vitex" alt="vitex медицицинские расходные материалы">
					<?= !($this->route['action'] == "index" && $this->route['controller'] == "Main") ? "</a>" : "" ?>
					<div>медицинские расходные материалы оптом</div>
				</div>

				<div class="actions-wrap">
					<div class="find-wrap">
						<img class="img-svg find" src="/pic/0serv/icons8-search-50.svg" alt="">
						<!--						<div class="find"></div>-->
					</div>

					<div class="user-menu-wrap">
						<? if (isset($user)): ?>
							<img class="img-svg account" src="/pic/0serv/icons8-contacts-50.svg" alt="">
							<span class="FIO">
	                    <?= $user['surname'] . ' ' . $user['name'] . ' ' . $user['middlename']; ?>
                    </span>
							<? new app\view\widgets\User_Menu($user); ?>
						<? else: ?>
							<?= "<a href='/user/login'>".
						"<img class='img - svg account' src='/pic/0serv/icons8-contacts-50.svg' alt=''>".
							"</a>"; ?>
						<? endif; ?>

					</div>

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
</header>

<?= $content ?>


<div class="page-buffer"></div>
<footer>

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