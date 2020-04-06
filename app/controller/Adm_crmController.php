<?php

namespace app\controller;

use app\core\App;
use app\core\Base\View;
use app\controller\AdminscController;

class Adm_crmController extends AdminscController {

   public function __construct($route) {
      parent::__construct($route);
   }

   public function actionIndex() {   }

   public function actionUsers() {
      $users = \R::findAll('user');
      $this->set(compact('users'));
   }

   public function actionUser() {

      if (!isset($_GET['id']) || !$id = $_GET['id']) {
         header('Location: /adminsc/crm/users');
      };
//      $user = \R::load('user', $id);
//      $user = $user->export();
      $rights = \R::findAll('right');
      $this->set(compact('rights'));
      $arr = $this->vars['user']->sharedRight;
		foreach ( $arr as $item) {
			$a[] = $item['id'];
      }
      $this->vars['user']->rights = $a;
   }

}
