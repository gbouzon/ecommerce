<?php
namespace app\core;

class Controller{
	public function view($name, $data = []){
		if(file_exists('app/views/' . $name . '.php')){
			global $lang;//make the global variable $lang accessible in this scope
			include('app/views/' . $name . '.php');
		}else
			echo 'app/views/' . $name . '.php does not exist';
	}
}