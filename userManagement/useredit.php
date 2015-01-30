<!Doctype html>

<?php
	//Login Check
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location: ../login.php");
	}
	
	//Connection
	include_once "../dbconnect.php";

	if(isset($_GET['name']))
	{
		$name = $_GET['name'];
		$title = "User wijzigen";
		$query = "SELECT *
							FROM user
							WHERE name = '$name'";
		$result = mysql_query($query);
					
		$row = mysql_fetch_assoc($result);
		
		$password = $row['password'];
	}
	else
	{
		$title = "User toevoegen";
		$name = "";
		$password = "";
	}
	
	$errors = "";
	
	//Submit
	if(isset($_POST['submit']) == "opslaan")
	{
		$name = $_POST['name2'];
		$password = $_POST['password'];
		
		//Errors
		if(empty($name))
		{
			$errors = $errors . "Naam mag niet leeg zijn!<br>";
		}
		if(empty($password))
		{
			$errors = $errors . "Wachtwoord mag niet leeg zijn!";
		}
		
		if($errors == "")
		{
			//Edit
			if(isset($_GET['name']))
			{
				$actname = $_GET['name'];
				$query = "UPDATE user
									SET name = '$name', password = '$password'
									WHERE name = '$actname'";
			}
			//New
			else
			{
				$query = "INSERT INTO user (name, password)
				VALUES ('$name', '$password')";
			}
			mysql_query($query);
			header("Location: useradmin.php");
		}
	}
	
?>

<html>
<head>
	<title><?php echo $title ?></title>
	<link href="index.css" rel="stylesheet" style="text/css">
</head>

<body>
	<form action="" method="post">
		<p>
			<label>Naam: </label>
			<input type="text" value="<?php echo $name?>" name="name2"/>
		</p>
		
		<p>
			<label>Wachtwoord: </label>
			<input type="text" value="<?php echo $password?>" name="password">
		</p>
		
		<input type="submit" name="submit" value="Opslaan">
	
		<h3><?php echo $errors ?></h3>
		
	</form>
</body>
</html>