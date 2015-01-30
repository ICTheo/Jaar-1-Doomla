<!Doctype html>

<?php 
	
	//Includes
	
	include_once "dbconnect.php";
	include_once "module.php";
	include_once "menu.php";
	include_once "view.php";
	
	//Homepage
	
	$page = 'home';
	if ( isset($_GET['page']) )
	{
		$page =  $_GET['page'];
	}
	
	view();
?>