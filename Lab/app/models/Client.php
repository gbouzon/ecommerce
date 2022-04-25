<?php
namespace app\models;

class Client extends \app\core\Model{

	#[\app\validation\Name]
	var $first_name;
	#[\app\validation\Name]
	var $last_name;
	#[\app\validation\Email]
	var $email;
	
	var $city;
	var $province;
	var $country;
	var $postal;



	function __construct(){
		parent::__construct();
	}

	function get($client_id){
		$SQL = 'SELECT * FROM client WHERE client_id = :client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$client_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Client");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM client';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Client");
		return $STMT->fetchAll();
	}

	function getAnimals(){
		$SQL = 'SELECT * FROM animal WHERE client_id=:client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$this->client_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
		return $STMT->fetchAll();
	}

	//we want our clients to have non-blank first and last names
	function insert(){
		if($this->isValid()){
			$SQL = 'INSERT INTO client(first_name,last_name,notes,email,city,province,country,postal) VALUES(:first_name,:last_name,:notes,:email,:city,:province,:country,:postal)';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'notes'=>$this->notes,'email'=>$this->email,'city'=>$this->city,'province'=>$this->province,'country'=>$this->country,'postal'=>$this->postal]);
		}
	}

	function update(){
		if($this->isValid()){
			$SQL = 'UPDATE client SET first_name = :first_name, last_name = :last_name, notes = :notes, email = :email, city = :city, province = :province, country = :country, postal = :postal WHERE client_id = :client_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'notes'=>$this->notes,'email'=>$this->email,'city'=>$this->city,'province'=>$this->province,'country'=>$this->country,'postal'=>$this->postal,'client_id'=>$this->client_id]);
		}
	}

	function delete($client_id){
		$SQL = 'DELETE FROM client WHERE client_id = :client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$client_id]);
	}

	function deleteAnimals($client_id){
		$SQL = 'DELETE FROM animal WHERE client_id=:client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$client_id]);
	}

}