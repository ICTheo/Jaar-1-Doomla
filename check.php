<?php
	session_start();
	
	//Connection
	include_once "dbconnect.php";;
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	
	$sql = "SELECT *
			FROM gebruiker
			WHERE email = :email and password = :paswoord";
	$result = $db->prepare($sql);

	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam('::paswoord', $paswoord, PDO::PARAM_STR);
	
	if ($row = mysql_fetch_assoc($result))
	{
		$_SESSION['user'] = $name;
		header("Location:admin.php");
	}
	else
	{
		header("Location:login.php");
	}
?>