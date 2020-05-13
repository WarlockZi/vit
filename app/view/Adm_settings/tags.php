<div class="a-submenu">
	<div class="title">Тэги</div>
	<? foreach ($tags as $key => $value): ?>
		<div class="card">
			<div class="pic">
				<? $tag = $value->export(); ?>
				<img src="/pic/test/<?= $tag['nameHash'] ?>" alt="">
			</div>
			<div class="name"><?= $tag['nameHash'] ?></div>
			<div class="art"><?= $tag['nameRu'] ?></div>
			<span><?= $value['nameRu'] ?> </span>
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
				<div class="name" contenteditable></div>
				<div class="del">X</div>
				<? foreach ($tags as $key => $value): ?>
					<? $tag = $value->export(); ?>
					<div class="name" contenteditable><?= $tag['name'] ?></div>
					<div class="del">X</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>
	<div class="separator">
		<div class="btn">Сохранить</div>
		<a href="/adminsc/settings/tag/new" class="btn">Добавить тег</a>
	</div>
</div>

