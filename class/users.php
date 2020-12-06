<?php 

class Users{
	private $id_user;
	private $mail;
	private $password;

	public function __construct($db)
  	{
    	$this->db = $db;
  	}

  	public function register ($mail,$password,$check_password)
  	{
  		$hash = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));

  		if($mail && $password && $check_password){
  			if($password == $check_password){

  				if(preg_match("[A-Z a-z ]{8}",$password)){
  					/*preg_match("#^5[1-5]{3}([- ]?[0-9]{4}){3}$#", $_POST['card_number']);*/
  				}else {echo "Le mot de passe doit comporter : <ul> <li> 8 caractères </li> <li> une majuscule </li> <li> une minuscule </li> <li> un chiffre </li> <li> un caractère spécial </li> </ul>"}

  			}else {echo "Les champs mot de passe et confirmation de mot de passe doivent être identiques ";}
  		}

  	}

  	public function connect ($mail,$password)
  	{
  		
  	}

}

?>