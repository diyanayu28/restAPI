<?php
	if(@$_GET['id'] > 0){
		$id = $_GET['id'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,"http://localhost/iaifilm/server/films/read_one.php");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id");
		
		$result = curl_exec($ch);
		curl_close($ch);

		$obj = json_decode($result);
		print_r($obj);
		
	}

	if(@$_POST['aksi'] == 'Edit'){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/iaifilm/server/films/edit.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$id = $_GET['id'];
		$title = $_POST['title'];
		$sutradara = $_POST['sutradara'];
		$tanggal_tayang = $_POST['tanggal_tayang'];
		$genre = $_POST['genre'];
		curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id&title=$title &sutradara=$sutradara&tanggal_tayang=$tanggal_tayang&genre=$genre");

		$server_output = curl_exec($ch);

		curl_close ($ch);
		
		header("Location: index.php");
	}
?>

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
	<br><br>
	<br>
	<center>
<table>
	<form method="POST">
		<th>Edit Film</th>
		<th><a href="index.php">Lihat Data</a></th>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value="<?php echo $obj->title;?>"></td>
		</tr>
		<tr>
			<td>Sutradara:</td>
			<td><input type="text" name="sutradara" value="<?php echo $obj->sutradara;?>"></td>
		</tr>
		<tr>
			<td>Tanggal Tayang:</td>
			<td><input type="date" name="tanggal_tayang"  value="<?php echo $obj->tanggal_tayang;?>"" ></td>
		</tr>
		<tr>
			<td>Genre:</td>
			<td><input type="text" name="genre" value="<?php echo $obj->genre;?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="aksi" value="Edit"></td>
		</tr>
	</form>
</table>
<center>
	</body>
	</html>


