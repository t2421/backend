<?php
session_start();

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];

require_once("PreMemberDataFactory.php");
$data_access = new PreMemberDataFactory();
$user_data = $data_access->dataConnect();

?>

<html>
<head><title>メール登録</title></head>
<body>
    <h1>メール登録</h1>
    <form action="registration_confirm.php" method="post">
    <p>メールアドレス: <input type="text" name="email"></p>
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="submit" name="register" value="確認">
    </form>
</body>
</html>