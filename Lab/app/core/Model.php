<?php
    namespace app\core;

        class Model {

            protected static $_connection; //start with an underscore because connection is a reserved keyword
            
            //connect to a database so our models can talk to the database
            function __construct() {
                //this keyword is used for instance variables and self is used for class variables
                $host = 'localhost';
                $DBName = 'myapplication';
                $user = 'root';
                $password = '';
                self::$_connection = new \PDO("mysql:host=$host;dbname=$DBName", $user, $password);
            }
        }