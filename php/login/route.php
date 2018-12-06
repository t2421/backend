<?php
require_once __DIR__."/LoginController.php";

$dispatcher= FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $router->get('/', 'welcome');
    $router->get('/login', 'login');
    $router->post('/login', 'login_post');
    $router->get('/dashboard', 'dashboard');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = remove_urlparam($uri);
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo not_found();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler($vars);
        break;
}

function welcome(){
    render('welcome.html');
}

function login()
{
    $controller = new LoginController();
    $controller->loginView();   
}

function login_post()
{
    $controller = new LoginController();
    $controller->loginPost($_POST);
}

function dashboard()
{
    render('dashboard.html',array(
        "csrftoken" => Session::token()
    ));
}


function not_found()
{
    return 'Not Foundです';
}

function remove_urlparam($url){
    if (false !== $pos = strpos($url, '?')) {
        return substr($url, 0, $pos);
    }
    return $url;
}