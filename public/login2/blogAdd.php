<?php 
require_once("./UserDataFactory.php");
require_once("./BlogDataFactory.php");
session_start();
if(empty($_SESSION["id"])){
	header("Location: login.php");
}
$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();

$blogDataFactory = new BlogDataFactory();
$blog_data_access = $blogDataFactory->dataConnect();


$user = $data_access->select([
	"id" => $_SESSION["id"]
]);


if(isset($_POST["saveBlog"])){
	$blog = array();
    $blog["title"] = $_POST["title"];
    $blog["description"] = $_POST["description"];
    $blog["createdAt"] = $_POST["createdAt"];
    $blog["createUser"] = $_POST["createUser"];
    $blog["delete_flag"] = 0;
    $cast_data = json_decode(json_encode($blog));
    $created_blog = $blog_data_access->insert($cast_data);
    header("Location:blogDetail.php?id=".$created_blog->id);
}


?>
<html>
	<head></head>
	<body>
        <form action="blogAdd.php" method="POST">
		<h1><input type="text" name="title"></h1>
		<p class="author">author:<?php echo $user->displayName ?></p>
        <p>createdAt: <input type="text" name="createdAt" value="<?php echo rand() ?>"></p>
		<textarea name="description" cols="30" rows="10"></textarea>
        <input type="hidden" name="createUser" value="<?php echo $user->id ?>">
        <p><input type="submit" name="saveBlog" value="saveBlog"></p>
        </form>
        <p><a href="blog.php">blog index</a></p>
        <p><a href="logout.php">logout</a></p>
	</body>
</html>