<div class="a-submenu">
  <div class="title">Каталог</div>

  <div class="a-actions">
      <?
      new app\view\widgets\menu\Menu([
          'class' => 'admin-category-menu',
          'tpl' => ROOT . "/app/view/widgets/menu/menu_tpl/site_admin_category_menu.php",
          'cache' => 60,
          'sql' => "SELECT * FROM category "
      ]);
      ?>
    <a href  = "/adminsc/catalog/products">Товары</a>
  </div>
</div>

<div class="a-content">

  <div class="a-breadcrumbs">
    <a href  = "/adminsc/index">Admin</a>
    <div>Каталог</div>
  </div>
<section>
	<div class="separator btns">
		<a href="/adminsc/catalog/category/new" class="a-btn-action">Добавить категорию</a>
	</div>
</section>


</div>
