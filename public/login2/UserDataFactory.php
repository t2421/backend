<?php
require_once(dirname(__FILE__)."/JsonDataAccess.php") ;

class UserDataFactory{

    public function dataConnect(){
        $userdata = json_decode(file_get_contents(dirname(__FILE__)."/data/database.json"));
        return new JsonDataAccess($userdata);
    }
}


 ?>