<?php
    namespace app\controllers;

        class Animal extends \app\core\Controller {  

            public function index() {
                $animalsJSON = file('animalList.txt');
                $this -> view('Animal/index', $animalsJSON);
            }

            public function create() { //for create views, I'd normally want to ask the user for input so -> forms
                if (!isset($_POST['action'])) //display view if I don't submit form
                    $this -> view('Animal/create');
                else { //process data once form is submited -> button (action) is therefore set
                   $data = ['name'=>$_POST['name'], 'dob'=>$_POST['dob']];
                   $dataString = json_encode($data);

                    $fileHandle = fopen('animalList.txt', 'a');
                    flock($fileHandle, LOCK_EX);
                    fwrite($fileHandle, $dataString . "\n");
                    fclose($fileHandle);

                    header('location:/Animal/index');
                    // $this -> view('Animal/feedback',  $_POST);
                }
            }

            public function createInDB() {
                $myAnimal = new \app\models\Animal();
            }

            public function contactInformation() {
                $fileHandle = fopen('contactInformation.txt', 'r');
                flock($fileHandle, LOCK_SH);
                $jsonData = fread($fileHandle, 1024);
                fclose($fileHandle);
                $dataObj = json_decode($jsonData);
                $this->view('Animal/contactInformation', $dataObj);
            }
        }