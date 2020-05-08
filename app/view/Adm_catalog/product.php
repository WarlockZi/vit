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
		?>
	</div>
</div>
<div class="a-content">
	<div class="a-breadcrumbs">
		<!--<input type="hidden" id='js-object' value=<?= json_encode($product); ?>>-->
		<a href="/adminsc/index">Admin ></a>
		<a href="/adminsc/catalog">Каталог ></a>

		<? if (isset($category['parents'])): ?>
			<? foreach ($category['parents'] as $k => $v): ?>
				<a href="/adminsc/catalog/category?id=<?= $v['id'] ?>"><?= $v['name'] ?></a>
			<? endforeach; ?>
			<a href="/adminsc/catalog/category?id=<?= $category['id'] ?>"><?= $category['name'] ?: '' ?></a>
			<div><?= $product['name'] ?: ''; ?></div>

		<? endif; ?>
	</div>
	<H1><?= $product['name'] ?: ''; ?></H1>

	<div class="a-tabs-wrap">

			<div class="tabs">
				<input id="tab1" type="radio" name="tabs">
				<label for="tab1" title="Подробно">Подробно</label>
				<input id="tab2" type="radio" name="tabs">
				<label for="tab2" title="Свойства">Свойства</label>
				<input id="tab3" type="radio" name="tabs">
				<label for="tab3" title="Сео">Сео</label>
				<input id="tab4" type="radio" name="tabs" checked>
				<label for="tab4" title="Картинки">Картики</label>


				<?
				$ptype = 'dpic';
				if (isset($product['img'][$ptype]) && $product['img'][$ptype]) {
					$size = 600;
//           $size = explode(',', $product['img'][$ptype]['saveInSizes']);
				}
				?>
				<section id="content-tab1" class="prod-details column">
					<div class="row">
						<div class="left column">
							<div class='prop row'>
								<strong>id :</strong>
								<span id='id' <?= $product['id'] ?: ''; ?>><?= $product['id'] ?: ''; ?></span>
							</div>
							<div class='prop row'>
								<strong>Показать на сайте :</strong>
								<span>
                  <input type="checkbox" id='act' <?= $product['act'] == 'Y' ? 'checked' : ''; ?>>
                </span>
							</div>
							<div class='prop row'>
								<strong>Наименование :</strong>
								<span contenteditable id='name'><?= $product['name'] ?: ''; ?></span>
							</div>

						</div>
						<div class="right column">
							<?if (isset($product['img'])&& is_array($product['img'])):?>
							<?  foreach ($product['img'] as $pic): ?>
								<div>
									<?
								$da = $product['img'];
									$y = isset($da) ? '/pic/' . $product['alias'] . '/' . $ptype . '/1/' . $da . '.webp' : '/pic/srvc/nophoto-min.jpg';
									?>
									<img src="<?= $y ?: '/srvc/nophoto-min.jpg'; ?>">
								</div>
							<? endforeach; ?>
							<? else: ?>
									<div>

							<img src="<?= $y ?: '/srvc/nophoto-min.jpg'; ?>">
						</div>
							<?endif;?>

						</div>
					</div>

					<div>
						<strong>Описание :</strong>
						<span contenteditable id='text' class="column"><?= $product['dtxt'] ?: ''; ?></span>
					</div>


				</section>

				<section id="content-tab2">


					<div class="properties column">
						<H1 class="prod-prop">Свойства товара</H1>

						<?
						if (isset($category['parents'])) {
							$category['props'] = array_merge($category['parentProps'], $category['props']);
						}
						?>

						<div class="product-prop column">
							<? foreach ($category['props'] as $Pprop): ?>
								<div class="category-properties">
									<? foreach ($props as $prop): ?>
										<? if ($Pprop == $prop['id']): ?>
											<span><?= $prop['name'] ?></span>

											<? if ($prop['type'] == 'string') : ?>
												<input
														value="<?= is_array($product['props']) ? $product['props'][$prop['name']] : '' ?>"
														data-type='text' data-id="<?= $prop['id']; ?>" contenteditable type="text">


											<? elseif ($prop['type'] == 'select'): ?>
												<? $val = explode(',', $prop['val']); ?>
												<select data-type='select' data-id="<?= $prop['id']; ?>">
													<option value=""></option>
													<? foreach ($val as $i => $p): ?>
														<option <?= is_array($product['props']) && ($val[$i] == $product['props'][$prop['name']]) ? 'selected' : ''; ?>
																value="<?= $i; ?>"><?= $p; ?></option>
													<? endforeach; ?>
												</select>


											<? elseif ($prop['type'] == 'multi'): ?>
												<? $val = explode(',', $prop['val']); ?>
												<select data-type='multi-select' data-id="<?= $prop['id']; ?>" multiple
												        title="для выбора нескольких значений зажмите 'CTRL'" name="" id="">
													<? foreach ($val as $i => $p): ?>
														<? $multi = explode(',', $product['props'][$Pprop]); ?>
														<option
																value="<?= $i; ?>" <?= is_array($product['props']) && array_key_exists($Pprop, $product['props']) && (array_key_exists($i, $multi)) ? 'selected' : '' ?>><?= $p; ?></option>
													<? endforeach; ?>
												</select>

											<? endif; ?>

										<? endif; ?>
									<? endforeach; ?>
								</div>
							<? endforeach; ?>
						</div>


						<div class="add-property row">

						</div>

					</div>


				</section>

				<section id="content-tab3">

					<div class="admin-flex-table">
						<div class="row">
							<strong>название вкладки :</strong>
							<span contenteditable id='title'><?= $product['title'] ?: ''; ?></span>
						</div>
						<div class='row'>
							<strong>url :</strong>
							<span contenteditable id='alias'><?= $product['alias'] ?: ''; ?></span>
						</div>
						<div class="row">
							<strong>ключевые слова :</strong>
							<span contenteditable id='keywords'><?= $product['keywords'] ?: ''; ?></span>
						</div>
						<div class="row">
							<strong>сниппет для поисковиков :</strong>
							<span contenteditable id='description'><?= $product['description'] ?: ''; ?></span>
						</div>
						<div class="row">
							<strong>семантическое ядро :</strong>
							<span contenteditable id='core'><?= $product['core'] ?: ''; ?></span>
						</div>
					</div>


				</section>

				<section id="content-tab4">

					<?
					$arr = [
						'основная картинка' => [
							'ptype' => 'dpic',
							'size' => '-80',
							'isOnly' => true
						],
						'дополнительные картинки' => [
							'ptype' => 'dop',
							'size' => '-300',
							'isOnly' => false
						],
						'транспортная упаковка' => [
							'ptype' => 'big-pack',
							'size' => '-300',
							'isOnly' => false
						]
					]
					?>
					<? foreach ($arr as $sep => $b): ?>

						<div class="row separator"><?= $sep ?></div>

						<div class="row js-pic" data-pic-type='<?= $b['ptype']; ?>' data-title= <?= $sep ?>>

							<div class="holder column <?= $b['isOnly'] ? 'js-one' : '' ?>">
								<span>Перетащи файл сюда или выбери</span>
								<input id="<?= $b['ptype']; ?>" type="file">
								<label for="<?= $b['ptype']; ?>">с компьютера</label>
							</div>
							<?
							if (isset($product['img'][$b['ptype']]) && $da = $product['img'][$b['ptype']]) :
								foreach ($product['img'][$b['ptype']] as $i => $pic):
									?>

									<?
									$path = '/pic/' . $pic['path'];
									$y = $path . $b['size'] . '.webp';
									?>
									<div class="pic w200 h200">
										<img src="<?= $y ?: '/srvc/nophoto-min.jpg'; ?>">
										<span data-del-id= <?= $pic['path'] ?>>x</span>
									</div>

								<?
								endforeach;
							else:
								?>
								<div class="pic w200 h200">
									<img src="/pic/srvc/nophoto-min.jpg">
									<span data-del-id=>x</span>
								</div>
							<? endif; ?>


						</div>

					<? endforeach; ?>


				</section>
				<div class="separator">
					<button class="btn" id="product-update-btn">Сохранить</button>

				</div>

		</div>

	</div>
</div>
<style>

	.pic:hover {
		border: 1px #ddd solid;
	}

	.pic span {
		display: none;
	}

	.pic:hover span {
		display: flex;
		width: 10px;
		height: 10px;
		background-color: red;
		position: absolute;
		bottom: 0;
		right: 0px;
		justify-content: center;
		align-items: center;
		border-radius: 50%;
		color: white;
		padding: 10px;
		cursor: pointer;
	}

	.pic {
		box-sizing: border-box;
		position: relative;
		margin-left: 10px;
	}

	.holder span {
		width: 100px;
		color: #7d7d7d;
		text-align: center;
		line-height: 1.5;
	}

	.holder label {
		background-color: #ebf4f4;
		padding: 10px;
		cursor: pointer;
		z-index: 1;
	}

	.holder input {
		max-width: 115px;
		display: none;
	}

	.holder {
		position: relative;
		display: flex;
		flex-flow: column;
		justify-content: space-evenly;
		align-items: center;
		padding-bottom: 5px;
		width: 200px;
		height: 200px;
		border-radius: 25px;
		border: 3px dashed #dee3e4;
		box-sizing: border-box;
	}

</style>