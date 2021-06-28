<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo self::titulo; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH_FULL ?>css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<header>
	<div class="center">
		<div class="logo">
			<h2>Matheus Bientinezi</h2>
		</div><!--logo-->
		<nav class="menu">
			<?php
				foreach ($this->menuItems as $key => $value) {
					echo '<a href="'.INCLUDE_PATH.strtolower($value).'">'.$value.'</a>';
				}
			?>
		</nav><!--menu-->
		<div class="clear"></div>
	</div><!--center-->
</header>