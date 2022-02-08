<?php
    namespace app\controllers;

        class Client extends \app\core\Controller {  

            public function index() {
                $myClient = new \app\models\Client();
                $clients = $myClient->getAll();
                $this->view('Client/index', $clients);
            }

            public function create() { //for create views, I'd normally want to ask the user for input so -> forms
                if (!isset($_POST['action'])) //display view if I don't submit form
                    $this -> view('Client/create');

                else { //process data once form is submited -> button (action) is therefore set
                    $newClient = new \app\models\Client();
                    $newClient->first_name = $_POST['first_name'];
                    $newClient->last_name = $_POST['last_name'];
                    $newClient->notes = $_POST['notes'];
                    $newClient->phone = $_POST['phone'];

                    $newClient->insert();
                    header('location:/Client/index');
                }
            }

            public function update($client_id) {
                //TODOl update a specific record
                $client = new \app\models\Client();
                $client = $client->get($client_id); //get the specific Client
                //TODO: check if the Client exists
                if (!isset($_POST['action'])) {
                    //show the view
                    $this->view('Client/update', $client);
                }
                else {
                    $newClient->first_name = $_POST['first_name'];
                    $newClient->last_name = $_POST['last_name'];
                    $newClient->notes = $_POST['notes'];
                    $newClient->phone = $_POST['phone'];

                    $client->update();
                    header('location:/Client/index');
                }
            }

            public function delete($client_id) { //TODO: make sure to satisfy the issue for the constraint
                $client = new \app\models\Client();
                $client->delete($client_id);
                header('location:/Client/index');
            }

            public function details($client_id) {
                $client = new \app\models\Client();
                $client = $client->get($client_id); //get the specific Client
                $this->view('Client/details', $client);
            }

            public function createInDB() {
                $myClient = new \app\models\Client();
            }


        }