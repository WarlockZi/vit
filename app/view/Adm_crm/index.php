<div class="adm-submenu">



  <div class="title">CRM</div>

  <? if (in_array('3', $user['rights'])): // admin ?>
     <div class="admin-actions">

       <a href  = "crm/orders">Заказы</a>
       <a href  = 'crm/users'>Покупатели</a>

     </div>
  <? endif; ?>
</div>

<div class="adm-content">
  <div class="a-breadcrumbs">
    <a href  = "/adminsc/index">Admin</a>
    <div>CRM</div>
  </div>

</div>