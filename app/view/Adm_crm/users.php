<div class="a-submenu">
  <div class="title">CRM</div>
     <div class="a-actions">

       <a href  = "crm/orders">Заказы</a>
       <a href  = 'users'>Покупатели</a>

     </div>
</div>

<div class="a-content">
  <div class="a-breadcrumbs">
    <a href  = "/adminsc">Admin</a>
    <a href  = "/adminsc/crm">CRM</a>
    <div>Users</div>
  </div>


    <div class="grid">

      <span><strong>fio</strong></span>
      <span><strong>con</strong></span>
      <span><strong>email</strong></span>

      <? foreach ($users as $use): ?>

         <span><a href="/adminsc/crm/user?id=<?= $use['id']; ?>"><?= $use['surName']; ?> <?= $use['name']; ?> <?= $use['middleName']; ?>    </a></span>
         <span><?= $use['confirm']; ?></span>
         <span><?= $use['email']; ?></span>

      <? endforeach; ?>


<!--    <button class = "btnadd-user">Создать нового</button>-->
  </div>
	<div class="separator">
		<div class="btn">Сохранить</div>
	</div>


</div>
