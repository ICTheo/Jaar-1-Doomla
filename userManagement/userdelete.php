<?php
	//Connection
	include_once "../dbconnect.php";
	
	//Login Check
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location: ../login.php");
	}
	
	$name = $_GET['name'];
	
	$query = "DELETE FROM user
						WHERE name = '$name'";
						
	mysql_query($query);
	header('Location: useradmin.php');
?>