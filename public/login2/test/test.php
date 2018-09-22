<?php
require_once(dirname(dirname(__FILE__))."/data.php");
require_once(dirname(dirname(__FILE__))."/DataAccess.php");

$data_access = dataConnect();
$select_data = $data_access->select(array(
    "email"=>"t2421gm@gmail.com"
));
echo("<h2>select</h2>");
var_dump($select_data);

?>