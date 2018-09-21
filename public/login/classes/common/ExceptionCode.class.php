<?php 
namespace MyApp\common;

class ExceptionCode{
	const INVAILD_ERR = 1000;

	static private $_arrMessage = array(
		INVAILD_ERR => "エラーが発生しました"
	);

	static public function getMessage($intCode){
		if(array_key_exists($intCode, self::$_arrMessage)){
			return self::$_arrMessage[$intCode];
		}
	}
}

