<?php
require_once __DIR__.'/Mail.php';

$data = array(
    "name" => "tttt",
    "email" => "hogehoge@hoge.com"
);
$mail = new Mail("hogehoge@email.com","user.tpl.php",$data);
$mail->send();
