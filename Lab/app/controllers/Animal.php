<?php
    namespace app\controllers;

        class Animal extends \app\core\Controller {  

            public function index() {
                $this -> view('Animal/index');
            }

            public function create() { //for create views, I'd normally want to ask the user for input so -> forms
                if (!isset($_POST['action'])) //display view if I don't submit form
                    $this -> view('Animal/create');
                else //process data once form is submited -> button (action) is therefore set
                    $this -> view('Animal/feedback',  $_POST);

            }
        }