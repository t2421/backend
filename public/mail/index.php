<?php
$mail_contents = array(
    "subject" => "TEST MAIL",
    "to" => "t2421gm@gmail.com",
    "header" => "From: t2421gm+owner@gmail.com"
);

ob_start();
require_once 'mailbody.tpl';
$mailbody = ob_get_contents();
ob_end_clean();

foreach ($mail_contents as $key => $value) {
    $mailbody = str_replace("##".$key."##", $value, $mailbody);
}

mail($mail_contents["to"], $mail_contents["subject"], $mailbody, $mail_contents["header"]);
?>