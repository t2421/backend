<?php
session_start();
echo($_POST["token"].'<br>');
echo($_SESSION["token"]);
if($_POST['token'] != $_SESSION['token']){
    // header("Location:registration.php");
    echo("uuuuuupm,,,,");
    die();
}

require_once("PreMemberDataFactory.php");
$premember_access = new PreMemberDataFactory();
$premember_data = $premember_access->dataConnect();

require_once("UserDataFactory.php");
$user_access = new UserDataFactory();
$user_data = $user_access->dataConnect();

$data = [
    "password"=>$_POST["password"],
    "account"=>$_POST["account"],
    "email"=>$_POST["email"],
    "delete_flag"=>0
];
$data = json_decode(json_encode($data));
$user_data->insert($data);

?>

<html>
<head><title>ユーザー登録</title></head>
<body>
    <h1>ユーザー登録</h1>
    <table>
    <tr>
    <td>アカウント</td><td><?=$data->account?></td>
    </tr>
    <tr>
    <td>email</td><td><?=$data->email?></td>
    </tr>
    </table>
    <p><a href="login.php">Login</a></p>
</body>
</html>


