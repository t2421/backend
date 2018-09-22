<?php 
require_once("./UserDataFactory.php");
require_once("./BlogDataFactory.php");
session_start();
if(empty($_SESSION["userid"])){
	header("Location: login.php");
}
$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();

$blogDataFactory = new BlogDataFactory();
$blog_data_access = $blogDataFactory->dataConnect();

$user = $data_access->select([
	"userId" => $_SESSION["userid"]
]);

$blog = $blog_data_access->select([
    "id" => $_GET["id"]
]);

$create_user = $data_access->select([
	"userId"=>$blog->createUser
]);
?>
<html>
	<head></head>
	<body>
		<h1><input type="text" value="<?php echo $blog->title ?>"></h1>
		<p class="author">author:<?php echo $create_user->displayName ?></p>
		<textarea name="description" cols="30" rows="10"><?php echo $blog->description ?></textarea>
        <p><a href="logout.php">logout</a></p>
	</body>
</html>