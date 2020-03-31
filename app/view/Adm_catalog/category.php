<div class="a-submenu">
	<div class="title">Каталог</div>
	<div class="a-actions">
		<?

		new app\view\widgets\menu\Menu([
			'class' => 'admin-category-menu',
			'tpl' => ROOT . "/app/view/widgets/menu/menu_tpl/site_admin_category_menu.php",
			'cache' => 60,
			'sql' => "SELECT * FROM category "
		]);

		$addCategoryButton = "<div class='btn category add'>Добавить категорию</div>";
		?>
	</div>
</div>
<div class="a-content">
	<div class="a-breadcrumbs">
		<a href="/adminsc/index">admin ></a>
		<a href="/adminsc/catalog">каталог ></a>
		<? if (isset($category['cat_parents_with_props'])): ?>
			<? foreach ($category['cat_parents_with_props'] as $k => $v): ?>
				<a href="/adminsc/catalog/category?id=<?= $v['id']; ?>"><?= $v['name']; ?></a>
			<? endforeach; ?>
			<div><?= $category['name']; ?></div>
		<? endif; ?>
	</div>

	<div class="a-tabs-wrap">


		<div class="tabs">
			<input id="tab1" type="radio" name="tabs">
			<label for="tab1" title="Подкатегории">Подробно</label>
			<input id="tab2" type="radio" name="tabs" checked>
			<label for="tab2" title="Свойства">Свойства</label>
			<input id="tab3" type="radio" name="tabs">
			<label for="tab3" title="Сео">Сео</label>
			<input id="tab4" type="radio" name="tabs">
			<?
			if (isset($category['children']['categories']) &&
				$category['children']['categories']) {
				$children = 'Подкатегории';
				$ddProductButton = '';
			} else {
				$children = 'Товары';
				$ddProductButton = '<a href = "product?id=new&category=' . $category['id'] . '" class="add-product">добавить товар</a>';
			}
			?>

			<label for="tab4" title="<?= $children ?>"><?= $children ?></label>

			<section id="content-tab1" class="admin-flex-table">
				<? if ($category): ?>
					<div class="row">
						<strong>id :</strong>
						<span id='id'><?= $category['id'] ?: ''; ?></span>
					</div>
					<div class="row">
						<strong>активный</strong>
						<input id='act' type="checkbox" <?= $category['act'] ? 'checked' : '' ?>>
						<label for='act'></label>
					</div>
					<div class="row">
						<strong>Наименование :</strong>
						<span contenteditable id='name'><?= $category['name'] ?: ''; ?></span>
					</div>

					<div class="row">
						<strong>Описание :</strong>
						<span contenteditable id='text'
						      class="column"><?= htmlspecialchars($category['text'] ?: ''); ?></span>
					</div>
				<? else: ?>
					<div class="row">
						Такой категории пока что не существует!
					</div>
				<? endif; ?>

			</section>


			<section id="content-tab2">

				<? if (isset($category['cat_parents_with_props'])): ?>

					<? foreach ($category['cat_parents_with_props'] as $parent): ?>

						<div class="parent-properties separator">
							<span><?= $parent['name']; ?></span>
						</div>
						<div class="prop column">
							<? foreach ($parent['props'] as $prop): ?>
								<div class="category-properties">
									<?= $prop['name'] ?>
								</div>
							<? endforeach; ?>
						</div>
					<? endforeach; ?>
				<? endif; ?>


				<div class="cat-properties-title separator">
					<span><?= $category['name']; ?></span>
				</div>
				<div class="cat-properties column">
					<? foreach ($category['props'] as $prop): ?>
					<div class="cat-property row">
						<div title="удалить"
						     data-id= <?= $prop['id']; ?>
						     class
						= "del-prop">
						<?= $prop['name']; ?>
					</div>
					<p><?= $prop['name'] ?></p>

				</div>
			<? endforeach; ?>
		</div>


		<select id="select_props">
			<option value="0">Добавить свойство</option>
			<? foreach ($addableProps as $prop): ?>
				<option value="<?= $prop['id'] ?>"><?= $prop['name'] ?></option>
			<? endforeach; ?>
		</select>


		</section>

		<section id="content-tab3" class="admin-flex-table">

			<div class="row">
				<strong>title :</strong>
				<span contenteditable id='title'><?= $category['title'] ?: ''; ?></span>
			</div>
			<div class="row">
				<strong>url :</strong>
				<span contenteditable id='alias'><?= $category['alias'] ?: ''; ?></span>
			</div>
			<div class="row">
				<strong>key words :</strong>
				<span contenteditable id='keywords'><?= $category['keywords'] ?: ''; ?></span>
			</div>
			<div class="row">
				<strong>description :</strong>
				<span contenteditable id='description'><?= $category['description'] ?: ''; ?></span>
			</div>
			<div class="row">
				<strong>семантическое ядро :</strong>
				<span contenteditable id='core'><?= $category['core'] ?: ''; ?></span>
			</div>


		</section>

		<section id="content-tab4">


			<? if (isset($category['children']['categories']) && $category['children']['categories']): ?>
				<? foreach ($category['children']['categories'] as $key => $value) : ?>
					<a href="/adminsc/catalog/category?id=<?= $value['id'] ?>"><?= $value['alias'] ?></a>
				<? endforeach; ?>

			<? else: ?>
				<? if (isset($category['children'])): ?>
					<?= $ddProductButton ?>
					<div class="products row">
						<? foreach ($category['children']['products'] as $product) : ?>
							<a class="product column" href="product?id=<?= $product['id'] ?>">
								<div class="pic">
									<img src="<?=
									is_readable(ROOT . '/pic' . $product['dpic']) ?
										'/pic' . $product['dpic'] :
										'/pic/srvc/nophoto-min.jpg'; ?>"
									     alt="">
								</div>
								<span><?= $product['name'] ?></span>
							</a>

						<? endforeach; ?>
					</div>
				<? endif; ?>
			<? endif; ?>


		</section>
		<div class="separator">
			<? if ($category): ?>
				<div class="btn category save">Сохранить</div>
			<? endif; ?>

			<?= $addCategoryButton ?>

		</div>
	</div>

</div>
