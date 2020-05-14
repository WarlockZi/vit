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
				<div id="id" hidden></div>
				<div id="name" class="name field" contenteditable></div>
				<div class="del">X</div>
				<? foreach ($tags as $key => $value): ?>
			</div>
			<div class="card">
				<? $tag = $value->export(); ?>
				<div class="name" contenteditable><?= $tag['name'] ?></div>
				<div class="del">X</div>
			</div>
			<? endforeach; ?>
		</div>
	</div>
	<div class="separator">
		<div class="btn tag-save">Сохранить</div>
		<a href="/adminsc/settings/tag/new" class="btn">Добавить тег</a>
	</div>
</div>

