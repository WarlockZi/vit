<div class="a-submenu">

	<div class="title">Свойства</div>
	<div class="a-actions">
		<? foreach ($catProps as $key): ?>
			<div data-id=<?= $key['id'] ?> class="props-actions_row">

				<div><?= $key['name'] ?></div>
			</div>
		<? endforeach; ?>
	</div>
</div>
<div class="a-content">
	<div class="a-breadcrumbs">
		<a href="/adminsc">Admin</a>
		<a href="/adminsc/settings">Настройки</a>
		<div>Настройка свойств</div>
	</div>

	<H2>Настройка свойств</H2>


	<? foreach ($catProps as $key): ?>

		<div class="prop-container" data-prop-id=<?= (int)$key['id']; ?>>
			<div class="row">
				<strong> название : </strong>
				<input data-id="<?= $id = $key['id']; ?>" class="property-name" contenteditable size="10" type="text"
				       value="<?= $key['name'] ?>">
			</div>

			<div class="row">
				<strong> сорт. : </strong>
				<span data-id="<?= $id ?>" class="sort" contenteditable><?= $key['sort'] ?> </span>
			</div>

			<div class="row">
				<strong> id : </strong>
				<span> <?= $id; ?>    </span>
			</div>

			<div class="row">
				<strong> тип : </strong>
				<select data-id="<?= $id ?>" class="type">
					<option value="select" <?= $key['type'] == 'select' ? 'selected' : '' ?>>выбор одного значения</option>
					<option value="multi" <?= $key['type'] == 'multi' ? 'selected' : '' ?>>выбор нескольких значений</option>
					<option value="string" <?= $key['type'] == 'string' ? 'selected' : '' ?>>строка</option>
				</select>
			</div>


			<a href="prop?id=<?= $id ?>" data-id="<?= $id ?>" class="edit"></a>
		</div>
	<? endforeach; ?>

	 <div class="separator">
		 <div class = "btn prop save">Сохранить</div>
	  </div>

</div>