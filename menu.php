<?php
	function menu($page)
	{
		//Connection
		include_once "dbconnect.php";
		
		$query = "SELECT *
							FROM content
							WHERE pageoption >'' and topcontentid = 0 and publish = '1'
							ORDER BY pageorder";
		$result = mysql_query($query);
		
		if($result)
		{
			echo "<ul>\n";
			while ($row = mysql_fetch_assoc($result))
			{
				$tag = $row['tag'];
				$pageoption = $row['pageoption'];
				
				if($page == $tag){
					$activeclass=' class="active"';
				}
				else{
					$activeclass= '';
				}
				$submenu = "";
				$query2 = "SELECT *
									 FROM content
									 WHERE pageoption >'' and topcontentid = '".$row['id']."' and publish = '1'
									 ORDER BY pageorder";
				$result2 = mysql_query($query2);
				if ($result2)
				{
					while ($row2 = mysql_fetch_assoc($result2))
					{
						$subtag = $row2['tag'];
						$suboption = $row2['pageoption'];
						if ($subtag == $page)
						{
							$activeclass2 = ' class="active" ';
						}
						else
						{
							$activeclass2 = "";
						}
						$submenu = $submenu . "<li " . $activeclass2 . "><a href=\"?page=" . $subtag . "\">" . $suboption . "</a></li>\n";
					}
					if ($submenu > "")
						$submenu = "<ul class=\"submenu\">\n" . $submenu . "</ul>\n";
				}
				echo "<li $activeclass><a href=\"?page=" . $tag . "\">" . $pageoption . "</a>" . $submenu . "</li>\n";
			}
			echo "</ul>\n";
		}
	}
?>