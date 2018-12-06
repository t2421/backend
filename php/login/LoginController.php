<?php
require_once __DIR__."/Login.php";

class LoginController{
    private $_login;
    public function __construct(){
        
    }

    public function loginPost($post){
        $this->_login = new Login($post["username"],$post["password"]);
        if($this->_login->validate()){
            header("Location: /dashboard");
        }else{
            render('login.html',array(
                "csrftoken" => Session::token(),
                "error"=>$this->_login->getError()
            ));
        }
    }

    public function loginView(){
        render('login.html',array(
            "csrftoken" => Session::token()
        ));
    }
}