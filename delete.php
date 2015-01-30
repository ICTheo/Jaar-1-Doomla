<?php
	//Connection
	include_once "dbconnect.php";
	
	//Login Check
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location:login.php");
	}
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM content 
						WHERE id = '$id'";
	
	mysql_query($query);
	header('Location: admin.php');
?>