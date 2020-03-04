<?= isset($cat['childs']) ? '<option class = "vert-menu__list">' : '<option>'?>
    <a href=
    <?= "/adminsc/catalog/category?id=". $cat['id'] ?>
       ><?= $cat['name'] ?>
    </a>
<? if (isset($cat['childs'])): ?>
    <select class = "vert-menu__drop">
        <?= $this->getMenuHtml($cat['childs']); ?>
    </select>
<? endif ?>
</li>