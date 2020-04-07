<div class="a-submenu">
	<div class="title">CRM</div>
		<div class="a-actions">

			<a href="crm/orders">Заказы</a>
			<a href='users'>Покупатели</a>

		</div>
</div>

<div class="a-content">
	<div class="a-breadcrumbs">
		<a href="/adminsc">Admin</a>
		<a href="/adminsc/crm">CRM</a>
		<a href="/adminsc/crm/users">Users</a>
		<div>User</div>
	</div>

	<div class="a-tabs-wrap">
		<div class="work-area">
			<div class="tabs">
				<input id="tab1" type="radio" name="tabs" checked>
				<label for="tab1" title="Подробно">Основное</label>
				<input id="tab2" type="radio" name="tabs">
				<label for="tab2" title="Права">Права</label>
				<input id="tab3" type="radio" name="tabs">
				<label for="tab3" title="Сео">Сео</label>
				<input id="tab4" type="radio" name="tabs">
				<label for="tab4" title="Картинки">Еще</label>

				<section id="content-tab1" class="column">

					<div class='admin-flex-table column'>
						<div class='row'>
							<strong>id :</strong>
							<span id='id'><?= $user['id'] ?: ''; ?></span>
						</div>
						<div class='row'>
							<strong>актив. :</strong>
							<input id="act" class="value checkbox" type="checkbox"
							       data-js-act='act' <?= $user['act'] ? 'checked' : ''; ?>>
							<label for="act"></label>
						</div>

						<div class='row'>
							<strong>подтвержден :</strong>
							<select name="conf" id="confirm" value=1 class="value">
								<option value="0" <?= $user['confirm'] == '0' ? 'selected' : ''; ?>>0</option>
								<option value="1" <?= $user['confirm'] == '1' ? 'selected' : ''; ?>>1</option>
							</select>
						</div>
						<div class='row'>
							<strong>email :</strong>
							<span class="value" id='email' contenteditable="true"><?= $user['email']; ?></span>
						</div>
						<div class='row'>
							<strong>фамилия :</strong>
							<span class="value" id='surname' contenteditable="true"><?= $user['surname']; ?> </span>
						</div>
						<div class='row'>
							<strong>имя :</strong>
							<span class="value" id='name' contenteditable="true"><?= $user['name']; ?> </span>
						</div>
						<div class='row'>
							<strong>отчетсво:</strong>
							<span class="value" id='middlename' contenteditable="true"><?= $user['middlename']; ?> </span>
						</div>
						<div class='row'>
							<strong>phone:</strong>
							<span class="value" id='phone' contenteditable="true"><?= $user['phone']; ?> </span>
						</div>
						<div class='row'>
							<strong>добавочный:</strong>
							<span class="value" id='extension' contenteditable="true"><?= $user['extension']; ?> </span>
						</div>
						<div class='row'>
							<strong>принят:</strong>
							<span>
                  <?
						$date = date('Y-m-d', strtotime($user['hired']));
						$date_format = $date != '1970-01-01' ? $date : NULL;
						?>
                <input class="value" type='date' id="hired" min="2016-08-14" max="2020-08-20"
                       value="<?= $date_format; ?>">
              </span>
						</div>
						<div class='row'>
							<strong>уволен:</strong>
							<span>
                  <? $date_format = date('Y-m-d', strtotime($user['fired'])) != '1970-01-01' ? date('Y-m-d', strtotime($user['fired'])) : NULL; ?>
                <input class="value" type='date' id="fired" min="2016-08-14" max="2020-08-20"
                       value="<?= $date_format ?>">
              </span>
						</div>
						<div class='row'>
							<strong>д.р.:</strong>
							<span>
                  <? $date_format = date('Y-m-d', strtotime($user['birthdate'])) != '1970-01-01' ? date('Y-m-d', strtotime($user['birthdate'])) : NULL; ?>
                <input class="value" type='date' id="bday" min="2016-08-14" max="2020-08-20"
                       value="<?= $date_format ?>">
              </span>
						</div>
						<div class='row'>
							<strong></strong>
						</div>
					</div>


				</section>
				<section id="content-tab2">
					<div class='admin-flex-table column'>
						<? foreach ($rights as $right): ?>
							<div class="row">
								<strong><?=
									$right['name']; ?>
								</strong>
								<input class="js-shared-right checkbox" id='<?= $right['id']; ?>' type="checkbox"
									<?= in_array($right['id'], $user['rights']) ? 'checked' : '' ?>>
								<label for="<?= $right['id']; ?>"></label>
							</div>
						<? endforeach; ?>
					</div>
				</section>


				<section id="content-tab3">
				</section>

				<section id="content-tab4">
				</section>

				<div class="separator">
					<div class="btn save_user">Сохранить</div>
					<div class="btn add_user">Добавить</div>
				</div>


			</div>
		</div>

	</div>


</div>
