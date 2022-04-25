<?php
namespace app\controllers;

#[\app\filters\Auth]
class Client extends \app\core\Controller{
	public function index(){
		$myClient = new \app\models\Client();
		$clients = $myClient->getAll();
		$this->view('Client/index',$clients);
	}

	public function create(){
		
		if(!isset($_POST['action'])){	//display he view if I don't submit the form
			$this->view('Client/create');
		}else{	//process the data
			$newClient = new \app\models\Client();
			$newClient->first_name=$_POST['first_name'];
			$newClient->last_name=$_POST['last_name'];
			$newClient->notes=$_POST['notes'];
			$newClient->email=$_POST['email'];
			$newClient->city=$_POST['city'];
			$newClient->province=$_POST['province'];
			$newClient->country=$_POST['country'];
			$newClient->postal=$_POST['postal'];
			$newClient->insert();
			header('location:/Client/index');
		}
	}

	public function update($client_id){
		//TODO: update a specific record
		$client = new \app\models\Client();
		$client= $client->get($client_id);//get the specific client
		//TODO: check if the client exists
		if(!isset($_POST['action'])){
			//show the view
			$this->view('Client/update', $client);
		}else{
			$client->first_name=$_POST['first_name'];
			$client->last_name=$_POST['last_name'];
			$client->notes=$_POST['notes'];
			$client->email=$_POST['email'];
			$client->city=$_POST['city'];
			$client->province=$_POST['province'];
			$client->country=$_POST['country'];
			$client->postal=$_POST['postal'];

			$client->update();
			header('location:/Client/index');
		}
	}

	public function delete($client_id){//TODO: make sure to satisfy the issue for the constraint
		$client = new \app\models\Client();
		$client->deleteAnimals($client_id);
		$client->delete($client_id);
		header('location:/Client/index');
	}

	public function details($client_id){
		$client = new \app\models\Client();
		$client= $client->get($client_id);//get the specific client
		$this->view('Client/details', $client);
	}

	public function contactInformation(){
		$fileHandle = fopen('contactInformation.txt', 'r');

		flock($fileHandle, LOCK_SH);

		$jsonData = fread($fileHandle, 1024);

		fclose($fileHandle);

		$dataObj = json_decode($jsonData);

		$this->view('Client/contactInformation', $dataObj);

	}

}