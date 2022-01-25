<?php

    //always include a namespace and make sure it matches where the file is actually located
    //note that it's the relative path
    namespace app\core;

    //require and require_once: includes a file and examines it for requested actions
    //note that the code only inherits variables/methods etc defined in Animal file from this point forward
    //if we try to use any of the variables from Animal.php before this line, it will NOT work
    //require_once('app/controllers/Animal.php'); 
    //note: doing this for every file/class we need takes off from loading time and it's annoying so we use autoloading instead

    //AUTO-LOADING for ^^ DONE -> CHECK AUTOLOAD.PHP

    class App {

        //definition of private variables
        private $controller = 'Main'; //default value 
        private $method = 'index'; //default value

        //definition of a constructor
        public function __construct() {
            //programmatic mapping of URLs to controllers and their methods:
            //pattern: /controller_class/method/parameter1/parameter2 -> just one of the routing algorithms we shall cry doing

            $url = self::parseUrl(); //self here refers to the class App (duh). this would be the same as doing App.parseUrl()
            //var_dump($url); //used for testing purposes

            if (isset($url[0])) { //checks if the given parameter exists and has a value other than null
                if (file_exists('app/controllers/' . $url[0] . '.php')) { //note that periods are used for concatenation
                    $this->controller = $url[0];
                }
                //this basically consumes $url[0]. look into whether this should be in an else block (I don't think so)
                unset($url[0]); 
            }
            $this->controller = 'app\\controllers\\' . $this->controller;
            $this->controller = new $this->controller; //app\controllers\Animal

            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) 
                    $this->method = $url[1];

                unset($url[1]);
            }
            //at this point, our url array looks like this -> [, , 'data', 'data'] -> positions 0 and 1 are empty because we consumed them
            $this->params = $url ? array_values($url) : []; // if url isn't null we're calling array_values method, otherwise params are empty

            call_user_func_array([$this->controller, $this->method], $this->params); //-> calling a user defined function that takes parameters
            //first param ^ takes the method in the controller and second param defines the parameters needed to call that method
        }

        private static function parseUrl() {
            if (isset($_GET['url'])) {
                // /controller_Class/method/parameter1/parameter2
                // -> ['controller_Class', 'method', 'param1', 'param2']
                return explode(
                    '/', 
                    filter_var(
                        rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL
                    )
                );
            }
        }
    }