<?php
require_once(dirname(__FILE__)."/DataAccess.php") ;

function dataConnect(){
    $userdata = json_decode(file_get_contents(dirname(__FILE__)."/data/database.json"));
    
	return new DataAccess($userdata);
}
 ?>