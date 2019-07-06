<?php

namespace app\model;

use app\model\Test;
use app\core\Base\Model;

class Catalog extends Model {

   public $table = 'products';


   public function isProduct($url) {

      $arr = explode('/', $url);

      if ($product = $this->findOne($arr[1], 'name')) {
         return $product;
      }
      return FALSE;
   }

   public function productsCnt() {

      $sql = 'SELECT COUNT(*) FROM PRODUCTS';
      $arr = $this->findBySql($sql)[0];
      return $arr['COUNT(*)'];
   }

//   public function getCatChildren($id) {
//      // получим детей
//      $sql = 'SELECT * FROM category WHERE parent = ?';
//      $params = [$id];
//      return $this->findBySql($sql, $params);
//   }

//   public function getCategory($id) {
//      $sql = 'SELECT * FROM category WHERE id = ?';
//      $params = [$id];
//      return $this->findBySql($sql, $params);
//   }

//   public function getCategoryParents($parentId) {
//// получим родителей
//      $i = 0;
//      while ($parentId) {
//         $i++;
//         $sql = 'SELECT parent,alias FROM category WHERE id = ?';
//         $params = [$arr['parent']];
//         $parent = $this->findBySql($sql, $params)[0];
//         $arr['parents'][$i]['name'] = $parent['alias'];
//         $arr['parents'][$i]['id'] = $arr['parent'];
//         $parentId = (int) $parent['parent'];
//      }
//      return $arr;
//   }



   public function getProducts($categoryId) {

      $param = [$categoryId];
      $sql = 'SELECT * FROM products WHERE parent = ?';
      $products = $this->findBySql($sql, $param);
      return $products;
   }

   public function getProduct($productId) {

      $param = [$productId];
      $sql = 'SELECT * FROM products WHERE id = ?';
      $product = $this->findBySql($sql, $param);
      return $product[0];
   }

}
