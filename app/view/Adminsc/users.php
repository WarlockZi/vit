  <div class="breadcrumbs-adm">
    <a href  = "index">Admin</a>
    <div>Users</div>
  </div>

<div class="content-90">
    <? $t = count($rightTypes); ?>

  <table>
    <tr>
      <th>id</th>
      <th>Фамилия</th>
      <th>Имя</th>
      <th>Отчество</th>
      <th colspan="<?= $t ?>">права</th>
      <th>сохр</th>
      <th>Conf</th>
      <th>e-mail</th>
      <th>удал</th>
      <th>phone</th>
      <th>Принят</th>
      <th>Уволен</th>
      <th>ДР</th>
    </tr>
    <?
    $i = 1;
    foreach ($us as $use):
       ?>
       <tr class = <?$userId = $use['id']; echo $userId ?>>
         <td><?=$userId?></td>
         <td>
           <input type = 'text' class="s-name" value = "<?= $use['surName'] ?>">
         </td>
         <td>
           <input type = 'text' class="name" value = "<?= $use['name'] ?>">
         </td>
         <td>
           <input type = 'text' class="m-name" value = "<?= $use['middleName'] ?>">
         </td> 
         
        <?
         $t = 0;
         $rights = explode(',', $use['rightId']);
         foreach ($rightTypes as $type):
            ?>
            <?$t++;?>
               <td>
                 <span><?=$t?></span><input <?=(in_array($type['id'], $rights))?'checked':''?> type="checkbox"  class="right <?= $i; ?>">
               </td>
         <? endforeach; ?>

         <td>
           <button id = '<?= $use['id'] ?>' class="save">save</button>  
         </td>
         <td>
           <input type = 'text' class="confirm" size="1" value = "<?= $use['confirm'] ?>">
         </td>
         <td>
           <input type = 'text' class="email" value = "<?= $use['email'] ?>">
         </td>
         <td>
           <button id = '<?= $i ?>' class="delete ">X</button>      
         </td>


         
         <td>
           <input type = 'text' class="phone" value = "<?= $use['phone'] ?>">
         </td>
         
         <td>
             <? $new_date_format = date('Y-m-d', strtotime($use['hired'])) != '01-01-1970' ? date('Y-m-d', strtotime($use['hired'])) : NULL; ?>
           <input type = 'date' class="hired" min="2016-08-14" max="2020-08-20" value = "<?=$new_date_format; ?>" >
         </td>
         <td>
             <? $new_date_format = date('Y-m-d', strtotime($use['fired'])) != '1970-01-01' ? date('Y-m-d', strtotime($use['fired'])) : NULL; ?>
           <input type = 'date' class="fired" min="2016-08-14" max="2020-08-20" value = "<?= $new_date_format ?>" >
         </td>
         <td>
             <? $new_date_format = date('Y-m-d', strtotime($use['birthDate'])) != '1970-01-01' ? date('Y-m-d', strtotime($use['birthDate'])) : NULL; ?>
           <input type = 'date' class="bday" min="2016-08-14" max="2020-08-20" value = "<?= $new_date_format ?>" >
         </td>


       </tr>

    <? endforeach; ?>
  </table>
  <br>
  <br>
  <button class = "btnadd-user">Создать нового</button>




</div>
