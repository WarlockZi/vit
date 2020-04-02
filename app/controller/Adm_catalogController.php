<?php

namespace app\controller;

use app\core\App;
use app\controller\AppController;
use app\model\Catalog;
use app\model\Prop;
use app\core\Base\View;
use R;

class Adm_catalogController extends AdminscController
{

    public function __construct($route)
    {
        parent::__construct($route);

        if ($this->isAjax()) {
            if (isset($_POST['param'])) {
                $arr = json_decode($_POST['param'], true);
                $func = $arr['action'];
                App::$app->adminsc->$func($arr);
                exit();
            };
        }
    }

    public function actionProducts()
    {

        $fName = $fAct = $fArt = 0;
        $params = explode('&', $_SERVER['QUERY_STRING'], 2);
        if (count($params) > 1) {
            $QSA = urldecode($params[1]);
            $pattern = '/&?page=[0-9]+&?/';
            $replacement = '';
            $QSA = preg_replace($pattern, $replacement, $QSA);
        }
        if (isset($_GET['name'])) {
            $fName = $_GET['name'];
        }
        if (isset($_GET['act'])) {
            $fAct = $_GET['act'];
        }
        if (isset($_GET['art'])) {
            $fArt = $_GET['art'];
        }
        $perpage = 15;
        // Получение текущей страницы
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
            if ($page < 1)
                $page = 1;
        } else {
            $page = 1;
        }
// начальная позиция для запроса
        $start_pos = ($page - 1) * $perpage;

        if ($fName || $fAct || !$fAct || $fArt) {
            $where = App::$app->adminsc->where($fName, $fAct, $fArt);
            $params = App::$app->adminsc->params($fName, $fAct, $fArt);
            $sql = "SELECT * FROM products $where LIMIT $start_pos,$perpage";
            $products = App::$app->product->findBySql($sql, $params);
            $sql = "SELECT * FROM products $where";
            $productsCnt = count(App::$app->product->findBySql($sql, $params));
            $cnt_pages = ceil($productsCnt / $perpage);
            if (!$cnt_pages)
                $cnt_pages = 1;
            if ($page > $cnt_pages)
                $page = $cnt_pages;
        } else {
            $sql = "SELECT * FROM products LIMIT $start_pos,$perpage";
            $products = App::$app->product->findBySql($sql);
            $productsCnt = (INT)App::$app->product->productsCnt();
        }
        $cnt_pages = ceil($productsCnt / $perpage);
        if (!$cnt_pages)
            $cnt_pages = 1;

        if ($page > $cnt_pages)
            $this->set(compact('products', 'productsCnt', 'cnt_pages', 'QSA'));
    }

    public function actionProduct()
    {

        if (isset($_GET['id'])) {
            if ($_GET['id'] == 'new') {
                if (!isset($_GET['category'])) {
                    exit('не указана родительская категория !');
                }

                $product = [];
                $id = (int)$_GET['category'];
                $category = App::$app->category->getCategory($id);
                $props = App::$app->prop->getProps();
                $this->set(compact('product', 'category', 'props'));
                $this->view = 'product_new';

            } else {
                $id = (int)$_GET['id'];

                $product = App::$app->product->getProduct($id);
                $product['props'] = json_decode($product['props'], true);

                $product['img'] = App::$app->product->getProductImg($id);
                $category = App::$app->category->getCategory($product['parent']);

                $props = App::$app->prop->getProps();
                $this->set(compact('product', 'category', 'props'));
            }
        }
    }

    public function actionIndex()
    {
        $iniCatList = App::$app->category->getActiveCategories();
        $this->set(compact('iniCatList'));
    }

    public function actionCategories()
    {
        $iniCatList = App::$app->category->getActiveCategories();
        $this->set(compact('iniCatList'));
    }


    public function actionCategoryNew()
    {
        $this->view = 'category_new';
//        $props = [];
//        $parent = isset($_GET['parent']) && (int)$_GET['parent'] !== 0 ? (int)$_GET['parent'] : 0;
        $idAutoincrement = App::$app->category->autoincrement('category');
        $category['id'] = $idAutoincrement;

        $this->set(compact('category'));
    }

    /**
     * @param $cat
     * @return array of parents of category with props
     */
    public function getCatParentsWithProps($cat, &$arr = [])
    {
        $parent_id = $cat->parent;
        $parent = R::load('category', $parent_id);
        $parent_name = $parent->name;
        if ($parent_id != 0) {
            $arr[$parent_name] = $parent->export();
            $arr[$parent_name]['props'] = $this->getCatProps($parent);
            $this->getCatParentsWithProps($parent, $arr);
        }
        return array_reverse($arr);
    }


    public function getCatProps($cat, $parent_props = [])
    {
        if ($props = $cat->sharedProp) {
            foreach ($props as $prop) {
                $arrProps[$prop->name] = $prop->export();
            }
			  return array_diff_key($arrProps, $parent_props);
        }
        return [];
    }

    public function getAllParentsProps($parentsWithProps)
    {
        $arr_parent_props = [];

        foreach ($parentsWithProps as $k) {
			  $arr_parent_props = array_merge($arr_parent_props, $k['props']);
        }
        return $arr_parent_props;
    }

    public function getAddableProps($parentsProps, $categoryProps)
    {
        $props1 = R::findAll('prop');
        foreach ($props1 as $prop) {
            $props[$prop->name] = $prop->export();
        }
        $arr = array_diff_key($props, $categoryProps);
        $arr = array_diff_key($arr, $parentsProps);
        return $arr;
    }

    public function get_cat_with_null_fields()
    {
        $category = \R::findOne('category');
        $category = $category->export();
        foreach ($category as $key=>$item) {
            $arr[$key] = '';
        }
        return $arr;
    }

    public function actionCategory()
    {
        $id = (int)$_GET['id'];

        if ($id == 'new') {
            $category = $this->get_cat_with_null_fields();
            $parentsProps = $this->getAllParentsProps($parentsWithProps);
            $addableProps = $this->getAddableProps($parentsProps, $category['props']);
            $this->set(compact('category', 'addableProps'));
        }else{
            $category = R::load('category', $id);
            $parentsWithProps = $this->getCatParentsWithProps($category);
            $parentsProps = $this->getAllParentsProps($parentsWithProps);
            $category->props = $this->getCatProps($category, $parentsProps);
            $addableProps = $this->getAddableProps($parentsProps, $category['props']);

            $category->catParentsWithProps = $parentsWithProps;
            $category = $category->export();

            $this->set(compact('category', 'addableProps'));
        }

    }

}
