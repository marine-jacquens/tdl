<?php 

// session_start();

require 'database.php';
$db = new Database();

require 'user.php';
$user = new User($db);



?>