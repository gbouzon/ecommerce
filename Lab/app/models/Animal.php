<?php
namespace app\models;

class Animal extends \app\core\Model{

	#[\app\validation\Name]
	var $name;

	function __construct(){
		parent::__construct();
	}

	function getOwner(){
		$SQL = 'SELECT * FROM client WHERE client_id = :client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$this->client_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Client");
		return $STMT->fetch();

	}

	function get($animal_id){
		$SQL = 'SELECT * FROM animal WHERE animal_id = :animal_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$animal_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM animal';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
		return $STMT->fetchAll();
	}

	function getAllForClient($client_id){
		$SQL = 'SELECT * FROM animal WHERE client_id=:client_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['client_id'=>$client_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
		return $STMT->fetchAll();
	}

	function insert(){
		if($this->isValid()){
			$SQL = 'INSERT INTO animal(client_id,name,dob,picture) VALUES(:client_id,:name,:dob,:picture)';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['client_id'=>$this->client_id,'name'=>$this->name,'dob'=>$this->dob,'picture'=>$this->picture]);
		}
	}

	function update(){
		if($this->isValid()){
			$SQL = 'UPDATE animal SET name = :name, dob = :dob, picture = :picture WHERE animal_id = :animal_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['name'=>$this->name,'dob'=>$this->dob,'picture'=>$this->picture,'animal_id'=>$this->animal_id]);
		}
	}

	function delete($animal_id){
		$SQL = 'DELETE FROM animal WHERE animal_id = :animal_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$animal_id]);
	}

}