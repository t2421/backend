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

if(isset($_POST["completeDelete"])){
    $blog_data_access->delete(["id"=>$_POST["id"]]);
}
if(isset($_POST["redoDelete"])){
	$blog = $blog_data_access->select(["id"=>$_POST["id"]]);
	$blog->deleteFlag = 0;
	$blog_data_access->update(["id"=>$_POST["id"]],$blog);
}

$blog = $blog_data_access->selectAll();

?>
<html>
	<head></head>
	<body>
		<h1>My Blog in TrashBox</h1>
		<ul>        
        <?php foreach ($blog as $item):
            if(!$item->deleteFlag) continue;    
        ?>
			<li>
			<a href="blogDetail.php?id=<?php echo $item->id ?>"><?php echo $item->title ?></a>
			<form action="blog-trash.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $item->id ?>">
				<input type="submit" name="redoDelete" value="redoDelete">
				<input type="submit" name="completeDelete" value="completeDelete">
			</form>
			</li>
		<?php endforeach; ?>
        </ul>
		<p><a href="blog.php">blog index</a></p>
		<p><a href="logout.php">logout</a></p>
        
	</body>
</html>