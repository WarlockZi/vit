<main>

    <? if (isset($_SESSION['msg'])) echo $_SESSION['msg'] ?>
<!--    <form action='/user/login' method="post" class="form-container">-->
    <form  method="post" class="form-container">
        <h1 class="form-title">Вход на сайт</h1>
        <input name="email" class="form-input" type="email" placeholder="E-mail"
               value="<?= isset($_SESSION['reg']['email']) ? $_SESSION['reg']['email'] : ''; ?>"/>
        <input name="pass" class="form-input" type="password" placeholder="Пароль"/>
        <input class="form-input submit"  id="login" value="Войти"/>
        <div class="registration_forgot">
            <a class="register" href="/user/register">Регистрация</a>
            <a class="forgot" href="/user/returnpass">Забыли пароль</a>
        </div>
    </form>

</main>
