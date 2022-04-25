<?php 
namespace app\controllers;

class User extends \app\core\Controller{
	
	//TODO: Model with get, insert, exists
	//TODO: registration and login view

	function index(){//login here
		if(!isset($_POST['action'])){//there is no form being submitted
			$this->view('User/login');
		}else{//there is a form submitted
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			if($user != false){
				if(password_verify($_POST['password'],$user->password_hash)){
					//yay! login - store that state in a session
					$_SESSION['username'] = $user->username;
					$_SESSION['user_id'] = $user->user_id;

					if ($user->secret_key != null) 
						header('location:/User/validate2fa');
					
					else
						header('location:/User/setup2fa');
				}else{
					//not the correct password
					$this->view('User/login','Incorrect username/password combination.');
				}
			}else{
				$this->view('User/login','Incorrect username/password combination.');
			}
		}
	}

	function register(){//register here
		if(!isset($_POST['action'])){//there is no form being submitted
			$this->view('User/register');
		}else{//there is a form submitted
			$newUser = new \app\models\User();
			$newUser->username = $_POST['username'];

			 if(!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']){
			 	$newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

			 	$newUser->insert();
			 	header('location:/User/index');
			 }else{
				$this->view('User/register','The user account with that username already exists.');
			 }
		}
	}

	#[\app\filters\Login]
	function logout(){
		session_destroy();//deletes the session ID and all data
		header('location:/User/index');
	}

	public function makeQRCode() {
		$data = $_GET['data'];
		\QRcode::png($data);
	}

	public function setup2fa(){
		if (isset($_POST['action'])) {
			$currentcode = $_POST['currentCode'];
			if (\App\core\TokenAuth6238::verify($_SESSION['secretkey'], $currentcode)) {
				//the user has verified their proper 2-factor authentication setup
				$user = new \App\models\User();
				$user = $user->get($_SESSION['username']);
				$user->secret_key = $_SESSION['secretkey'];
				$user->update2fa();
				header('location:/User/secureplace');
			}
			else {
				header('location:/User/setup2fa?error=tokennot verified!');//reload
			}
		}
		else {
			$secretkey = \app\core\TokenAuth6238::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;
			$url = \App\core\TokenAuth6238::getLocalCodeUrl($_SESSION['username'], 'Awesome.com', $secretkey,'My Application');
			$this->view('User/twofasetup', $url);
		}
	}

	public function validate2FA() {
		if (isset($_POST['action'])) {
			$code = $_POST['code'];
			$user = new \App\models\User();
			$user = $user->get($_SESSION['username']);
			$secret = $user->secret_key;
			echo $secret;
			if (\App\core\TokenAuth6238::verify($secret, $code)) {
				$_SESSION['secretkey'] = $secret;
				header('location:/User/secureplace');
			}
			else
				$this->view('User/validate2fa','Invalid code. Please re-enter.');
		}
		else
			$this->view('User/validate2fa');	
	}

	//toy application
	//TODO: learn about access filtering
	
	#[\app\filters\Auth]
	function secureplace(){
		echo 'You are logged in!<a href="/User/logout">Logout</a>';
	}

}