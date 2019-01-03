<!doctype html>

<html>
	<head>
		<title> <?php echo $page_title; ?> </title>
		<meta charset="utf-8">
		<link rel="stylesheet" media="all" href="<?php echo url_for('stylesheets/styles.css'); ?>"/>
	</head>

	<body>
		<header>
			<?php echo $page_title; ?>
		</header>

		<nav>
			<ul>
				<li> <a href=" <?php echo url_for('main-index.php'); ?>">Home</a> </li>
			</ul>
		</nav>
