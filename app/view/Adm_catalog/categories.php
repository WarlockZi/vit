<div class="wrap-admin">

  <div class="breadcrumbs-adm">
    <a href  = "/adminsc/index">Admin</a>
    <a href  = "/adminsc/catalog">Каталог</a>
    <div>Категории товаров</div>
  </div>

  <div class="wrap-admin">
    <div class="column categories">
      <? foreach ($iniCatList as $key => $value) : ?>
      <a class="row" href="<?= PROJ ?>/adminsc/catalog/category?id=<?= $value['id'] ?>">
         <span><?= $value['alias'] ?></span>
        <span><?= $value['title'] ?></span>
      </a>
      <? endforeach; ?>
    </div>
  </div>
  
</div>