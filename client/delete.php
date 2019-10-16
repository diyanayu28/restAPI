<?php
	if(@$_GET['id'] > 0){
		$id = $_GET['id'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/iaifilm/server/films/delete.php");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id");
		$server_output = curl_exec($ch);

		curl_close($ch);
		header("Location: index.php");
	}
?>