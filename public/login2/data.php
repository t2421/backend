<?php
require_once("./DataAccess.php") ;

function dataConnect(){
    $userdata = json_decode(file_get_contents("./data/database.json"));
    
	return new DataAccess($userdata);
}
 ?>