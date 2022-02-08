<?php
    namespace app\models;

        class Client extends \app\core\Model {

            function __construct() {
                parent::__construct();
            }

            function get($client_id) {
                $SQL = 'SELECT * FROM client WHERE client_id = :client_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['client_id'=>$client_id]);
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Client");
                return $STMT->fetch(); //fetch is what we use to return one record that match the statement
            }

            function getAll() {
                $SQL = 'SELECT * FROM client';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute();
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Client");
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            function getAnimals() { //this way we don't need a parameter
                $SQL = 'SELECT * FROM animal WHERE client_id = :client_id';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['client_id'=>$this->$client_id]);
                //TODO: add something here to make the return types cooler (according to michel)
                $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Animal");
                return $STMT->fetchAll(); //fetchAll is what we use to return all of the records that match the statement
            }

            function insert() {
                $SQL = 'INSERT INTO client(first_name, last_name, notes, phone) VALUES(:first_name, :last_name, :notes, :phone)';
                //always use PDO and prepared statements to avoid sql injections
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'notes'=>$this->notes, 'phone'=>$this->phone]);
            }

            function update() {
                $SQL = 'UPDATE client SET first_name = :first_name, last_name = :last_name, notes = :notes, phone = :phone WHERE client_id = :client_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'notes'=>$this->notes, 'phone'=>$this->phone, 'client_id'=>$this->client_id]);
            }

            function delete($client_id) {
                $SQL = 'DELETE FROM client WHERE client_id = :client_id';
                $STMT = self::$_connection->prepare($SQL);
                $STMT->execute(['client_id'=>$client_id]);
            }
        }