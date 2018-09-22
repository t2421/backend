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

if(isset($_POST["saveBlog"])){
    $blog->title = $_POST["title"];
    $blog->description = $_POST["description"];
    $blog->createdAt = $_POST["createdAt"];
    $blog_data_access->update(["id"=>$blog->id],$blog);
}

?>
<html>
	<head></head>
	<body>
        <form action="blogDetail.php?id=<?php echo $blog->id ?>" method="POST">
		<h1><input type="text" name="title" value="<?php echo $blog->title ?>"></h1>
		<p class="author">author:<?php echo $create_user->displayName ?></p>
        <p>createdAt: <input type="text" name="createdAt" value="<?php echo $blog->createdAt ?>"></p>
		<textarea name="description" cols="30" rows="10"><?php echo $blog->description ?></textarea>
        <p><input type="submit" name="saveBlog" value="saveBlog"></p>
        </form>
        <p><a href="logout.php">logout</a></p>
	</body>
</html>