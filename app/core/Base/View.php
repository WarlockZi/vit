<?php

namespace app\core\Base;

class View {

   public $route;
   public $layout;
   public $view;
   public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
   public static $jsCss = ['js' => [], 'css' => []];

   function __construct($route, $layout = '', $view = '') {

      $this->route = $route;
// Если в вид передали false то и в $this->layout устанавливаем false для отключения layout
      if ($layout === false) {
         $this->layout = false;
      } else {

         $this->layout = $layout ?: ''; //LAYOUT;
      }
      $this->view = $view;
   }

   public function render($vars) {
      if (is_array($vars)) {
         extract($vars);
      }
      $file_view = ROOT . "/app/view/{$this->route['controller']}/{$this->view}.php";
// если режим отладки вкл, ставим метку и не кешируем
      ob_start();
      if (is_file($file_view)) {
         require $file_view;
      } else {
         echo "<br>Не найден файл вида {$this->view} ";
      }
      $content = ob_get_clean();
      ob_start();
// Если в вид передали false то и в $this->layout устанавливаем false для отключения layout
      if ($this->layout !== FALSE) {
         $file_layout = ROOT . "/app/view/layouts/{$this->layout}.php";
         if (is_file($file_layout)) {
            require $file_layout;
         } else {
            '<br> Не найден шаблон Layout' . $this->layout;
         }
      }
      $page_cache = ob_get_clean();
      echo $page_cache;
   }


	public function format_date(string $date)
	{
		return date('Y-m-d',strtotime($date));
	}

   public static function setJsN(string $path) {
       self::$jsCss['js'] = $path;
   }

    public static function setCssN(string $path) {
        self::$jsCss['css'] = $path;
    }

   public static function getCSS() {
      echo self::$jsCss['css'];
   }

   public static function getJS() {
      echo self::$jsCss['js'];
   }

   public static function getMeta() {
      echo '<title>' . self::$meta['title'] . '</title>
               <meta name = "description" content = "' . self::$meta['desc'] . '">
               <meta name = "keywords" content = "' . self::$meta['keywords'] . '">';
   }

   public static function setMeta($title = '', $description = '', $keywords = '') {
      self::$meta['title'] = $title;
      self::$meta['desc'] = $description;
      self::$meta['keywords'] = $keywords;
   }

   public static function e($str) {
      return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
   }

}
