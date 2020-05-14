<?php

namespace app\core;

class Registry {

   public static $objects = [];
   protected static $instance;
   protected $reestr;

   protected function __construct() {
		$this->reestr = [
			'cache' => 'app\core\Cache',
			'main' => 'app\model\Main',
			'prop' => 'app\model\Prop',
			'user' => 'app\model\User',
			'test' => 'app\model\Test',
			'freetest' => 'app\model\Freetest',
			'product' => 'app\model\Product',
			'category' => 'app\model\Category',
			'adminsc' => 'app\model\Adminsc',
			'tag' => 'app\model\Tag',
			'right' => 'app\model\Right',
			//'instructions' => 'app\model\Instructions',
		];
      foreach ($this->reestr as $name => $object) {
         self::$objects[$name] = new $object;
      }
   }

   public static function instance() {
      if (self::$instance === null) {
         self::$instance = new self;
      }
      return self::$instance;
   }

   public function __get($name) {
      if (is_object(self::$objects[$name])) {
         return self::$objects[$name];
      }
   }

   public function __set($name, $object) {
      if (!isset(self::$objects[$name])) {
         self::$objects[$name] = new $object;
      }
   }

}
