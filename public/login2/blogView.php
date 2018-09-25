<?php 
require_once("./UserDataFactory.php");
require_once("./BlogDataFactory.php");

$blogDataFactory = new BlogDataFactory();
$blog_data_access = $blogDataFactory->dataConnect();

$blog = $blog_data_access->select(["id"=>$_GET["id"]]);

?>
<html>
	<head>
        <title><?= $blog->title ?></title>
    </head>
	<body>
		<h1><?= $blog->title ?></h1>
		<p><?= $blog->description ?></p>
		<p><a href="blogArchive.php">ブログ一覧</a></p>
	</body>
</html>