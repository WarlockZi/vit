
<div class="site">
    <? foreach ($cats_id as $id): ?>
     <a href="/catalog/<?= $id['name']; ?>">
       <div class="badge">
         <?= $id['id']; ?>
         <?= $id['alias']; ?>
       </div>
     </a>
  <? endforeach; ?>
</div>