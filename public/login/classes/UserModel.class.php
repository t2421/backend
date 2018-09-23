<?php
namespace model;

final class UserModel{

    private $_id = null;
    private $_password = null;
    private $_account = null;
    private $_email = null;
    private $_token = null;
    private $_loginFailureCount = null;
    private $_loginFailureDatetime = null;
    private $_delete_flag = null;

    public function setUserId($id)
    {
        $this->$_id = $id;
        return $this;
    }

    public function setPassword($password)
    {
        $this->$_password = $password;
        return $this;
    }

    public function setDisplayName($account)
    {
        $this->$_account = $account;
        return $this;
    }

    public function setEmail($email)
    {
        $this->$_email = $email;
        return $this;
    }

    public function setToken($token)
    {
        $this->$_token = $token;
        return $this;
    }

    public function setLoginFailureCount($loginFailureCount)
    {
        $this->$_loginFailureCount = $loginFailureCount;
        return $this;
    }

    
    public function setLoginFailureDatetime($loginFailureDatetime)
    {
        $this->$_loginFailureDatetime = $loginFailureDatetime;
        return $this;
    }

    public function setDeleteFlag($delete_flag)
    {
        $this->$_delete_flag = $delete_flag;
        return $this;
    }

    public function getUserId()
    {
        return $_id;
    }

    public function getPassword()
    {
        return $_password;
    }

    public function getDisplayName()
    {
        return $_account;
    }

    public function getEmail()
    {
        return $_email;
    }

    public function getToken()
    {
        return $_token;
    }

    public function getLoginFailureCount()
    {
        return $_loginFailureCount;
    }

    
    public function getLoginFailureDatetime()
    {
        return $_loginFailureDatetime;
    }

    public function getDeleteFlag()
    {
        return $_delete_flag;
    }
}