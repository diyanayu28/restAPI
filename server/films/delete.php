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
	
	// create the films
	if($films->delete()){
		echo '{';
			echo '"message": "films was deleted."';
		echo '}';
	}
	 
	// if unable to create the films, tell the user
	else{
		echo '{';
			echo '"message": "Unable to delete films."';
		echo '}';
	}
?>