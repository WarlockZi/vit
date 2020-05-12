<div class="a-tabs-wrap">


  <div class="a-breadcrumbs">
    <a href  = "index">Admin</a>
    <a href  = "index">Настройки</a>
    <div>Картинки</div>
  </div>

  <div class="pic row">
      <? if (key_exists('admin', $user['sharedRight'])): // admin ?>
         <? foreach ($pics as $key => $value): ?>
          <div class="column">
              <div >
	              <?$pifc = $value->export();?>
                <img src="/pic/test/<?=$pifc['nameHash']?>" alt="">
              </div>
            <span><?= $value['nameRu'] ?> </span>
          </div>
       <? endforeach; ?>
    <? endif; ?>
  </div>




</div>