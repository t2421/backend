<?php
namespace model;

final class UserModel{

    private $_userId = null;
    private $_password = null;
    private $_displayName = null;
    private $_email = null;
    private $_token = null;
    private $_loginFailureCount = null;
    private $_loginFailureDatetime = null;
    private $_deleteFlag = null;

    public function setUserId($userId)
    {
        $this->$_userId = $userId;
        return $this;
    }

    public function setPassword($password)
    {
        $this->$_password = $password;
        return $this;
    }

    public function setDisplayName($displayName)
    {
        $this->$_displayName = $displayName;
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

    public function setDeleteFlag($deleteFlag)
    {
        $this->$_deleteFlag = $deleteFlag;
        return $this;
    }

    public function getUserId()
    {
        return $_userId;
    }

    public function getPassword()
    {
        return $_password;
    }

    public function getDisplayName()
    {
        return $_displayName;
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
        return $_deleteFlag;
    }
}