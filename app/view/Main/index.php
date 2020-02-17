<main class="column">

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

	<div class="swiper-new">Новинки</div>
	<div class="swiper-container-new">
		<div class="swiper-wrapper">
			<? foreach ($sale as $product) : ?>
				<div class="swiper-slide">
					<a href="/<?= $product['alias']; ?>">
						<img class="pic" src="/pic<?= $product['dpic']; ?>" alt="<?= $product['name']; ?>">
						<span><?= $product['name']; ?> </span>
					</a>
				</div>
			<? endforeach; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>


	</div>
</main>
<script src="/public/build/mainIndex.js"></script>
