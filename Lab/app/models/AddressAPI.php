<?php
namespace app\models;

class AddressAPI extends \app\core\Model{

	#[\app\validation\NonBlankString]
	var $postal;
	#[\app\validation\NonBlankString]
	var $result;
	
	function __construct(){
		parent::__construct();
	}

	function get($postal){
		$SQL = 'SELECT * FROM addressapi WHERE postal = :postal';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['postal'=>$postal]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\AddressAPI");
		return $STMT->fetch();
	}

	//we want our clients to have non-blank first and last names
	function insert(){
		if($this->isValid()){
			$SQL = 'INSERT INTO `addressapi`(`postal`, `result`) VALUES (:postal, :result)';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['postal'=>$this->postal,'result'=>$this->result]);
		}
	}


}