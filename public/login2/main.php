<?php 
require_once("./data.php");
session_start();
if(empty($_SESSION["userid"])){
	header("Location: login.php");
}
$data_access = dataConnect();
$user = $data_access->select([
	"userId" => $_SESSION["userid"]
]);
?>
<html>
	<head></head>
	<body>
		<h1>Hello Dashboard</h1>
		<p><?php echo $user->displayName ?></p>
        <a href="logout.php">logout</a>
	</body>
</html>