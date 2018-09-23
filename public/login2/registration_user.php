<?php
session_start();
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
echo($token);
require_once("PreMemberDataFactory.php");
$premember_access = new PreMemberDataFactory();
$premember_data = $premember_access->dataConnect();

require_once("UserDataFactory.php");
$user_access = new UserDataFactory();
$user_data = $user_access->dataConnect();

if(empty($_GET["token"])){
    echo("やりなおし");
}else{
    $premember = $premember_data->select(["token"=>$_GET["token"]]);
    if(empty($premember)){
        echo("怪しいアクセス");
    }else{
       
    }
}
?>

<html>
<head><title>ユーザー登録</title></head>
<body>
    <h1>ユーザー登録</h1>
    <form action="registration_check.php" method="post">
    <p>メールアドレス: <?=$premember->email?></p>
    <input type="hidden" name="email" value="<?=$premember->email?>">
    <p>アカウント名：<input type="text" name="account"></p>
    <p>パスワード：<input type="password" name="password"></p>
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="submit" name="register" value="確認">
    </form>
</body>
</html>


