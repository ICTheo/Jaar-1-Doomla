<?php
	//Connection
	include_once "dbconnect.php";
	
	$component = "";
	$pagetitle = "";
	
	function view()
	{
		global $page, $component;
		$query = "SELECT *
							FROM content
							WHERE tag = '$page' and publish = 1";
		$result = mysql_query($query);
		
		if ($row = mysql_fetch_assoc($result))
		{
			$component = $row['block'];
		}
		else
		{
			$component = "page $page not found";
		}
	
		global $pagetitle;
		$pagetitle = $row['pageoption'];
		
		$template = "template.php";
		if (isset($row['template']) && $row['template'] >"")
		{
			$template = $row['template'];
		}
		include "templates/$template";
	}
	
	function component()
	{
		global $component;
		echo $component;
	}
	
	function pagetitle() 
	{
		global $pagetitle;
		echo $pagetitle;
	}
?>