<?php
    namespace app\core;

        class DBConnection {

            static $connection = null;

            private function __construct() {
                if (self::$connection == null) {
                    $host = 'localhost';
                    $DBName = 'myapplication';
                    $user = 'root';
                    $password = '';
                    self::$connection = new \PDO("mysql:host=$host;dbname=$DBName", $user, $password);
                }

            }

            public static function getInstance() {
                $connection = new DBConnection();
                return self::$connection;
            }
        }