<?php 
require_once("User.php");
require_once("UserDataFactory.php");
require_once("Session.php");

$user_model = new User();

Session::start();
Session::setValue('login_token',$user_model->create_token());

$error_message = "";

$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();

var_dump($user_model->is_login());
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
			Session::setValue("id",$user->id);
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