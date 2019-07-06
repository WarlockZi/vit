
<div class="property-block">
    <? foreach ($prop as $key): ?>
     <div class="property" data-prop = '<?= $key['id'] ?>'>
       <input size="50" type="text" value="<?= $key['name'] ?>">

       <div class="prop">
         <div class="left-set">
           <input  class = "check" type="checkbox" <?= $key['type'] == 'multy' ? 'checked' : '' ?>>
           <label class = 'multy'>
             мульти</label>

         </div>
         <div class="val">
             <? foreach ($key['val'] as $k): ?>
              <div class="value" data-id = "<?= $k['id'] ?>" contenteditable="true">
                  <?= $k['name'] ?>
              </div>
           <? endforeach; ?>
           <div class="add-prop-val clear button">+</div>
         </div>


         <!--         <div class="del-prop">
                    <span>X</span>
                    <span>УДАЛИТЬ</span>
                  </div>-->

       </div>

     </div>
  <? endforeach; ?>
</div>
