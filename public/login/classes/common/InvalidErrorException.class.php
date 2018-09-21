<?php 
namespace MyApp\common;
class InvalidErrorException extends \Exception{
	public function __construct($code, \Exception $previous=null){
		parent::__construct($message,$code,$previous);
	}
}
