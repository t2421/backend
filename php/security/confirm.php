<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/Session.php';

Session::init();
if(!Session::csrf_check("token")){
    echo $twig->render('error.html');
    exit();
}
echo $twig->render('confirm.html',array(
    "csrftoken" => Session::token(),
    "post" => $_POST
));