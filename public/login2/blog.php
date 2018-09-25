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

$blog = $blog_data_access->selectAll();


?>
<html>
	<head></head>
	<body>
		<h1>My Blog</h1>
		<ul>        
        <?php foreach ($blog as $item):
            if($item->delete_flag) continue;    
        ?>
			<li><a href="blogDetail.php?id=<?php echo $item->id ?>"><?php echo $item->title ?></a></li>
		<?php endforeach; ?>
        </ul>
        <p><a href="blogAdd.php">新規追加</a></p>
        <p><a href="blog-trash.php">ゴミ箱</a></p>
        <a href="logout.php">logout</a>
	</body>
</html>