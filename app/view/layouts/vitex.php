<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="cleartype" content="on">
	<meta name="MobileOptimized" content="320">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="yandex-verification" content="003253e624aad5b6"/>
	<link rel="canonical" href="/<?= isset($vars['canonical']) ? $vars['canonical'] : '' ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">-->
	<!--	<link rel="preload" href="/public/css/fonts/intro.woff2" as="font" crossorigin="anonymous" />-->
	<!--	<link rel="preload" href="/node_modules/swiper/css/swiper.css" as="style" crossorigin="anonymous" />-->
	<!--	<link rel="preload" href="/pic/header-big.png" as="image" crossorigin="anonymous" />-->
	<? $this::getMeta(); ?>
	<!--	--><? // $this::getCSS(); ?>
	<link rel="preload" href='/public/build/mainIndex.css' as="style" onload="this.rel='stylesheet'" media="all">

</head>


<body>

<div class="row">
	<input name="toggle-button" type="checkbox" id="toggle-button">
	<label id="toggle-label" for="toggle-button">☰</label>

	<nav id="menu" class="transition">
		<div class="menu-wrap column">
			<a class="item" href="/perchatki-rezinovye-tekhnicheskie">перчатки</a>
			<a class="item" href="/about/payment">бахилы</a>
			<a class="item" href="/about/payment">сиз</a>
			<a class="item" href="/about/payment">шприцы</a>

			<a class="item" href="/about/payment">акции</a>
			<a class="item" href="/about/payment">ОПЛАТА</a>
			<a class="item" href="/about/delivery">ДОСТАВКА</a>
			<a class="item" href="/about/return_change">ВОЗВРАТ И ОБМЕН</a>
			<a class="item" href="/about/discount">СИСТЕМА СКИДОК</a>
			<a class="item" href="/about/contacts">Контакты</a>
			<div class="item">СТАТЬИ</div>
			<a href="/about/contact-us">
				<span class="icon-envelope">✉</span>Напишите нам
			</a>
		</div>
	</nav>

	<div id="panel">

		<!--		<div class="wrap">-->

		<div class="top-menu">
<!--			<div class="row">-->

				<div class="contacts flex1">
					<a class="item flex1" href="/about">О НАС</a>
					<a class="item flex1" href="/about/contacts">КОНТАКТЫ</a>
				</div>

				<div class="user-menu  flex1">
                <span class="row">
                    <? if (!isset($user)): ?>
	                    <a href="/user/login" aria-label="login">
                       <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"
                                               data-prefix="far" data-icon="user" class="svg-inline--fa fa-user fa-w-14"
                                               role="img" viewBox="0 0 2688 3072"><path fill="currentColor"
                                                                                        d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg></span>
                     </a>
						  <? else: ?>
	                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"
	                                            data-prefix="far" data-icon="user" class="svg-inline--fa fa-user fa-w-14"
	                                            role="img" viewBox="0 0 448 512"><path fill="currentColor"
	                                                                                   d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg></span>
                     <?
							  if (isset($user)) {
								  echo '<span class = "FIO">' . $user['surName'] . ' ' . $user['name'] . ' ' . $user['middleName'] . '</span>';
							  }
							  ?>


	                    <div class="nav">
                       <a href="/user/edit">Редактировать свой профиль</a>
                       <?=
							  in_array('1', $user['rights']) ? // редактировать
								  '<a href="/edit/1">Редактировать тесты</a>
                      <a href="/freetest/edit/41">Редактировать свободный тест</a>' : ''
							  ?>

								  <?=
								  in_array('2', $user['rights']) ? // проходить
									  '<a href="/test/1">Проходить тесты</a>
                      <a href="/freetest/41">Свободный тест</a>' : '';
								  ?>

								  <?=
								  in_array('3', $user['rights']) ?
									  '<a href="/adminsc">Admin</a>' : ''; // Admin
								  ?>

								  <? if (isset($user)): ?>
			                    <a href="/user/logout" aria-label="logout">
                            <span class="icon-logout">
                              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="20"
                                   viewBox="0 0 20 20">
                              <path fill='#e30000'
                                    d="M4 8v-2c0-3.314 2.686-6 6-6s6 2.686 6 6v0h-3v2h4c1.105 0 2 0.895 2 2v0 8c0 1.105-0.895 2-2 2v0h-14c-1.105 0-2-0.895-2-2v0-8c0-1.1 0.9-2 2-2h1zM9 14.73v2.27h2v-2.27c0.602-0.352 1-0.996 1-1.732 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.736 0.398 1.38 0.991 1.727l0.009 0.005zM7 6v2h6v-2c0-1.657-1.343-3-3-3s-3 1.343-3 3v0z"></path>
                              </svg>
                            </span>
                            Выход
                          </a>
								  <? endif; ?>
                     </div>
						  <? endif; ?>

                </span>
				</div>


