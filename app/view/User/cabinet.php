<section class="wrap">

        <h3>Личный кабинет</h3>

            <a class="list" href="<?= PROJ ?>/user/edit" >Редактировать свой профиль</a>
            <? if (in_array('3', $user['rightId'])): ?>
                <a class="list" href="<?= PROJ ?>/adminsc">Admin</a>
            <? endif; ?>
            <? if (in_array('1', $user['rightId'])): ?>
                <a class="list" href="<?= PROJ ?>/test/edit/1">Редактировать тесты</a></li>
            <? endif; ?>
            <? if (in_array('2', $user['rightId'])): ?>
                <a class="list" href="<?= PROJ ?>/test/1">Проходить тесты</a>
            <? endif; ?>

</section>