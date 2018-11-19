<?php 
require_once("User.php");
require_once("UserDataFactory.php");
require_once("Session.php");


$user_model = new User();

Session::start();
Session::setValue('login_token',$user_model->create_token());

if(!$user_model->is_login()){
	header("Location: login.php");
}

$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();
$user = $data_access->select([
	"id" => $_SESSION["id"]
]);
?>
<html>
	<head></head>
	<body>
		<h1>Hello Dashboard</h1>
		<p><?php echo $user->account ?></p>
        <ul>
        <li><a href="blog.php">Blog</a></li>
        </ul>
        <a href="logout.php">logout</a>
	</body>
</html>