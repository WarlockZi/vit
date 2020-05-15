<div class="a-submenu">
	<div class="title">Тэги</div>
	<? foreach ($tags as $key => $value): ?>
		<? $tag = $value->export(); ?>
		<div class="card">
			<div><?= $tag['name'] ?></div>

		</div>
	<? endforeach; ?>

</div>
<div class="a-content">


	<div class="a-breadcrumbs">
		<a href="index">Admin</a>
		<a href="index">Настройки</a>
		<div>Теги</div>
	</div>
	<div class="tags-wrap">
		<div class="tag-wrap">Тег

			<div class="card">
				<div id="new" hidden></div>
				<div id="name" class="name field" contenteditable></div>
				<div class="tag-del">X</div>
			</div>
			<? foreach ($tags as $key => $value): ?>
				<div class="card">
					<? $tag = $value->export(); ?>
					<div class="name" contenteditable><?= $tag['name'] ?></div>
					<div class="tag-del" data-id="<?= $tag['id'] ?>">X</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
	<div class="separator">
		<div class="btn tag-save">Сохранить</div>
		<div class="btn tag-add">Добавить тег</div>
	</div>
</div>

