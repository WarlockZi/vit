<style>
	p {
		font-size: 10px;
	}
</style>
<main>

	<form class="form-container" action="#" method="post">

		<div class="title">Регистрация</div>

		<input id = "email" type="email" class="input field"
		       placeholder="E-mail" required/>

		<div class="register-password-wrap row">
			<input id = "password" type="password" class="input field"
			       placeholder="Пароль" required/>
			<img class="img-svg view" src="/pic/view.svg" alt="">
			<img class="img-svg no-view" src="/pic/no-view.svg" alt="">
		</div>

		<div class="register button-accent">Зарегистрироваться</div>
		<div class="registration_forgot">
			<a class="button" href="/user/forgot">Забыли пароль</a>
			<a class="button" href="/user/login">Войти</a>
		</div>
	</form>
	<div class='registration-disclaimer'>
		<p>Нажимая на кнопку "Регистрация", вы принимаете условия <a href="/about/oferta">Публичной оферты</a> и
			подтверждаете, что ознакомились с <a href="/about/oferta">Политикой</a> в отношении обработки персональных
			данных, принимаете ее условия и подтверждаете свое согласие на обработку персональных данных.</p>
	</div>


</main>