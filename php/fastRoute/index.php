<?php
require_once './vendor/autoload.php';

$dispatcher= FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $router->get('/', 'index');
    $router->get('/user/{name:\w+}', 'user');
    $router->get('/user/{name:\w+}/detail', 'user_detail');
    $router->get('/user/{name:\w+}/post/{post_id:\d+}', 'post');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = remove_urlparam($uri);
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header('HTTP/1.0 404 Not Found');
        echo not_found();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        header('HTTP/1.0 405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler($vars);
        break;
}

function index()
{
    return 'トップページです';
}

function user($vars)
{
    return $vars['name'] . 'のプロフィールページです';
}

function user_detail($vars)
{
    return $vars['name'] . 'の詳細プロフィールページです';
}

function post($vars)
{
    $name = $vars['name'];
    $post = $vars['post_id']."の投稿";

    return $name . 'のpost_id:'.$post.'ページです';
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