<div class="overlay"></div>

<div class="messageBox">
  <div class="messageTitleBar">
    <div class="messageTitle">Выберите свойства</div>
  </div>

  <div class="prop-list">
      <? foreach ($allProps as $key): ?>
         <? if (!in_array($key['id'], $propIdsOnPage)): ?>
          <div class="prop-name" id = '<?= $key['id'] ?>'>
            <input id = '<?= $key['id'] ?>' type="checkbox">
            <div class="name flex1"><?= $key['name'] ?></div>

            <div class="prop-val-list column flex1">
                <? foreach ($key['vals'] as $key): ?>
                 <div class="row">
                   <label for=''class="prop-val"><?= $key['name']; ?>
                   </label>
                 </div>
              <? endforeach; ?>
            </div>
          </div>
       <? endif; ?>
    <? endforeach; ?>

  </div>
  <div class="messageClose">Закрыть</div>
</div>