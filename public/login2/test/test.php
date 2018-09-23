<?php
require_once(dirname(dirname(__FILE__))."/UserDataFactory.php");
require_once(dirname(dirname(__FILE__))."/BlogDataFactory.php");
$datafacotry = new UserDataFactory();
$data_access = $datafacotry->dataConnect();
$select_data = $data_access->select(array(
    "email"=>"t2421gm@gmail.com"
));

$blogDataFactory = new BlogDataFactory();
$blog_data_access = $blogDataFactory->dataConnect();
$blog_data = $blog_data_access->select([
    "id" => 1
]);

echo("<h2>select</h2>");
var_dump($select_data);
echo("<h2>blog select</h2>");
var_dump($blog_data);

echo("<h2>blog update</h2>");
$blog_data->description = "HOGEHOGEJUJUJU";
$blog_data_access->update(["id"=>$blog_data->id],$blog_data);

echo("<h2>blog insert</h2>");
$new_blog = array(
    "title" => "article4",
    "createUser" => 2,
    "description" => "HOGE!",
    "createdAt" => 10,
    "deleteFlag" => 0
);
$cast_blog = json_decode(json_encode($new_blog));
$blog_data_access->insert($cast_blog);

?>