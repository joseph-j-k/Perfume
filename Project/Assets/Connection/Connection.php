<?php 
$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "db_perfumes";
$conn = mysqli_connect($Servername, $Username, $Password, $Database);

if(!$conn)
	{
	die("Connection  Failed:".mysqli_connect_error());
	}

?>