<?php
	// required headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	 
	// include database and object files
	include_once '../config/database.php';
	include_once '../objects/films.php';
	
	// instantiate database and films object	
	$database = new Database();
	$db = $database->getConnection();
	 
	$films = new films($db);
	 
	// get posted data
	//$data = json_decode(file_POST_contents("php://input"));
	 
	// set films property values
	$films->id = isset($_POST['id']) ? $_POST['id'] : die();
	$films->title = isset($_POST['title']) ? $_POST['title'] : die();
	$films->sutradara = isset($_POST['sutradara']) ? $_POST['sutradara'] : die();
	$films->tanggal_tayang = isset($_POST['tanggal_tayang']) ? $_POST['tanggal_tayang'] : die();
	$films->genre = isset($_POST['genre']) ? $_POST['genre'] : die();
	
	// create the films
	if($films->update()){
		echo '{';
			echo '"message": "films was created."';
		echo '}';
	}
	 
	// if unable to create the films, tell the user
	else{
		echo '{';
			echo '"message": "Unable to create films."';
		echo '}';
	}
?>