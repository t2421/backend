<?php 
require_once("UserDataFactory.php");
session_start();
if(empty($_SESSION["userid"])){
	header("Location: login.php");
}
$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();
$user = $data_access->select([
	"userId" => $_SESSION["userid"]
]);
?>
<html>
	<head></head>
	<body>
		<h1>Hello Dashboard</h1>
		<p><?php echo $user->displayName ?></p>
        <ul>
        <li><a href="blog.php">Blog</a></li>
        </ul>
        <a href="logout.php">logout</a>
	</body>
</html>