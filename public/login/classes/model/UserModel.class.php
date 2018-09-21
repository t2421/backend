<?php

namespace MyApp\model;

/**
 * UserModel
 */
final class UserModel
{

    /**
     * アカウントをロックするログイン失敗回数
     */
    const LOCK_COUNT = 3;

    /**
     * アカウントをロックする時間（分）
     */
    const LOCK_MINUTE = 30;

    /**
     * ユーザーID
     */
    private $_userId = null;

    /**
     * パスワード（ハッシュ）
     */
    private $_password = null;

    /**
     * 表示名
     */
    private $_displayName = null;

    /**
     * メールアドレス
     */
    private $_email = null;

    /**
     * トークン
     */
    private $_token = null;

    /**
     * ログイン失敗回数
     */
    private $_loginFailureCount = null;

    /**
     * ログイン失敗日時
     */
    private $_loginFailureDatetime = null;

    /**
     * 削除フラグ
     */
    private $_deleteFlag = null;

    /**
     * メールアドレスからユーザーを検索する
     * @param string $email
     * @return \MyApp\model\UserModel
     */
    public function getModelByEmail($email)
    {
        return $this;
    }

    /**
     * パスワードが一致しているかどうかを判定する
     * @param type $password
     * @return bool
     */
    public function checkPassword($password)
    {
        return true;
    }

    /**
     * ログイン失敗をリセットする
     * １以上のときに０にする
     * @return bool
     */
    public function loginFailureReset()
    {
        return true;
    }

    /**
     * ログイン失敗をインクリメントする
     * 指定回数（self::LOCK_COUNT）に満たないときのみ＋１
     * @return bool
     */
    public function loginFailureIncrement()
    {
        return true;
    }

    /**
     * アカウントがロックされているかどうかを判定する
     * @return bool ロックされていたら true
     */
    public function isAccountLock()
    {
        return false;
    }

    /**
     * ユーザーIDを設定する
     * @param int $userId
     * @return \MyApp\model\UserModel
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId;
        return $this;
    }

    /**
     * パスワード（ハッシュ）を設定する
     * @param string $password
     * @return \MyApp\model\UserModel
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }

    /**
     * 表示名を設定する
     * @param string $displayName
     * @return \MyApp\model\UserModel
     */
    public function setDisplayName($displayName)
    {
        $this->_displayName = $displayName;
        return $this;
    }

    /**
     * メールアドレスを設定する
     * @param string $email
     * @return \MyApp\model\UserModel
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
     * トークンを設定する
     * @param string $token
     * @return \MyApp\model\UserModel
     */
    public function setToken($token)
    {
        $this->_token = $token;
        return $this;
    }

    /**
     * ログイン失敗回数を設定する
     * @param int $loginFailureCount
     * @return \MyApp\model\UserModel
     */
    public function setLoginFailureCount($loginFailureCount)
    {
        $this->_loginFailureCount = $loginFailureCount;
        return $this;
    }

    /**
     * ログイン失敗日時を設定する
     * @param string $loginFailureDatetime
     * @return \MyApp\model\UserModel
     */
    public function setLoginFailureDatetime($loginFailureDatetime)
    {
        $this->_loginFailureDatetime = $loginFailureDatetime;
        return $this;
    }

    /**
     * 削除フラグを設定する
     * @param bool $deleteFlag
     * @return \MyApp\model\UserModel
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->_deleteFlag = $deleteFlag;
        return $this;
    }

    /**
     * ユーザーIDを取得する
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * パスワード（ハッシュ）を取得する
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * 表示名を取得する
     * @return string
     */
    public function getDisplayName()
    {
        return $this->_displayName;
    }

    /**
     * メールアドレスを取得する
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * トークンを取得する
     * @return string
     */
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * ログイン失敗回数を取得する
     * @return int
     */
    public function getLoginFailureCount()
    {
        return $this->_loginFailureCount;
    }

    /**
     * ログイン失敗日時を取得する
     * @return string
     */
    public function getLoginFailureDatetime()
    {
        return $this->_loginFailureDatetime;
    }

    /**
     * 削除フラグを取得する
     * @return bool
     */
    public function getDeleteFlag()
    {
        return $this->_deleteFlag;
    }

}