<?php
class UserDao{
    private $_pdo;
    public function __construct(){
    }
    private function _connect(){
        try {
            $pdo = $this->_pdo;
            $pdo = new PDO('sqlite:my_sqlite_db.db');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (Exception $e) {
        
            echo $e->getMessage() . PHP_EOL;
        
        }
    }

    private function _disconnect(){
        $this->_pdo = null;
    }

    public function setUser($user_name){
        $pdo = $this->_connect();
        $stmt = $pdo->prepare("INSERT INTO user_list(name) VALUES (:name)");
        $stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $id = $pdo->lastInsertId('id');
        $this->_disconnect();
        return $id;

    }

    public function getUser($user_id){
        $pdo = $this->_connect();
        $stmt = $pdo->prepare("SELECT * FROM user_list WHERE id = :id");
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $r1 = $stmt->fetchAll();
        $this->_disconnect();
        return $r1[0];
    }
}