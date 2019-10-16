<html>
	<head>
	<style type="text/css">

		th, td {
			border: 1px solid #CCCCCC;
			padding: 5px 15px;
		}
	</style>
	</head>
	<body>
	<br>
	<br>
	<br>
	<br><br><br>
	<br>
	<center>
<table>
	<form method="POST">
		<th>Add Film</th>
		<th><a href="index.php">Lihat Data</a></th>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Sutradara:</td>
			<td><input type="text" name="sutradara"></td>
		</tr>
		<tr>
			<td>Tanggal Tayang:</td>
			<td><input type="date" name="tanggal_tayang"  value="2018-01-01" ></td>
		</tr>
		<tr>
			<td>Genre:</td>
			<td><input type="text" name="genre"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="aksi" value="tambah"></td>
		</tr>
	</form>
</table>
<center>
	</body>
	</html>
<?php
	if(@$_POST['aksi'] == 'tambah'){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/iaifilm/server/films/create.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$title = $_POST['title'];
		$sutradara = $_POST['sutradara'];
		$tanggal_tayang = $_POST['tanggal_tayang'];
		$genre = $_POST['genre'];
		curl_setopt($ch, CURLOPT_POSTFIELDS, "title=$title &sutradara=$sutradara&tanggal_tayang=$tanggal_tayang&genre=$genre");

		$server_output = curl_exec($ch);

		curl_close ($ch);
		
		header("Location: index.php");
	}
?>