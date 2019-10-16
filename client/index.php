<?php
/*
$json = file_get_contents('http://localhost/server/films/read.php');
$obj = json_decode($json);
print_r($obj); */

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://localhost/iaifilm/server/films/read.php');
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);
$data = $obj->films;

var_dump($_POST);

?>

<html>
<head>
<style type="text/css">
		body{
  font-family: 'Roboto', sans-serif;
}
		th, td {
			border: 1px solid #ccc;
			padding: 5px 15px;
		}
		a{
			color: #000;
			text-decoration: none;
		}
		a:hover{
			color: #ccc;
			text-decoration: none;
		}
	</style>
</head>
<body>
<br>
<center><h1>JADWAL TAYANG FILM</h1><center>

	<br>
	==============================
	<div align="center"><a href="insert.php">TAMBAH DATA</a></div>
	==============================
	<br>
	<br>
	<br>
	<br>
	<center>
<table>
  <tr>
		<th>Title</th>
		<th>Sutradara</th>
		<th>Tanggal Tayang</th>
		<th>Genre</th>
		<th>Edit</th> 
		<th>Delete</th> 
  </tr>
  <?php
  foreach($data as $d){
	?>
  <tr>
			<td><?=$d->title?></td>
			<td><?=$d->sutradara?></td>
			<td><?=$d->tanggal_tayang?></td>
			<td><?=$d->genre?></td>
	<td><a href="edit.php?id=<?=$d->id?>"><center><img src="images\pencil.png" width="25px"><center></a></td>
	<td><a href="delete.php?id=<?=$d->id?>"><center><img src="images\cancel.png" width="25px"><center></a></td>
  </tr>
  <?php
  }
  ?>
</table>
</center>
</body>
</html>