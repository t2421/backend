<?php

$dispatcher= FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $router->get('/login', 'login');
    $router->post('/login', 'login_post');
    $router->get('/dashboard', 'dashboard');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = remove_urlparam($uri);
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

var_dump($routeInfo);

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

function login()
{
    
    render('login.html',array(
        "csrftoken" => Session::token()
    ));
    
}

function login_post()
{
   
    $error = array();
    if(empty($_POST["username"])){
        $error["username"] = "ユーザー名を入力しろ";
    }
    if(empty($_POST["password"])){
        $error["password"] = "パスワードを入力しろ";
    }
    
    if(empty($_POST["username"]) || empty($_POST["password"])){
        render('login.html',array(
            "csrftoken" => Session::token(),
            "error"=>$error
        ));
    }else{
        header("Location: /dashboard");
    }
    
}

function dashboard()
{
    echo("login");
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