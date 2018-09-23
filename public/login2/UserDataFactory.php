<?php
require_once(dirname(__FILE__)."/JsonDataAccess.php") ;

class UserDataFactory{

    public function dataConnect(){
        $data_source = dirname(__FILE__)."/data/database.json";
        $blog = json_decode(file_get_contents($data_source));
        return new JsonDataAccess($blog,$data_source);
    }
}


 ?>