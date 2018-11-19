<?php
require_once("Session.php");

class User{
    function __construct(){

    }

    public function is_login(){
        if(null !== Session::getValue("id")){
            return true;
        }
        return false;
    }

    public function create_token(){
        return base64_encode(openssl_random_pseudo_bytes(32));
    }

    
}
