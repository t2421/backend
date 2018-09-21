<?php 
namespace MyApp\controller;

use MyApp\model\UserModel;

class LoginController{
	static public function login(){
		try{
			if(filter_input_array(INPUT_POST)){
				$email = filter_input(INPUT_POST,'email');
				$password = filter_input(INPUT_POST,'password');
				$objUserModle = new UserModel();
				$objUserModle->getModelByEmail($email);

				if($objUserModle->isAccountLock()){
					throw new \Exception('アカウントはロックされています');
				}

				if(!$objUserModel->checkPassword($password)){
					$objUserModel->loginFailureIncrement();
					throw new \Exception('ログインに失敗しました。')
				}

				$objUserModel->loginFailureReset();
				//コミット
				header("location:top.php");
			}
		}catch(\Exception $e){
			//ロールバック
		}
	}

	static public function checkLogin(){

	}

	static public function logout(){
		
	}
}

