<div class="a-tabs-wrap">


  <div class="a-breadcrumbs">
    <a href  = "index">Admin</a>
    <a href  = "index">Настройки</a>
    <div>Картинки</div>
  </div>

  <div class="pic-wrap row">
      <? if (key_exists('admin', $user['sharedRight'])): // admin ?>
         <? foreach ($pics as $key => $value): ?>
          <div class="card">
              <div class = "pic">
	              <?$pifc = $value->export();?>
                <img src="/pic/test/<?=$pifc['nameHash']?>" alt="">
              </div>
              <div class="name"><?=$pifc['nameHash']?></div>
              <div class="art"><?=$pifc['nameRu']?></div>
            <span><?= $value['nameRu'] ?> </span>
          </div>
       <? endforeach; ?>
    <? endif; ?>
  </div>




</div>