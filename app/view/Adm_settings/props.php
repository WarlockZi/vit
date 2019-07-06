<div class="wrap-admin">

  <div class="breadcrumbs-adm">
    <a href  = "/adminsc/index">Admin</a>
    <a href  = "/adminsc/settings">Настройки</a>
    <div>Настройка свойств</div>
  </div>

  <div class="wrap-admin">
    <div class="column">
      <div class="prop-head ">

        <div class="parent-prop">
          Свойства     
        </div>
        <div class="add-prop">
          Добавить свойство
        </div>

      </div>
      
      <? app\core\App::$app->category->getProp($catProps); ?>
    </div>
  </div>
</div>

</div>