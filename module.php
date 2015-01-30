<?php
	function module($tag)
	{
		mysql_connect("localhost", "root");
		mysql_select_db("doomla");
		
		$query = "SELECT *
							FROM content
							WHERE tag = '$tag' and publish = '1'";
		$result = mysql_query($query);
		if ($row = mysql_fetch_assoc($result))
		{
			$module = $row['block'];
			echo $module;
		}
	}
?>