<div class="a-content">
	<div class="a-breadcrumbs">
		<a href="/adminsc">Admin</a>
		<a href="/adminsc/settings">Настройки</a>
		<div>Настройка значений</div>
	</div>

	<H2>Настройка значений</H2>

	<div class="grid5 a_props-table">
		<span class="grid-head">id</span>
		<span class="grid-head">сорт.</span>
		<span class="grid-head">название</span>
		<span class="grid-head">тип</span>
		<span class="grid-head">измен.</span>
		<? foreach ($catProps as $key): ?>


			<span>
           <span style="display: flex;align-items: center;"> <?= $id = $key['id'] ?>    </span>
         </span>
			<span>
           <span data-id="<?= $id ?>" class="sort" contenteditable> <?= $key['sort'] ?>    </span>
         </span>

			<span>
           <input data-id="<?= $id ?>" class="property-name" contenteditable size="35" type="text"
                  value="<?= $key['name'] ?>">
         </span>

			<span>
           <select data-id="<?= $id ?>" class="type">
	           <? $t = \R::find('props', $key['id']); ?>
             <option value="select"<?= $key['type'] == 'select' ? 'selected' : '' ?>>выбор одного значения</option>
             <option value="multi"<?= $key['type'] == 'multi' ? 'selected' : '' ?>>выбор нескольких значений</option>
             <option value="string" <?= $key['type'] == 'string' ? 'selected' : '' ?>>строка</option>
           </select>
         </span>

			<span>
           <a href="prop?id=<?= $id ?>" data-id="<?= $id ?>" class="edit">
           </a>
         </span>
		<? endforeach; ?>

	</div>

	<div class="separator btn">
		<a href='values/save' class="a-btn-action">Сохранить</a>
		<a href='values/new' class="a-btn-action">Добавить</a>
	</div>
</div>
