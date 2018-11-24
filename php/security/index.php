<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/Session.php';

Session::start();

echo $twig->render('index.html',array(
    "csrftoken" => Session::token()
));