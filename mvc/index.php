<? 

// Set the application path global

defined('APPLICATION_PATH') 
|| define('APPLICATION_PATH', dirname(__FILE__));

// Determine environment

if ($_SERVER['HTTP_HOST'] == 'jedarchive.org' 
    || $_SERVER['HTTP_HOST'] == 'www.jedarchive.org') {
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

$uriParts = explode('?', $uri);
$uri = $uriParts[0];

$uriParts = explode('#', $uri);
$uri = $uriParts[0];

$uriParts = explode('/', $uri);
array_shift($uriParts);
$controller = array_shift($uriParts);
$action = array_shift($uriParts);
$action = $action ? $action : 'index';

$controllerFile = 'controllers/'.$controller.'.php';
$controllerClass = $controller.'Controller';
$actionMethod = $action.'Action';
$viewFile = 'views/'.$controller.'/'.$action.'.php';

if (file_exists($controllerFile)) {
    require_once 'controllers/base.php';
    require_once $controllerFile;
    $controller = new $controllerClass();
    $controller->{$actionMethod}();

    $renderedView = $controller->renderView($viewFile);

    $layout = new stdClass();
    $layout->contents = $renderedView;
    include('layout.php');

} else {
    header("HTTP/1.0 404 Not Found");
}