<?php 
	
	//FICHIER QUI INSTANCIE LES CLASS EN POO
	require '../class/config.php';

	if(!empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['checkPassword'])){

		$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
		$firstname = htmlspecialchars(strip_tags($_POST['firstname']));
		$mail = htmlspecialchars(strip_tags($_POST['mail']));
		$password = $_POST['password'];
		$checkPassword = $_POST['checkPassword'];

		if(preg_match("#^[A-Za-z]{1}[A-Z- a-z]{1,}$#", $lastname) AND preg_match("#^[A-Za-z]{1}[A-Z- a-z]{1,}$#", $firstname)){

			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

				if(preg_match("#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$#", $password)){

					if($password == $checkPassword){

						$passwordHash = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));

						// APPEL DE LA FONCTION QUI RECHERCHE LES CORRESPONDANCES DANS LA CLASS SEARCH
						$data = $user->register($lastname,$firstname,$mail,$passwordHash);

						//AFFICHAGE DU RESULTAT DE LA REQUETE 
						echo $data;

					}
					else{
						echo "Les champs mot de passe et confirmation de mot de passe doivent être identiques" ;
					}

				}
				else{
					echo "Votre mot de passe doit contenir entre 8 et 15 caractères dont : une majuscule, une minuscule, un chiffre et un caractère spécial($@%*+-_!)";
				}
						
			}
			else{
				echo "Votre email n'est pas conforme"; 
			}

		}
		else{

			echo "Les champs nom et prénom ne sont pas conforme";
		}

	}	
	else{
		echo "Remplissez tous les champs"; 
	}

?>