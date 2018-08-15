<?php
session_start();
header("Content-type: text/html; charset=utf-8");

if($_POST['token'] != $_SESSION['token']){
    echo "不正なアクセス";
    exit();
}

header('X-FRAME-OPTIONS: SAMEORIGIN');

require_once("db.php");
$dbh = db_connect();

$errors = array();
if(empty($_POST)){
    header('Location: registration_mail_form.php');
    exit();
}else{
    $mail = isset($_POST["mail"]) ? $_POST["mail"] : NULL;

    if($mail == ''){
        $errors['mail'] = "require mail address";
    }else{
        // if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){
		// 	$errors['mail_check'] = "メールアドレスの形式が正しくありません。";
		// }
    }
}

if(count($errors) === 0){
    $urltoken = hash('sha256',uniqid(rand(),1));
    $url = "http://192.168.33.10/register/registration_form.php"."?urltoken=".$urltoken;

    try{
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $statement = $dbh->prepare("INSERT IGNORE INTO pre_member (urltoken,mail,date) VALUES (:urltoken,:mail,now() )");
        $statement->bindValue(':urltoken',$urltoken,PDO::PARAM_STR);
        $statement->bindValue(':mail',$mail,PDO::PARAM_STR);
        $statement->execute();
        $dbh = null;
    }catch(PDOException $e){
        print('ERROR:'.$e->getMessage());
        die();
    }
    $mailTo = $mail;
    $returnMail = 't2421gm+owner@gmail.com';
    $name = '神だ';
    $subject = '神からだ';
    $mail = 't2421gm+owner@gmail.com';

$body = <<< EOM
24時間以内に下記のURLからご登録下さい。
{$url}
EOM;

mb_language("ja");
mb_internal_encoding("UTF-8");
    $header = 'From: ' . mb_encode_mimeheader($name,'ISO-2022-JP'). ' <' . $mail. '>';
    if (mb_send_mail($mailTo, $subject, $body, $header, '-f'. $returnMail)) {
        $_SESSION = array();
        if(isset($_COOKIE["PHPSESSID"])){
            setcookie("PHPSESSID",'',time()-1800,'/');
        }
        session_destroy();
        $message = '送った';
    }else{
        $errors["mail_error"] = "送れない";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>メール確認画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>メール確認画面</h1>
 
<?php if (count($errors) === 0): ?>
 
<p><?=$message?></p>
 
<p>↓このURLが記載されたメールが届きます。</p>
<a href="<?=$url?>"><?=$url?></a>
 
<?php elseif(count($errors) > 0): ?>
 
<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>
 
<input type="button" value="戻る" onClick="history.back()">
 
<?php endif; ?>
 
</body>
</html>