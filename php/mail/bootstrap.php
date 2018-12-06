<?php
require_once __DIR__.'/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader);

function render($template,$data){
    $twig->render($template, $data );
}