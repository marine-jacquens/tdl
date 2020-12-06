<?php 
	require 'class/database.php';
	require 'class/users.php';
	$db = new Database();
	$user = new Users($db);
?>
<nav>
	<h1>To do list</h1>
	<a href="#"><i class="fas fa-user"></i></a>
</nav>