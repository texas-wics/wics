<html>
	<head>
		<title>Women in Computer Science | The University of Texas at Austin</title>
		<link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
	    <?php echo Asset::styles(); ?>
	    <?php echo Asset::scripts(); ?>
	</head>
	<body>
		<div id="background"></div>
		<div class="container">
			<div class="row"><?=$header;?></div>
			<div class="row">
				<div id="content" class="span12">
				<div class="row"><?=$topnav;?></div>
				<?=$content;?>
				</div>
				<div id="events" class="span4">
				<?=$nav;?>
				</div>
			</div>
			<div class="row"><?=$footer;?></div>
		</div>
	</body>
</html>