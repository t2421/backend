<?php
session_start();
$db['host'] = "localhost";
$db['user'] = "loginManagement";
$db['pass'] = "loginManagement";
$db['dbname'] = "loginManagement";
$errorMessage = "";

if($_POST["login"]){
    if(empty($_POST["userid"])){
        $errorMessage = "require userid";
    }else if(empty($_POST["password"])){
        $errorMessage = "require password";
    }
    if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
        //login処理実行
        $userid = $_POST["userid"];
        //sprintfでフォーマットされた文字列を取得する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
    }
}
?>