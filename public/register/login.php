<?php
session_start();
header("Content-type: text/html; charset=utf-8");

$_SESSION['login_token'] = base64_encode(openssl_random_pseudo_bytes(32));
$login_token = $_SESSION['login_token'];
$error_message = "";
header("X-FRAME-OPTIONS: SAMEORIGIN");

require_once("db.php");
$dbh = db_connect();


if(isset($_POST["login"])){
    if(empty($_POST["id"])){
        $error_message = "idいるよ";
    }else if(empty($_POST["password"])){
        $error_message = "パスいるよ";
    }

    if (!empty($_POST["id"]) && !empty($_POST["password"])) {
        $id = $_POST["id"];
        try{
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare("select * from member where account=:account");
            $stmt->bindValue(':account',$id,PDO::PARAM_STR);
            $stmt->execute();
            $val = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($val)){
                if(password_verify($_POST["password"],$val["password"])){
                    session_regenerate_id(true);
                    $id = $val["account"];
                    echo($id."ようこそ");
                }else{
                    echo("だめやないか");
                }
            }else{
                $error_message = "なんかちがうんじゃない？";
            }
        }catch(PDOException $e){
            $dbh->rollBack();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>ログイン</title>
<meta charset="utf-8">
</head>
<body>
<h1>ログイン画面</h1>
<form id="loginForm" name="loginForm" action="login.php" method="POST">
    <fieldset>
        <legend>ログインフォーム</legend>
        <div><font color="#ff0000"><?php echo htmlspecialchars($error_message, ENT_QUOTES); ?></font></div>
        <label for="id">ユーザーID</label><input type="text" id="id" name="id" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["id"])) {echo htmlspecialchars($_POST["id"], ENT_QUOTES);} ?>">
        <br>
        <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
        <br>
        <input type="submit" id="login" name="login" value="ログイン">
    </fieldset>
</form>
 
</body>
</html>

