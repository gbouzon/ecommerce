<?php
namespace app\core;

class Model{

	protected static $_connection;
	//connect to the database
	function __construct(){
		self::$_connection = DBConnection::getInstance();
	}

	function isValid(){//return true if the object has valid data
		$reflection = new \ReflectionClass($this);

		//get the properties
		$properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
		foreach ($properties as $property) {
			//get all attributes, these are tests
			$validators = $property->getAttributes();
			$theData = $property->getValue($this);//get the value
			foreach ($validators as $validator) {
				//run the test
				$test = $validator->newInstance();
				if(!$test->isValid($theData))
					return false;
			}
		}
		return true;
	}

}