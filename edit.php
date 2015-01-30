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
	
	//Publish
	if (isset($_POST['publish']))
	{
		$publish = 1;
	}
	else
	{
		$publish = 0;
	}
	
	//Form
	//Edit
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$query = "SELECT *
							FROM content
							WHERE id = '$id'";
		$result = mysql_query($query);
					
		$row = mysql_fetch_assoc($result);
		
		$tag = $row['tag'];
		$blok = $row['block'];
		$optie = $row['pageoption'];
		$volgorde = $row['pageorder'];
		$template = $row['template'];
		$topcontentid = $row['topcontentid'];
		$publish = $row['publish'];
		
		$topoptions = '<option value="0">-</option>';
		$query2 = "SELECT *
							 FROM content
							 WHERE pageoption > '' and topcontentid = 0 and id <>" .$id;
		$result2 = mysql_query($query2);
		while ($row2 = mysql_fetch_assoc($result2))
		{	
			$pageoption2 = $row2['pageoption'];
			$id2 = $row2['id'];
			if ($id2 == $topcontentid)
			{
				$selected = "selected";
			}
			else
			{
				$selected = "";
			}
			$topoptions = $topoptions . '<option value="' . $id2 . '" ' . $selected . ' > ' .$pageoption2 . '</option>';
		}
	}
	//New
	else
	{
		$id = "";
		$tag = "";
		$blok = "";
		$optie = "";
		$volgorde = "";
		$template = "";
		$topcontentid = "";
		$publish = "";
		
		$topoptions = '<option value="0" select>-</option>';
		$query2 = "SELECT *
							 FROM content
							 WHERE pageoption > '' and topcontentid = 0";
		$result2 = mysql_query($query2);

		while ($row2 = mysql_fetch_assoc($result2))
		{	
			$pageoption2 = $row2['pageoption'];
			$id2 = $row2['id'];
			$topoptions = $topoptions . '<option value="' . $id2 . '"> ' .$pageoption2 . '</option>';
		}
	}
	
	$errors = "";
	
	//Submit
	if(isset($_POST['submit']) == "opslaan")
	{
		$tag = $_POST['tag'];
		$block = $_POST['blok'];
		$pageoption = $_POST['paginaoptie'];
		$volgorde = $_POST['volgorde'];
		$template = $_POST['template'];
		$top = $_POST['topcontentid'];	
		
		if (empty($tag))
		{
			$errors = $errors . 'Tag moet een waarde bevatten<br>';
		}
		if (empty($block))
		{
			$errors = $errors . 'Content moet een waarde bevatten<br>';
		}		
		if (empty($pageoption))
		{
			$errors = $errors . 'Tag moet een waarde bevatten<br>';
		}
		if (!ctype_digit($volgorde))
		{
			$errors = $errors . 'Topoptie mag alleen cijfers bevatten<br>';
		}
		
		if ($errors == ''){
			//Edit
			$publish = $_POST['publish'];	
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$query = "UPDATE content 
									SET tag = '$tag', block = '$block', pageoption = '$pageoption', pageorder = '$volgorde', template = '$template', topcontentid = '$top', publish = '$publish'
									Where id = '$id'";
			}
			//New
			else
			{
				$query = "INSERT INTO content (tag, block, pageoption, pageorder, template, topcontentid, publish)
				VALUES ('$tag', '$block', '$pageoption', '$volgorde', '$template', '$top c', '$publish')";
			}
			mysql_query($query);
			header('Location: admin.php');
		}
	}
?>

<html>
<head>
	<title></title>
	<?php include "tinyMCE.php"?>
	<link href="index.css" rel="stylesheet" style="text/css">
</head>

<body>
	<form action="" method="post">
		<p>
			<label>Tag: </label>
			<input type="text" value="<?php echo $tag; ?>" name="tag" />
		</p>
		
		<p>
			<label>Blok: </label>
			<textarea id="elm1" name="blok"><?php echo $blok; ?></textarea>
		</p>
		
		<p>
			<label>Paginaoptie: </label>
			<input type="text" value="<?php echo $optie; ?>" name="paginaoptie" />
		</p>
				
		<p>
			<label>Volgorde: </label>
			<input type="text" value="<?php echo $volgorde; ?>" name="volgorde" />
		</p>
		
		<p>
			<label>Topoptie </label>
			<select name="topcontentid"><?php echo $topoptions; ?></select>
		</p>
		
		<p>
			<label>Template: </label>
			<input type="text" value="<?php echo $template; ?>" name="template" />
		</p>
		
		<p>
			<label>Publish: </label>
			<input type="checkbox" name="publish" value="1"<?php if ($publish) echo 'checked="checked"'; ?> />
		</p>
		
		<input type="submit" name="submit" value="opslaan" />
		
		<h3><?php echo $errors ?></h3>
		
	</form>
</body>
</html>