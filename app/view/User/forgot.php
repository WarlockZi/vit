<section>

    <?=$_SESSION['msg']?>
    <?unset($_SESSION['msg'])?>
	
    <form class="form-container" method='POST'>
		<div class = "title">Мы вышлем Вам новый пароль на e-mail</div>
		<input  type="email" id ="email" class="field"
        placeholder="E-mail"  value="<?=isset($_SESSION['reg']['email'])?$_SESSION['reg']['email']:'';?>"/>
		<div class = "button-accent forgot">Отправить</div>
	</form>	
</section>