<?php 
require_once("UserDataFactory.php");
session_start();
if(empty($_SESSION["id"])){
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