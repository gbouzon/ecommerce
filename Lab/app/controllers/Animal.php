<?php
namespace app\controllers;

#[\app\filters\Auth]
class Animal extends \app\core\Controller{
	public function index($client_id){
		$myClient = new \app\models\Client();
		$myClient = $myClient->get($client_id);
		$animals = $myClient->getAnimals();
		$this->view('Animal/index',['client'=>$myClient,'animals'=>$animals]);//pass an array to the view
	}

	public function create($client_id){
		if(!isset($_POST['action'])){	//display he view if I don't submit the form
			$myClient = new \app\models\Client();
			$myClient = $myClient->get($client_id);
			$this->view('Animal/create',$myClient);
		}else{	//process the data
			//default value for the picture
			$filename= $this->imageUpload();
			$filename= ($filename==false?'blank.jpg':$filename);
			//save the file that gets sent as a picture
			
			$newAnimal = new \app\models\Animal();
			$newAnimal->client_id = $client_id;
			$newAnimal->name=$_POST['name'];
			$newAnimal->dob=$_POST['dob'];
			$newAnimal->picture=$filename;

			$newAnimal->insert();
			header("location:/Animal/index/$client_id");
		}
	}

	private function imageUpload(){
		//default value for the picture
		$filename=false;
		//save the file that gets sent as a picture
		$file = $_FILES['picture'];
		$acceptedTypes = ['image/jpeg'=>'jpg',
			'image/gif'=>'gif',
			'image/png'=>'png'];
		//validate the file
		if(empty($file['tmp_name']))
			return false;

		$fileData = getimagesize($file['tmp_name']);
		if($fileData!=false && 
			in_array($fileData['mime'],array_keys($acceptedTypes))){

			//save the file to its permanent location
			$folder = 'pictures';
			$filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];

			move_uploaded_file($file['tmp_name'], "$folder/$filename");
		}
		return $filename;
	}

	public function update($animal_id){
		//TODO: update a specific record
		$animal = new \app\models\Animal();
		$animal= $animal->get($animal_id);//get the specific animal
		//TODO: check if the animal exists
		if(!isset($_POST['action'])){
			//show the view
			$this->view('Animal/update', $animal);
		}else{
			$filename = $this->imageUpload();
			//TODO: this doesnt work?***
			if($filename!=false){
				if($animal->picture != 'blank.jpg')
					unlink('pictures/' . $animal->picture);
				$animal->picture=$filename;
			}
			$animal->name=$_POST['name'];
			$animal->dob=$_POST['dob'];
			$animal->update();
			header('location:/Animal/index/' . $animal->client_id);
		}
	}

	public function delete($animal_id){
		$animal = new \app\models\Animal();

		$animal= $animal->get($animal_id);//get the specific animal

		if($animal->picture != 'blank.jpg')
			unlink('pictures/' . $animal->picture);

		$animal->delete($animal_id);
		header('location:/Animal/index/' . $animal->client_id);
	}

	public function details($animal_id){
		$animal = new \app\models\Animal();
		$animal= $animal->get($animal_id);//get the specific animal
		$this->view('Animal/details', $animal);
	}

	public function contactInformation(){
		$fileHandle = fopen('contactInformation.txt', 'r');

		flock($fileHandle, LOCK_SH);

		$jsonData = fread($fileHandle, 1024);

		fclose($fileHandle);

		$dataObj = json_decode($jsonData);

		$this->view('Animal/contactInformation', $dataObj);

	}

}