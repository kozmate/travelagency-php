<?php
	include('include/functions.php');
	include('include/search.php');
	$conn = pdo_conn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Utazás</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="0">

	<div class="cont">
		<? if($search == $error_page) echo $error_page['text']; else include("pages/{$search['file']}.php"); ?>
		<? if($search != $pages['view']) echo '<a href="index.php">Vissza</a>'; ?>
	</div>
	
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>