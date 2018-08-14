<?php
session_start();
header("Content-type: text/html; charset=utf-8");

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];

header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once("db.php");
$dbh = db_connect();
 
//エラーメッセージの初期化
$errors = array();

//tokenなしで訪れたら、mail登録画面に移動
if(empty($_GET)) {
	header("Location: registration_mail_form.php");
	exit();
}else{
    $urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : NULL;

    if($urltoken == ""){
        $errors['urltoken'] = "もう一度登録をやりなおして下さい。";
    }else{
        try{
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //まだ未登録で24時間以内に訪れた人であるか？
            $statement = $dbh->prepare("SELECT mail FROM pre_member WHERE urltoken=(:urltoken) AND flag =0 AND date > now() - interval 24 hour");
            $statement->bindValue(':urltoken',$urltoken);
            $statement->execute();

            $row_count = $statement->rowCount();

            //mailが重複していたらエラー。24時間以内のものがない場合もエラー。
            if($row_count == 1){
                $mail_array = $statement->fetch();
                $mail = $mail_array["mail"];
                $_SESSION["mail"] = $mail;

            }else{
                $errors["urltoken_timeover"] = "期限切れなど";
            }
            $dbh = null;

        }catch(PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>会員登録画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>会員登録画面</h1>
 
<?php if (count($errors) === 0): ?>
 
<form action="registration_check.php" method="post">
 
<p>メールアドレス：<?=htmlspecialchars($mail, ENT_QUOTES, 'UTF-8')?></p>
<p>アカウント名：<input type="text" name="account"></p>
<p>パスワード：<input type="text" name="password"></p>
 
<input type="hidden" name="token" value="<?=$token?>">
<input type="submit" value="確認する">
 
</form>
 
<?php elseif(count($errors) > 0): ?>
 
<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>
 
<?php endif; ?>
 
</body>
</html>