<?php

//FICHIER QUI INSTANCIE LES CLASS EN POO
require '../class/config.php';

if(!empty($_POST['mail']) AND !empty($_POST['password'])){

	$mail = $_POST['mail'];
	$password = $_POST['password'];

	$data = $user->connect($mail,$password);

	echo $data;

}
else{
	echo "Veuillez remplir tous les champs"; 
}

?>