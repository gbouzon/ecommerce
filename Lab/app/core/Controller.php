<?php
    namespace app\core;
        //TODO: FIX VIEWS THEY'RE UGLY AF
        class Controller {
            //meant to include views dynamically if they exist
            public function view($name, $data = []) { 
                if (file_exists('app/views/' . $name . '.php')) //we'll change this to require later on
                    include('app/views/' . $name . '.php');
                else
                    echo 'app/views/' . $name . '.php does not exist';
                
                    //include takes the file content and treats it as if it was in this exact scope
            }
        }