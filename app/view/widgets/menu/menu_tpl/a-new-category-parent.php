<?
$d = $cat['parent'] ? '-' : '';
$space = '&nbsp;&nbsp;' ?>

<option value='<?= $cat['id'] ?>'>
		<?= $tab . $space . $d . $space . $cat['name'] ?>
</option>

<? if (isset($cat['childs'])): ?>
	<?= $this->getMenuHtml($cat['childs'], $tab . $space . $space); ?>
<? endif ?>
