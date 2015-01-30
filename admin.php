<!Doctype html>

<?php
	//Connection
	include_once "dbconnect.php";
	
	//Login Check
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location:login.php");
	}
?>

<html>
<head>
	<link href="css/admin.css" rel="stylesheet" style="text/css">
</head>

<body>
	<h1>Contentblokken</h1>
	<div>
		<table>
			<tr>
				<th>Tag</th>
				<th>Blok</th>
				<th>Paginaoptie</th>
				<th>Volgorde</th>
				<th>Topoptie</th>
				<th>Template</th>
				<th>Publish</th>
				<th class="derp"></th>
				<th class="pred"></th>
			</tr>
			<?php
				$publishlink[0]='nee';
				$publishlink[1]='ja';
			
				$query = "SELECT *
									FROM content";
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result))
				{
					$id = $row['id'];
					$tag = $row['tag'];
					$blok = $row['block'];
					$optie = $row['pageoption'];
					$volgorde = $row['pageorder'];
					$top = $row['topcontentid'];
					$template = $row['template'];
					$publish = $row['publish'];
					
					if($top >0)
					{
						$query2 = "SELECT *
											 FROM content
											 WHERE id = '$top'";
					  $result2 = mysql_query($query2);
						$row2 = mysql_fetch_assoc($result2);
						$topcontent = $row2['pageoption'];
					}
					else
					{
						$topcontent = "";
					}
					
					
					echo "<tr>
									<td>$tag</td>
									<td>$blok</td>
									<td>$optie</td>
									<td>$volgorde</td>
									<td>$topcontent</td>
									<td>$template</td>
									<td><a href='publish.php?id=$id'>$publishlink[$publish]</a></td>
									<td><a href='delete.php?id=$id'>verwijderen</a>
									<td><a href='edit.php?id=$id'>wijzigen</a>
								</tr>\n";
				}
				
			?>
		</table>
		<a href="edit.php">Blok toevoegen</a>
		<a href="logout.php">Afmelden</a>
		<a href="userManagement/useradmin.php">Userbeheer</a>
		
		<form action="upload_file.php" method="post" enctype="multipart/form-data">
			<label for="file" size="60">Upload:</label>
			<input type="file" size="60" name="file" id="file"><br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
</body>
</html>