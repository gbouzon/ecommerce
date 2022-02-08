<?php
    namespace app\controllers;

        class Animal extends \app\core\Controller {  

            public function index($client_id) { //animals that belong to someone
                $myClient = new \app\models\Client();
                $myClient = $myClient->get($client_id);
                $animals = $myClient->getAnimals();
                $this->view('Animal/index', ['client'=>$myClient, 'animals'=>$animals]);
            }

            //an animal belongs to someone so client needed
            public function create($client_id) { //for create views, I'd normally want to ask the user for input so -> forms
                if (!isset($_POST['action'])) //display view if I don't submit form
                    $this -> view('Animal/create');

                else { //process data once form is submited -> button (action) is therefore set
                    $newAnimal = new \app\models\Animal();
                    $newAnimal->name = $_POST['name'];
                    $newAnimal->dob = $_POST['dob'];

                    $newAnimal->insert();
                    header('location:/Animal/index');
                }
            }

            public function update($animal_id) {
                //TODOl update a specific record
                $animal = new \app\models\Animal();
                $animal = $animal->get($animal_id); //get the specific animal
                //TODO: check if the animal exists
                if (!isset($_POST['action'])) {
                    //show the view
                    $this->view('Animal/update', $animal);
                }
                else {
                    $animal->name = $_POST['name'];
                    $animal->dob = $_POST['dob'];

                    $animal->update();
                    header('location:/Animal/index');
                }
            }

            public function delete($animal_id) {
                $animal = new \app\models\Animal();
                $animal->delete($animal_id);
                header('location:/Animal/index');
            }

            public function details($animal_id) {
                $animal = new \app\models\Animal();
                $animal = $animal->get($animal_id); //get the specific animal
                $this->view('Animal/details', $animal);
            }

            public function createInDB() {
                $myAnimal = new \app\models\Animal();
            }
        }