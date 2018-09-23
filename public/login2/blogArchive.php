<?php 
require_once("./BlogDataFactory.php");

$blogDataFactory = new BlogDataFactory();
$blog_data_access = $blogDataFactory->dataConnect();

$blog_list = $blog_data_access->selectAll();

?>
<html>
	<head>
        <title>ブログ一覧</title>
    </head>
	<body>
		<h1>ブログ一覧</h1>
		<ul>
            <?php foreach($blog_list as $blog): ?>
            <li><a href="blogView.php?id=<?= $blog->id ?>"><?= $blog->title ?></a></li>
            <?php endforeach; ?>
        </ul>
	</body>
</html>