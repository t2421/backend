<?php

function db_connect(){
    $dsn = 'mysql:host=localhost;dbname=registration;charset=utf8';
    $user = 'root';
    $password = 'root';

    try{
        $dbh = new PDO($dsn,$user,$password);
        return $dbh;
    }catch(PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
}