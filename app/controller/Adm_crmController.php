<?php

namespace app\controller;

use app\model\Right;
use app\model\User;

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

      $rights = Right::getAllRights();

      $showUser = User::getById((int)$_GET['id']);
      $this->set(compact('showUser', 'rights'));
   }
}
