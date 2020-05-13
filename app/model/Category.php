<?php

namespace app\model;

use app\core\App;
use app\core\Base\Model;
use RedBeanPHP\Logger\RDefault;

class Category extends Model
{

	public $table = 'category';

	static function getCategoryParents($parentId, $parents = [], $i = -1)
	{
		if ($parentId) {
			$parent = \R::find('category', $parentId);
			$parent[0]['props'] = explode(',', $parent[0]['props']);
			$parents = array_merge($parents, $parent);
			$i++;
			return $this->getCategoryParents($parents[$i]['parent'], $parents, $i);
		} else {
			return array_reverse($parents);
		}
	}

	static function getAssocCategory($options)
	{
		$onlyActive = $options['active'] ? "`act` = ?" : '';
		$res = \R::findAll('category', $onlyActive, ['1']);
		$all = [];
		foreach ($res as $key => $v) {
			$v = $v->export();
			$res = \R::findAll('product', 'parent = ?', [$v['id']]);
			$all[$v['id']] = $v;
			$all[$v['id']]['products'] = $res;
		}
		return $all;
	}

	static function categoriesTree($cat)
	{
		$tree = [];
		$data = $cat;
		foreach ($data as $id => &$node) {
			if (isset($node['parent']) && !$node['parent']) {
				$tree[$id] = &$node;
			} elseif (isset($node['parent']) && $node['parent']) {
				$data[$node['parent']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}

	static function findValueByKey($inputArray, $findKey)
	{
		foreach ($inputArray as $key => $value) {
			if ($findKey == $key) {
				return $value;
			} elseif (is_array($value) && isset($value['childs'])) {
				$tmp = self::findValueByKey($value['childs'], $findKey);
				if ($tmp !== false) {
					return $tmp;
				}
			}
		}
		return false;
	}

	static function getCategoriesProducts($aCategories, $products = [])
	{
		foreach ($aCategories as $key => $value) {
			if (isset($value['childs']) && is_array($value['childs'])) {
				$this->getCategoriesProducts($value['childs'], $products);
				$products = array_merge($products, $value['products']);
			}
			$products = array_merge($products, $value['products']);
		}
		return $products;
	}

	public function delProp($obj)
	{
		$propId = $obj['values']['shared']['id'];
		$cat = \R::load('category', $obj['id']);

		unset($cat->sharedProp[$propId]);
		\R::store($cat);
	}

	public static function getCategoryChildren($parentId)
	{
		$cat = self::getAssocCategory(['active' => 1]);
		$tree = self::categoriesTree($cat);
		$categories = self::findValueByKey($tree, $parentId);
		if (isset($categories['childs'])) {
			$children['categories'] = $categories['childs'];
			$products = self::getCategoriesProducts($categories['childs']);
		} else {
			$products = self::getCategoriesProducts(array($categories));
		}
		$products ?? $children['products'] = $products;

		if (!$products && !isset($categories['childs'])) {
			return FALSE;
		}
		return $children;
	}

	public function isCategory($url)
	{
		$category = 0;
		if (!$category) {
			$arr = explode('/', $url);
			if (count($arr) > 3 && $arr[0] !== 'adminsc') {
				http_response_code(404);
				exit(include ROOT . '/public/404.html');
			} else {
				return false;
			}
			$category = $this->findOne($arr[0], 'alias');
			if ($category && is_array($category)) {
				$category['parents'] = self::getCategoryParents($category['parent']);
				$category['children'] = self::getCategoryChildren($category['id']);
			} else {
				return FALSE;
			}
		}

		return $category;
	}

	public function getCategory($id)
	{
		$category = \R::findOne('category', $id); //$this->findOne($id);

		if ($category) {

			$category['props'] = $category->sharedProps;
			$category['parents'] = $this->getCategoryParents($category['parent']);
			if ($ch = $this->getCategoryChildren($category['id']))
				$category['children'] = $ch;
			$parentProps = [];
			foreach ($category['parents'] as $value) {
//            $arr = array_intersect($parentProps, $value['prop']);
				$parentProps = array_merge($parentProps, $value['props']);
			}
			$category['parentProps'] = array_unique($parentProps);
		}
		if (!$category) {
			return FALSE;
		};
		return $category;
	}

	public function getActiveCategories($fromCache = 0)
	{
		if ($fromCache) {
			$list = App::$app->cache->get('list');
			if (!$list) {
				$list = $this->getActiveCategories();
				App::$app->cache->set('list', $list, 30);
				return $list;
			}
		}

		return \R::findAll('category', "WHERE parent = 0 AND act = 1");

	}

}
