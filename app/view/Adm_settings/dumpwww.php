<div class="wrap-admin">


  <div class="breadcrumbs-adm">
    <a href  = "/adminsc">Admin</a>
    <a href  = "index">Настройки</a>
    <a href  = "dump">Dump</a>
    <div>Скопировать WWW</div>
  </div>


  <? if (in_array('3', $user['rightId'])): // admin ?>
     <div class="admin-actions">

       <a href  = '/adminsc/settings/DumpWWW'>Dump WWW</a>
    
     </div>
  <? endif; ?>





</div>