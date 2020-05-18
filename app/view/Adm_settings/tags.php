<div class="a-submenu">
	<div class="title">Тэги</div>
    <div class="tag-wrap">
	<? foreach ($tags as $tag): ?>
		<div class="card">
			<div><?= $tag['name'] ?></div>
		</div>
	<? endforeach; ?>
    </div>
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

		</div>
	</div>
	<div class="separator">
		<div class="btn tag-save">Сохранить</div>
<!--		<div class="btn tag-add">Добавить тег</div>-->
	</div>
</div>

