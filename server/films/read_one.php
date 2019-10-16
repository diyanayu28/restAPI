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
	 
	// set ID property of films to be edited
	$films->id = isset($_POST['id']) ? $_POST['id'] : die();
	 
	// read the details of films to be edited
	$films->readOne();
	 
	// create array
	$films_arr = array(
		"id" => $films->id,
		"title" => $films->title,
		"sutradara" => $films->sutradara,
		"tanggal_tayang" => $films->tanggal_tayang,
		"genre" =>  $films->genre,
	 
	);
	 
	// make it json format
	print_r(json_encode($films_arr));
?>