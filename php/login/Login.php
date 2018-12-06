<?php
class Login{
    private $_name;
    private $_password;
    private $_error = array();
    public function __construct($name,$password){
        $this->_name = $name;
        $this->_password = $password;
    }

    public function validate(){
        if(empty($this->_name)){
            $this->_error["username"] = "ユーザー名を入力しろ";
        }
        if(empty($this->_password)){
            $this->_error["password"] = "パスワードを入力しろ";
        }

        if(empty($this->_name) || empty($this->_password)){
            return false;
        }else{
            return true;
        }
    }
    public function getError(){
        return $this->_error;
    }
}