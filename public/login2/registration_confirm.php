<?php
session_start();

if($_POST['token'] != $_SESSION['token']){
    // header("Location:registration.php");
    echo("uuuuuupm,,,,");
    die();
}
require_once("PreMemberDataFactory.php");
$data_access = new PreMemberDataFactory();
$user_data = $data_access->dataConnect();
$message = "";

if(isset($_POST["register"])){
    $user = $user_data->select(["email"=>$_POST["email"]]);
    //一度も登録されていなかったら
    if(empty($user)){
        $premember = [
            "email"=>$_POST["email"],
            "token"=>hash('sha256',uniqid(rand(),1))
        ];
        $premember = json_decode(json_encode($premember));
        $user_data->insert($premember);
        $url = "registration_user.php?token=".$premember->token;
        $_SESSION = [];
        session_destroy();
    }else{
        $message = "exist your email!";
        $url = "registration.php";
    }
}
?>

<html>
<head><title>メール登録</title></head>
<body>
    <h1>メール登録</h1>
    <?= $message ?>
    <a href="<?= $url ?>"><?= $url ?></a>
</body>
</html>