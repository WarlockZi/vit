<section>
    
	<?if(isset($_SESSION['msg']))echo $_SESSION['msg']?>
    <form  action = '#' method="post" class = "form-container">
        <h1 class = "form-title">Вход на сайт</h1>
			<input class = "form-input" type="email" placeholder="E-mail" value="<?= isset($_SESSION['reg']['email']) ? $_SESSION['reg']['email'] : ''; ?>"/>
			<input class = "form-input" type="password"  placeholder="Пароль" />
			<input class = "form-input submit" type="submit"  id = "login" value="Войти"/>
			<input type = "hidden" name="token" value = <?=$token?>>
        <ul class="bottom"> 
            <li>
                <a class = "register" href="<?= PROJ ?>/user/register">Регистрация</a>
            </li>
            <li>
                <a class = "forgot" href="<?= PROJ ?>/user/returnpass">Забыли пароль</a>
            </li>
        </ul>
	</form>


</section>
