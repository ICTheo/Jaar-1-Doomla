<!Doctype html>

<html>
<head>
	<title>Pagina <?php pagetitle(); ?></title>
	<link href="css/template.css" rel="stylesheet" style="text/css">
</head>

<body>
	
	<div class="wrapper">
		
		<div class="header">	
			<div class="pagename">
				<h3><?php pagetitle();?></h3>
			</div>
			<div class="menu">
				<?php menu($page); ?>
			</div>
		</div>
		
		<div class="content">
				
			<h1 class="img">Template</h1>
			<img src="css/images.jpg" width="80%" height="80%">
			
			<div class="component">
				<?php component(); ?>
			</div>
			
		</div>	
		<?php
?>
		
		<div class="footer">
			<p>&copy; 2014 Copyright Theo Krommenhoek</p>
		</div>
		
	</div>
	<div class="rightside">
		<?php module('contact'); ?>
	</div>
</body>
</html>