<!Doctype html>

<?php
	//Connection
	include_once "../dbconnect.php";
	
	//Login Check
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location: ../login.php");
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
				<th class="derp"></th>
				<th class="pred"></th>
			</tr>
			<?php
				$query = "SELECT *
									FROM user";
				$result = mysql_query($query);
				
				while ($row = mysql_fetch_assoc($result))
				{

					$name = $row['name'];
					$password = $row['password'];
					
					echo "<tr>
									<td>$name</td>
									<td>$password</td>
									<td><a href='userdelete.php?name=$name'>verwijderen</a>
									<td><a href='useredit.php?name=$name'>wijzigen</a>
								</tr>\n";
				}
				
			?>
		</table>
		<a href="useredit.php">Blok toevoegen</a>
		<a href="logout.php">Afmelden</a>
	</div>
</body>
</html>