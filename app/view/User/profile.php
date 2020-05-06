<section>

	<div class="form-container" action="/user/edit" method="post">
		<div class="form-title">Редактировать профиль</div>
		<div id="id" hidden><?= $user['id'] ?></div>

		<input class="form-input field" placeholder="Имя" id="name" value="<?= $user['name'] ?>"/>

		<input class="form-input field" placeholder="Фамилия" id="surname" value="<?= $user['surname'] ?>"/>

		<input class="form-input field" placeholder="Отчество" id="middlename" value="<?= $user['middlename'] ?>"/>

		<input class="form-input field" placeholder="День рождения:" id="bday" type="date"
		       value="<?= $user['bday'] ?>"/>

		<input class="form-input field" placeholder="Телефон" id="phone" value="<?= $user['phone'] ?>"/>

		<input class="form-input field" placeholder="email" id="email" type="email" value="<?= $user['email'] ?>" required/>

		<div class="save_profile submit">Сохранить</div>
	</form>


</section>