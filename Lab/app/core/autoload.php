<?php

//not yet a full psr-4 autoloader,  
spl_autoload_register( //will be invoked when a class needs to be included
    function ($class_name) { // a lambda function, no name
        require_once($class_name . '.php'); 
        //we're usually going to do require_once whenever we need resources 
        //require will come later on (for what idk don't ask me)
    }
);