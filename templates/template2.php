<!Doctype html>

<html>
<head>
	<title>Pagina <?php pagetitle();?></title>
	<link href="css/template2.css" rel="stylesheet" style="text/css">
</head>

<body>
	
	<div class="wrapper">
		
		<div class="menu">
			<?php menu($page); ?>
		</div>
		
		<div class="content">
		
				
			<div class="header">
				<h1 class="img">Template at night</h1>
				<div class="pagename">
					<?php pagetitle();?>
				</div>
				<img src="css/images.jpg" width="80%" height="80%">
			</div>
			
			<div class="component">
				<?php component(); ?>
			</div>
			
		</div>	
		
		
		<div class="footer">
			<p>&copy; 2014 Copyright Theo Krommenhoek</p>
		</div>
		
	</div>
	<div class="rightside">
		<?php module('contact'); ?>
	</div>
</body>
</html>