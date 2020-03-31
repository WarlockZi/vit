<div class="a-submenu">

    <div class="title">Свойства</div>
    <div class="a-actions">
        <? foreach ($catProps as $key): ?>
            <div data-id=<?= $key['id'] ?> class="props-actions_row">

                <div><?= $key['name'] ?></div>
            </div>
        <? endforeach; ?>
    </div>
</div>
<div class="a-content">
    <div class="a-breadcrumbs">
        <a href="/adminsc">Admin</a>
        <a href="/adminsc/settings">Настройки</a>
        <div>Настройка свойств</div>
    </div>

    <H2>Настройка свойств</H2>


    <? foreach ($catProps as $key): ?>

        <div class="props-container row" data-prop-id=<?= (int) $key['id'];?>>
        <span>
           <span style="display: flex;align-items: center;"> <?= $id = $key['id'] ?>    </span>
         </span>
            <span>
           <span data-id="<?= $id ?>" class="sort" contenteditable> <?= $key['sort'] ?>    </span>
         </span>

            <span>
           <input data-id="<?= $id ?>" class="property-name" contenteditable size="35" type="text"
                  value="<?= $key['name'] ?>">
         </span>

            <span>
           <select data-id="<?= $id ?>" class="type">
	           <? $t = \R::find('props', $key['id']); ?>
             <option value="select" <?= $key['type'] == 'select' ? 'selected' : '' ?>>выбор одного значения</option>
             <option value="multi" <?= $key['type'] == 'multi' ? 'selected' : '' ?>>выбор нескольких значений</option>
             <option value="string" <?= $key['type'] == 'string' ? 'selected' : '' ?>>строка</option>
           </select>
         </span>

            <span>
           <a href="prop?id=<?= $id ?>" data-id="<?= $id ?>" class="edit">
           </a>
         </span>
        </div>
    <? endforeach; ?>

    <!--  <div class="separator">
         <button>
            сохранить
         </button>

      </div>-->

</div>