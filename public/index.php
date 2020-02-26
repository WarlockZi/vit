<?

use app\core\Router;
use app\core\App;

session_start();

	error_reporting(1);
if ($_SERVER['HTTP_HOST'] == 'vitexopt.ru') {
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	define('DEBU', '0'); //0-не выводить ошибки
 } else {
	define('ROOT', dirname(__DIR__));
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	define('DEBU', '1'); //0-не выводить ошибки
}

function vitexAutoload($class)
{
	$file = ROOT . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	if (is_readable($file)) {
		require_once $file;
	}
}

spl_autoload_register('vitexAutoload');

new App;

//$mi = new \app\core\Migrations();
//$mi->up();

$url = $_SERVER['QUERY_STRING'];

Router::add('^.?search.?', ['controller' => 'search', 'action' => 'index']); // fw/ -> main/index

Router::add('^/(?P<action>[a-z]+)/(?P<alias>[0-9]+)$', ['controller' => 'Test']);

Router::add('^test/(?P<alias>[0-9]+)$', ['controller' => 'Test', 'action' => 'do']);
Router::add('^test/do$', ['controller' => 'Test', 'action' => 'do']);
Router::add('^test/edit/(?P<alias>[0-9]+)$', ['controller' => 'Test', 'action' => 'edit']);
Router::add('^test/edit$', ['controller' => 'Test', 'action' => 'edit']);
Router::add('^test/results/(?P<cache>[a-zA-Z0-9]{32})$', ['controller' => 'test', 'action' => 'Results']);


Router::add('^user/(?P<action>[a-z]+)$', ['controller' => 'User']);

Router::add('^adminsc\/product\/edit\/(?P<id>[0-9]+)$', ['controller' => 'Adminsc', 'action' => 'ProductEdit']);

Router::add('^adminsc\/crm\/(?P<action>[0-9a-z]+)$', ['controller' => 'Adm_crm']);
Router::add('^adminsc\/crm$', ['controller' => 'Adm_crm']);

Router::add('^adminsc\/catalog\/category\/new$', ['controller' => 'Adm_catalog', 'action' => 'CategoryNew']);
Router::add('^adminsc\/catalog\/(?P<action>[0-9a-z]+)$', ['controller' => 'Adm_catalog']);
Router::add('^adminsc\/catalog$', ['controller' => 'Adm_catalog']);

Router::add('^adminsc\/settings\/(?P<action>[0-9a-z]+)$', ['controller' => 'Adm_settings']);
Router::add('^adminsc\/settings\/instructions\/module\/(?P<id>[0-9]+)$', ['controller' => 'Adm_settings', 'action' => 'module']);
Router::add('^adminsc\/settings$', ['controller' => 'Adm_settings']);
Router::add('^adminsc$', ['controller' => 'Adminsc', 'action' => 'index']);

//Router::add('^catalog\/(?P<cat1>[a-z0-9-]+)\/?(?P<cat2>[0-9a-z-]+)?\/?(?P<cat3>[0-9a-z-]+)?\/?(?P<cat4>[0-9a-z-]+)?$', ['controller' => 'Product', 'action' => 'category']);

Router::add('^about\/(?P<action>[a-z0-9_]+)$', ['controller' => 'main']);
Router::add('^about$', ['controller' => 'main', 'action' => 'about']);

Router::add('^service\/(?P<action>[a-z0-9-]+)$', ['controller' => 'main']);

Router::add('^freetest\/?(?P<alias>[0-9]+)$', ['controller' => 'Freetest ', 'action' => 'do']);
Router::add('^freetest/edit/(?P<alias>[0-9]+)$', ['controller' => 'Freetest ', 'action' => 'edit']);
Router::add('^freetest/edit$', ['controller' => 'Freetest ', 'action' => 'edit']);
Router::add('^freetest$', ['controller' => 'Freetest']);
Router::add('^freetest/do$', ['controller' => 'Freetest', 'action' => 'do']);
Router::add('^freetest/results/(?P<cache>[a-zA-Z0-9]{32})$', ['controller' => 'Freetest', 'action' => 'Results']);

//Router::add("^(?<cat1>[a-z]+)\/?((?<cat2>[a-z]+)\/?)((?<cat3>[a-z]+)\/?)((?<cat4>[a-z]+)\/?)?$");// fw/sapogi/letnie -> category/categpry

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$'); // fw/test/do -> controller/action

Router::add('^$', ['controller' => 'main', 'action' => 'index']); // fw/ -> main/index

Router::dispatch($url);
