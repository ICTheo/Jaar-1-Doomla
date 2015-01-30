<?php
	include_once "config.php";
	
	$connection = mysql_connect($dbserver, $dbuser, $dbpassword);
	mysql_select_db($dbname);
	if (!$connection) 
	{
    die('Could not connect: ' . mysql_error());
	}
?>