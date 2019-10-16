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
	
	// query films
	$stmt = $films->read();
	$num = $stmt->rowCount();
	
	if($num>0){
		// films array
		$films_arr=array();
		$films_arr["films"]=array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			// extract row
			extract($row);
	 
			$films_item=array(
				"id" => $id,
				"title" => $title,
				"sutradara" => $sutradara,
				"tanggal_tayang" => $tanggal_tayang,
				"genre" => $genre,
			);
	 
			array_push($films_arr["films"], $films_item);
		}
	 
		echo json_encode($films_arr);
	}else{
		echo json_encode(
			array("message" => "No films found.")
		);
	}