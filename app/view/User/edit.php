<section>


	<? if (isset($result) && $result): ?>
		<p>Данные отредактированы!</p>
	<? endif; ?>
	<?php if (isset($errors) && is_array($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<li> - <?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	

	<form class="form-container" action="#" method="post">
		<div class = "form-title">Редактирование данных</div>
	
			<input class = "form-input" placeholder="Имя"  name="name"  value="<?= $user['name'] ?>" />
	
			<input class = "form-input" placeholder="Фамилия" name="surName" value="<?= $user['surName'] ?>" />
	
			<input class = "form-input" placeholder="Отчество" name="middleName" value="<?= $user['middleName'] ?>" />
	
			<input class = "form-input" placeholder="День рождения:" name="birthDate" type="date" value="<?= $user['birthDate'] ?>" />
	
			<input class = "form-input" placeholder="Телефон" name="phone" value="<?= $user['phone'] ?>" />
	
			<input class = "form-input" placeholder="email" name="email"  type="email"  required />
	
			<input class = "form-input" placeholder="••••••••" name="password" type="password"   required />
	
	
		<input type="submit" name="submit" class = "form-input submit" value="Сохранить" />
	</form>
	


</section>