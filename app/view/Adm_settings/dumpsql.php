<div class="a-tabs-wrap">


  <div class="a-breadcrumbs">
    <a href  = "/adminsc">Admin</a>
    <a href  = "index">Настройки</a>
    <a href  = "dump">Dump</a>
    
    <div>Скопировать базу данных</div>
  </div>


  <? if (in_array('3', $user['rights'])): // admin ?>
     <div class="a-actions">
         
         <input type="text" class="dump-folder"> 
         
         
         

       <a href  = '/adminsc/settings/DumpWWW'>Dump WWW</a>
    
     </div>
  <? endif; ?>





</div>