<!--			</div>-->
		</div>

		<header>
			<div class="inner-wrap">
				<div class='h-upper'>
					<div class="logo-wrap">
						<?= (!($this->route['action'] == "index" && $this->route['controller'] == "Main")) ? "<a href = '/' aria-label = 'На главную'></a>" : "" ?>
						<svg>
							<use xlink:href="#logo-svg">
						</svg>
						<span class="logo-desc">Медицинские расходные <br>материалы оптом</span>
					</div>

					<div class='phone-wrap'>
						<div class='icon-phone'>
							<a href="tel:+79217131767">8 (921) 713-17-67</a>
							<div class="popup-info">
								<div class="inner">
									<div class="head">Время работы 8:30 – 17.30 по Москве</div>
									<p>Дополнительные телефоны:</p>
									<p class="phones">
										<a href="tel:+78172217762">8 (8172) 21-77-62</a><br>
										<a href="tel:+79095942911">8 (909) 594-29-11</a></p>
									<p></p>
								</div>
							</div>
						</div>
					</div>


					<div class="search-wrap">

						<input id="autocomplete" type="text" placeholder="Поиск" name="q" value="" size="20"
						       maxlength="50" class="form-text" autocomplete="off" aria-label="поиск"
						       onkeyup="getValue(this.value)">
						<span id="btnSrch" class="find"></span>

						<div class="result-search"></div>

					</div>

				</div>

				<div class="header-lower row">
					<? foreach ($list as $mainItem): ?>
						<div class='h-cat'><?= $mainItem['name']; ?>
							<ul>
								<? if (isset($mainItem['childs'])): ?>
									<? foreach ($mainItem['childs'] as $item): ?>
										<li>
											<a href="/<?= $item['alias'] ?>"><?= $item['name'] ?></a>
										</li>
									<? endforeach; ?>
								<? endif; ?>
							</ul>

						</div>
					<? endforeach; ?>


					<div class='h-cat'>Акции
						<ul>
							<li>
								<a href="/inventar">инвентарь</a>
							</li>
							<li>
								<a href="/rasprodazha">распродажа</a>
							</li>

						</ul>
					</div>

				</div>

			</div>
		</header>

		<?= $content ?>


		<div class="page-buffer"></div>

		<!--		</div>-->

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


		<div id="cookie-notice" role="banner">Продолжая использовать сайт, вы даете согласие на обработку файлов cookie,
			пользовательских данных (сведения о местоположении; тип и версия ОС; тип и версия Браузера; тип устройства и
			разрешение его экрана; источник откуда пришел на сайт пользователь; с какого сайта или по какой рекламе;
			язык ОС и Браузера; какие страницы открывает и на какие кнопки нажимает пользователь; ip-адрес) в целях
			функционирования сайта, проведения ретаргетинга и проведения статистических исследований и обзоров. Если вы
			не хотите, чтобы ваши данные обрабатывались, покиньте сайт.
			<span id="cn-accept-cookie" onclick="return setCookie(this);">Соглашаюсь</span>
		</div>

		<!--<script src="/public/js/jq.js"></script>-->
		<!--<script src="/public/js/auto.js"></script>-->

		<? $this::getJS(); ?>


		<div class='none'>
			<svg id='logo-svg' width="200" height="45" version="1.1" viewBox="0 0 140.93602 25.903431">
				<defs>
					<path id="a4bgr29v3"
					      d="m473.35 105.73c5.3 0.04 0.86 0.08-9.88 0.08s-15.1-0.04-9.65-0.08c5.44-0.07 14.23-0.07 19.53 0z"/>
					<path id="c1VGvvv2Z"
					      d="m0.1 55.82c16.91-27.81 27.48-45.2 31.71-52.15 1.55-2.55 4.32-4.11 7.31-4.12 2.41-0.01 8.45-0.03 18.1-0.06-16.26 26.9-26.43 43.71-30.5 50.44-2.21 3.66-6.18 5.89-10.46 5.89h-16.16z"/>
					<path id="gUAoYJIok"
					      d="m424.85 71.92c0.08 1.99 0.08 5.3 0 7.33-0.03 1.99-0.11 0.34-0.11-3.68s0.08-5.68 0.11-3.65z"/>
					<path id="d1QYQspoc"
					      d="m572.98 2.18h21.38c3.48 0 5.45 3.98 3.35 6.74-6.21 8.16-23.24 30.55-30.33 39.87-0.36 0.49-1.07 0.53-1.49 0.09-3.46-3.64-11.32-11.91-14.35-15.1-1.68-1.76-1.75-4.51-0.17-6.36 2.88-3.36 10.09-11.78 21.61-25.24z"/>
					<path id="c2Sj5L9Of"
					      d="m150.96 2.18c3.49 0 6.65 2.09 8.01 5.31 3.56 8.41 12.46 29.44 26.7 63.09 13.97-32.77 22.71-53.25 26.2-61.44 1.8-4.22 5.95-6.96 10.53-6.96h11.07c3.87 0 6.49 3.96 4.98 7.52-8.16 19.23-29.74 70.1-37.98 89.5-1.71 4.04-5.67 6.66-10.06 6.66h-8.6c-4.22 0-8.03-2.49-9.72-6.36-8.5-19.46-31.06-71.1-39.52-90.47-1.41-3.23 0.96-6.85 4.48-6.85h13.91z"/>
					<path id="a22pvJeVTv"
					      d="m251 6.99c0-2.65 2.15-4.81 4.81-4.81h17.37c2.87 0 5.21 2.33 5.21 5.21v94.93c0 1.96-1.59 3.54-3.54 3.54h-19.68c-2.3 0-4.17-1.86-4.17-4.16v-94.71z"/>
					<path id="b3VxPr9vMy"
					      d="m324.94 24.35h-30.96c-2.92 0-5.29-2.37-5.29-5.29v-10.53c0-3.35 2.71-6.07 6.06-6.07 18.45 0.01 69.02 0.01 87.79 0.01 2.46 0 4.46 1.99 4.46 4.45v13.76c0 2.03-1.65 3.67-3.68 3.67h-32.57v77.34c0 2.46-2 4.46-4.46 4.46h-17.25c-2.26 0-4.1-1.84-4.1-4.11v-77.69z"/>
					<path id="f2bkoof7Mq"
					      d="m398.29 8.6c0-3.39 2.75-6.14 6.14-6.14h78.75c3.12 0 5.65 2.53 5.65 5.65v9.04c0 3.38-2.75 6.13-6.13 6.14-7.72 0.01-27.03 0.04-57.92 0.1v20.06h48.33c2.77 0 5.01 2.24 5.01 5.01v10.52c0 2.96-2.4 5.35-5.35 5.35h-47.99c-0.25 13.5-0.25 20.38 0 20.63 0.23 0.23 20.08 0.24 59.55 0.02 2.48-0.01 4.5 1.99 4.5 4.47v12.2c0 2.48-2.01 4.5-4.49 4.5h-81.55c-2.48 0-4.5-2.02-4.5-4.5v-93.05z"/>
					<path id="bbT7DNVUa"
					      d="m530.34 52.96c-18.36-23.66-29.83-38.45-34.42-44.36-1.94-2.5-0.16-6.14 3-6.14h19.33c2.46 0 4.8 1.12 6.34 3.05 16.12 20.13 58.99 73.63 74.34 92.8 2.53 3.16 0.28 7.84-3.76 7.84h-16.27c-2.21 0-4.3-0.98-5.72-2.68-3.53-4.21-12.33-14.72-26.43-31.55-13.1 15.91-21.28 25.86-24.56 29.83-2.29 2.78-5.7 4.4-9.3 4.4h-16.87c-2.01 0-3.17-2.3-1.98-3.92 4.84-6.57 16.94-22.99 36.3-49.27z"/>
					<path id="b1d9vAIQqx"
					      d="m53.8 106.64c16.91-27.82 27.48-45.2 31.71-52.16 1.55-2.55 4.32-4.11 7.31-4.12 2.41-0.01 8.44-0.03 18.1-0.05-16.27 26.89-26.43 43.7-30.5 50.43-2.21 3.66-6.18 5.9-10.46 5.9h-16.16z"/>
					<path id="b22YyPyZK"
					      d="m0.1 109c32.99-53.38 53.6-86.75 61.85-100.1 3.25-5.26 9-8.46 15.18-8.46h33.79c-34.57 53.96-56.17 87.69-64.81 101.18-2.95 4.6-8.04 7.38-13.5 7.38h-32.51z"/>
				</defs>
				<g transform="matrix(.23439 0 0 .23439 .18676 .23738)">
					<use width="100%" height="100%" fill="#8d8d8d" xlink:href="#c1VGvvv2Z"/>
					<use width="100%" height="100%" fill="#ff2929" xlink:href="#b22YyPyZK"/>
					<use width="100%" height="100%" fill="#8d8d8d" xlink:href="#b1d9vAIQqx"/>
					<use width="100%" height="100%" fill="#4e4e4e" xlink:href="#c2Sj5L9Of"/>
					<use width="100%" height="100%" fill="#4e4e4e" xlink:href="#a22pvJeVTv"/>
					<use width="100%" height="100%" fill="#4e4e4e" xlink:href="#b3VxPr9vMy"/>
					<use width="100%" height="100%" fill="#4e4e4e" xlink:href="#f2bkoof7Mq"/>
					<use width="100%" height="100%" fill="#4e4e4e" xlink:href="#bbT7DNVUa"/>
					<use width="100%" height="100%" fill="#ff2929" xlink:href="#d1QYQspoc"/>
				</g>
			</svg>


			<svg id='greyAvatar' width="30" fill='#fff' version="1.1" xmlns="http://www.w3.org/2000/svg"
			     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000"
			     enable-background="new 0 0 1000 1000" xml:space="preserve"><g>
					<path d="M500,990.1c-290,0-490-219.4-490-490C10,229.3,229.4,9.9,500,9.9c270.7,0,490,219.4,490,490.1C990,770.7,790,990.1,500,990.1z M500,73.4c-235.6,0-426.5,191-426.5,426.6c0,110.2,42.1,210.3,110.7,286c61.8-29.9,39.1-5,119.9-38.3c82.7-34,102.3-45.9,102.3-45.9l0.8-78.4c0,0-31-23.5-40.5-97.3c-19.4,5.6-25.8-22.6-27-40.5c-1-17.3-11.2-71.4,12.4-66.5c-4.8-36.1-8.3-68.6-6.6-85.9c5.9-60.5,64.7-123.8,155.2-128.4c106.5,4.6,148.7,67.8,154.6,128.4c1.7,17.3-2.1,49.9-6.9,85.9c23.6-4.8,13.4,49.2,12.2,66.5c-1,17.9-7.6,46-26.9,40.4c-9.7,73.8-40.7,97.1-40.7,97.1l0.7,78c0,0,19.6,11,102.3,45.1c80.8,33.3,58.1,9.9,119.9,39.8c68.6-75.7,110.7-175.8,110.7-286C926.6,264.4,735.6,73.4,500,73.4z"/>
				</g></svg>
		</div>


	</div>
</div>
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
</body>
</html>