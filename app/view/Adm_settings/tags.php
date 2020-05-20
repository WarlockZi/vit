<div class="a-submenu">
	<div class="title">Тэги</div>
	<div class="tags-menu">
		<? foreach ($tags as $tag): ?>
			<div class="card">
				<div class = "name"><?= $tag['name']; ?></div>
				<div class="del" data-id= <?= $tag['id']; ?>>X</div>
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
				<div id="id" hidden></div>
				<div id="name" class="name field" contenteditable></div>
				<div class="tag-del">X</div>
			</div>
			<div class="shared-wrap">Категория
				<div class="select">
					<div class="select-wrap">
					<? foreach ($tags as $tag): ?>
						<? if (!$tag->sharedTagList): ?>
							<div class="shared">
								<div class="radio">
									<div class="dot"></div>
								</div>
								<div><?= $tag['name']; ?></div>
							</div>
						<? endif; ?>
					<? endforeach; ?>
					</div>
				</div>

			</div>

		</div>
	</div>

	<div class="separator">
		<div class="btn tag-save">Сохранить</div>
	</div>
</div>

