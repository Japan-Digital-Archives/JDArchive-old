<? 

// Set the application path global

defined('APPLICATION_PATH') 
|| define('APPLICATION_PATH', dirname(__FILE__));

// Determine environment

if ($_SERVER['HTTP_HOST'] == 'jdarchive.org' 
    || $_SERVER['HTTP_HOST'] == 'www.jdarchive.org'
    || $_SERVER['HTTP_HOST'] == 'jedarchive.org'
    || $_SERVER['HTTP_HOST'] == 'www.jedarchive.org') 
{
    define('APPLICATION_ENV', 'production');
} else {
    define('APPLICATION_ENV', 'development');
}

// Install autoloader

function __autoload($clz) {
    if (strpos($clz, 'Jedarchive_') == 0) {
        require APPLICATION_PATH . '/model/' . strtolower(substr($clz, 11)) . '.php';
    }
}

Jedarchive_Db::instance();

// Route to controller/action

$uri = $_SERVER['REQUEST_URI'];

// cut off query string
$uriParts = explode('?', $uri);
$uri = $uriParts[0];

// cut off id
$uriParts = explode('#', $uri);
$uri = $uriParts[0];

// split in sections
$uriParts = explode('/', $uri);
array_shift($uriParts);

// determine controller/action name
$controller = array_shift($uriParts);
$action = array_shift($uriParts);
$action = $action ? $action : 'index';

// load file, instantiate controller class, launch action
$controllerFile = 'controllers/'.$controller.'.php';
$controllerClass = ucfirst($controller).'Controller';
//$actionMethod = $action.'Action';

if (file_exists($controllerFile)) {
    require_once 'controllers/base.php';
    require_once $controllerFile;
    $controller = new $controllerClass($controller);

    $controller->setUriParams($uriParts);
    $controller->setParams($_REQUEST);
    $controller->setPostParams($_POST);
    print $controller->renderAction($action);
} else {
    header("HTTP/1.0 404 Not Found");
}
