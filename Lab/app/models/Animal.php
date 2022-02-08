<?php
    namespace app\models;

        class Animal extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($animal_id) {
                $SQL = 'SELECT * FROM animal WHERE animal_id = :animal_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['animal_id'=>$animal_id]);
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
                return $STMT->fetch(); //fetch is what we use to return one record that match the statement
            }

            function getAll() {
                $SQL = 'SELECT * FROM animal';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            function getAllForClient($client_id) {
                $SQL = 'SELECT * FROM animal WHERE client_id = :client_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['client_id'=>$client_id]);
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            function insert($client_id) {
                $SQL = 'INSERT INTO animal(name, dob, client_id) VALUES(:name, :dob, $client_id)';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['name'=>$this->name, 'dob'=>$this->dob, 'client_id'=>$client_id]);
            }

            function update() {
                $SQL = 'UPDATE animal SET name = :name, dob = :dob WHERE animal_id = :animal_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['name'=>$this->name, 'dob'=>$this->dob, 'animal_id'=>$this->animal_id]);
            }

            function delete($animal_id) {
                $SQL = 'DELETE FROM animal WHERE animal_id = :animal_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['animal_id'=>$animal_id]);
            }
        }