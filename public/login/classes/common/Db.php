<?php 
namespace MyApp\common;

class Db{
	const DSN = "mysql:dbname=%s;host=localhost;charaset=utf8;";
	const DBNAME = "sample";
	const USER_NAME = "root";
	const PASSWORD = "password";
	static private $instance = null;

	private function __construct(){}

	

	public static function select($sql, array $arr = array()){

	}

	public static function insert($sql, array $arr){

	}

	public static function update($sql, array $arr){

	}

	public static function delete($sql, array $arr){

	}
}
