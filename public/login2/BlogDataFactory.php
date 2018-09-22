<?php
require_once(dirname(__FILE__)."/JsonDataAccess.php") ;

class BlogDataFactory{

    public function dataConnect(){
        $blog = json_decode(file_get_contents(dirname(__FILE__)."/data/blog.json"));
        return new JsonDataAccess($blog);
    }
}


 ?>