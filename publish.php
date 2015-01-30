<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location: login.php");
	}
	include_once "dbconnect.php";
	if (isset($_GET['id']) && (int)$_GET['id'] >0)
	{
		$query = "SELECT *
							FROM content
							WHERE id = " . $_GET['id'];
		$result = mysql_query($query);
		
		if ($row = mysql_fetch_assoc($result))
		{
			$id = $row['id'];
			$publish = $row['publish'];
			
			if ($publish == 1)
			{
				$publish = 0;
			}
			else
			{
				$publish = 1;
			}
			$query = "UPDATE content
								SET publish = " . $publish . "
								WHERE id = " . $id;
								
			$result = mysql_query($query);
		}
		header("Location: admin.php");
	}
?>