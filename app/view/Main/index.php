<main class="column">


	<div class="swiper-title">Новинки</div>
	<div class="swiper-container-new">
		<div class="swiper-wrapper">
			<? $i = 0; ?>
			<? foreach ($sale as $product) : ?>
				<? $i++; ?>
				<? if ($i < 6): ?>
					<div class="swiper-slide">
						<a href="/<?= $product['alias']; ?>">
							<img class="pic" src="/pic<?= $product['dpic']; ?>" alt="<?= $product['name']; ?>">
							<span><?= $product['name']; ?> </span>
						</a>
					</div>
				<? else: ?>
					<div class="swiper-slide">
						<a href="/<?= $product['alias']; ?>">
							<img data-src="/pic<?= $product['dpic']; ?>" class="swiper-lazy pic"
							     alt="<?= $product['name']; ?>">
							<div class="swiper-lazy-preloader"></div>
							<span><?= $product['name']; ?> </span>
						</a>
					</div>
				<? endif; ?>

			<? endforeach; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
	</div>

	<div class="swiper-title">Лучшие предложения</div>
	<div class="swiper-container-new">
		<div class="swiper-wrapper">
			<? $i = 0; ?>
			<? foreach ($sale as $product) : ?>
				<? $i++; ?>
				<? if ($i < 6): ?>
					<div class="swiper-slide">
						<a href="/<?= $product['alias']; ?>">
							<img class="pic" src="/pic<?= $product['dpic']; ?>" alt="<?= $product['name']; ?>">
							<span><?= $product['name']; ?> </span>
						</a>
					</div>
				<? else: ?>
					<div class="swiper-slide">
						<a href="/<?= $product['alias']; ?>">
							<img data-src="/pic<?= $product['dpic']; ?>" class="swiper-lazy pic"
							     alt="<?= $product['name']; ?>">
							<div class="swiper-lazy-preloader"></div>
							<span><?= $product['name']; ?> </span>
						</a>
					</div>
				<? endif; ?>

			<? endforeach; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
	</div>

	<div class="info">
		<h1>Расходные материалы для медицины оптом</h1>
		<p>
			Обеспечим ваш медицинский центр, стоматологию или лабораторию перчатками,
			бахилами, масками и другими расходниками с бесплтной доставкой
			в оговоренные сроки. Поможем Вам найти оптимальное решение.
		</p>
		<h2>Широкий ассортимент</h2>
		<p>
			Оптимально подобранный перечень товаров поможет быстро
			сориентироварться в ассортименте. Мы не держим ничего лишнего.
		</p>
		<h2>Низкие цены</h2>
		<p>
			Покупая оптом, Вы снижаете затраты своего предприятия.
			Ведь лидеры рынка всегда уделяют большое внимание на затраты.
		</p>
		<h2>Доставим до дверей</h2>
		<p>
			Вам не нужно беспокоится о доставке. Мы огранизуем и доставим
			ваш товар бесплатно почти в любую точку России.
			Даже если ваше предприятие не имеет собственного транспорта,
			составив заявку на доставку "до дверей", товар вы получите в
			оговоренный срок.
		</p>
		<h2>Вся продукция сертифицирована</h2>
		<p>
			На всю приобретенную у нас продукцию Вы получаете российские сертификаты
			на соответствие ГОСТам.
		</p>
	</div>


</main>
<script src="/public/build/mainIndex.js"></script>
