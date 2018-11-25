<?php
require_once __DIR__.'/User.php';
$user = new User();
$user->create("hoge20");
var_dump($user);