<?php 
ob_start();
require'class/config.php';
if(isset($_SESSION['user']['id_user'])){header('location:todolist.php');}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil - Little Discord</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="index.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>

	<header><?php include('includes/header.php')?></header>

	<main>

		<?php include('includes/inscription.php')?>
		<?php include('includes/connexion.php')?>

	</main>

	<footer><?php include('includes/footer.php')?></footer>

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
<?php ob_end_flush();?>