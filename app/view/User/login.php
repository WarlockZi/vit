<main>

    <? if (isset($_SESSION['msg'])) echo $_SESSION['msg'] ?>
<!--    <form action='/user/login' method="post" class="form-container">-->
    <form  method="post" class="form-container">
        <h1 class="title">Вход на сайт</h1>
        <input id="email" type="email" placeholder="E-mail"
               value="<?= isset($_SESSION['reg']['email']) ? $_SESSION['reg']['email'] : ''; ?>"/>
        <input id="pass" type="password" placeholder="Пароль"/>
        <div class="button-accent login">Войти</div>
        <div class="registration_forgot">
            <a class="button" href="/user/register">Регистрация</a>
            <a class="button" href="/user/forgot">Забыли пароль</a>
        </div>
    </form>

</main>
