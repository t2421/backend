<?php
require_once __DIR__."/UserDao.php";

class User{
    private $_dao;
    private $_id;
    private $_name;

    public function __construct(){
        $this->_dao = new UserDao();
    }

    public function create($name){
        $this->_id = $this->_dao->setUser($name);
        $user_column = $this->_dao->getUser($this->_id);
        $this->_name = $user_column["name"];
    }


    
}