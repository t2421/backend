<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/Session.php';

Session::start();
if(!Session::csrf_check("token")){
    echo $twig->render('error.html');
    exit();
}

echo $twig->render('complete.html');