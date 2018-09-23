<?php
session_start();

if($_SESSION["token"] != $_POST["token"]){
    header("Location:registration.php");
}
require_once("PreMemberDataFactory.php");
$data_access = new PreMemberDataFactory();
$user_data = $data_access->dataConnect();

if(isset($_POST["register"])){
    $user = $user_data->select(["mail"=>$_POST["email"]]);
    //一度も登録されていなかったら
    if(empty($user)){
        $premember = [
            "email"=>$_POST["email"],
            "is_registration"=>false
        ];
        $user_data->insert($premember);
        header("Location:registration_complete.php");
    }
}

?>

<html>
<head><title>メール登録</title></head>
<body>
    <h1>メール登録</h1>
    <form action="registration_check.php" method="post">
    <p>メールアドレス: <input type="text" name="email"></p>
    <input type="hidden" token="<?=$token?>">
    <input type="submit" name="register" value="確認">
    </form>
</body>
</html>