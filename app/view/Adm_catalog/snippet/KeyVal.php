<div class="prop-head ">

  <? if (isset($arr['parents'])): ?> 

     <div class="parent-prop">
       Свойства родительской категории
     </div>
  <? else: ?>

     <div class="parent-prop">
       Свойства категории    
     </div>
     <div class="add-prop">
       Добавить свойство
     </div>

  <? endif; ?>

</div>
<div class="property-block">
    <? if ($catProps): ?>


     <? foreach ($catProps as $prop): ?>
        <div class="property" data-prop = '<?= $prop[0]['id'] ?>'>
          <div class="prop blue">

            <!--         <div class="del-prop">
                       <span>X</span>
                       <span>УДАЛИТЬ</span>
            
                     </div>-->
            <?= $prop[0]['name'] ?>

          </div>
          <div class="val-block column">
              <? foreach ($prop['vals'] as $val): ?>
               <div class="val-item">
                   <? if (isset($arr['parents'])): ?> 
                    <input type="checkbox">
                 <? endif; ?>
                 <div class="value" data-id = "<?= $val['id'] ?>">
                   <?= $val['name'] ?>
                 </div>
               </div>
            <? endforeach; ?>
          </div>



        </div>
     <? endforeach; ?>
  <? endif; ?>
</div>
