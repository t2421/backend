<?php 
require_once("UserDataFactory.php");

session_start();
$_SESSION['login_token'] = base64_encode(openssl_random_pseudo_bytes(32));
$error_message = "";

$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();

if(isset($_POST["login"])){
    
	if(empty($_POST["email"])){
		$error_message = "email require";
	}else if(empty($_POST["password"])){
		$error_message = "password require";
	}

	if(!empty($_POST["email"]) && !empty($_POST["password"])){
		$user = $data_access->select(array(
			"email" => $_POST["email"]
        ));
        if($user->password == $_POST["password"]){
            session_regenerate_id(true);
            $_SESSION["userid"] = $user->userId;
            header("Location: main.php");
        }else{
            echo("失敗");
        }
	}else{
		$error_message = "uuuum....";
	}
}
 ?>


 <html>
 	<head>
 		
 	</head>
 	<body>
 		<form action="login.php" method="post">
 			<p>mail:<input type="text" name="email"></p>
 			<p>password:<input type="password" name="password"></p>
             <input type="hidden" value="<?php echo $login_token ?>">
 			<input type="submit" name="login" value="login" />
 		</form>
 	</body>
 </html>