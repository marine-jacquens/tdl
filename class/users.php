<?php 

class Users{
	private $id_user;
  private $surname;
  private $firstname;
	private $mail;
	private $password;

	public function __construct($db)
  	{
    	$this->db = $db;
  	}

  	public function register ($surname,$firstname,$mail,$password,$check_password)
  	{

      if(!empty($surname && $firstname && $mail && $password && $check_password)){

        $connexion_db = $this->db->connectDb();

        $firstname_required = preg_match("#^[A-Z]?[a-z]+[-]?[A-Z]?[a-z]{2,20}$#",$firstname);

        $surname_required = preg_match("#^[A-Z]?[a-z]+[-]?[A-Z]?[a-z]{2,20}$#",$surname);

        $mail_required = preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mail);

        $password_required = preg_match("#^[!^$(){}?+*.[\#\]-]+[A-Z]+[0-9]+[a-z]{6,9}$#",$password);

        if(!$firstname_required){echo "Le prénom doit:<ul> <li> - Comporter entre 2 et 20 caractères.</li> <li> - Commencer et finir par une lettre.</li> <li> - Ne contenir aucun caractère spécial (excepté un espace).</li> </ul>";
        }
        elseif(!$surname_required){echo "Le nom doit:<ul> <li> - Comporter entre 2 et 20 caractères.</li> <li> - Commencer et finir par une lettre.</li> <li> - Ne contenir aucun caractère spécial (excepté un espace).</li> </ul>";
        }
        elseif(!$mail_required){echo "L'email n'est pas conforme";
        }
        elseif(!$password_required){echo "Le mot de passe doit comporter : <ul> <li> 6 caractères minimum </li> <li> dont une majuscule </li> <li> une minuscule </li> <li> un chiffre </li> <li> un caractère spécial </li> </ul>";
        }
        else{

          if($password == $check_password){

            $check_mail = $connexion_db->prepare("SELECT mail FROM users WHERE mail = '$mail' ");
            $check_mail->execute();
            $checked_mail = $check_mail->fetchAll(PDO::FETCH_ASSOC);

            if(empty($checked_mail[0]))
            {
              
              $user_status = "normal";
              $get_user_status = $connexion_db->prepare(" SELECT id_user_status FROM users_status WHERE name_user_status = '$user_status' ");
              $get_user_status->execute();
              $id_user_status = $get_user_status->fetch(PDO::FETCH_ASSOC);
              

              $id = intval($id_user_status['id_user_status']);
              var_dump($id);
              $hash = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));

              $insert_new_user = "INSERT into users (surname,firstname,mail,password,id_user_status) VALUES (:surname,:firstname,:mail,:password,:id_user_status)";
              $execution_insert = $connexion_db->prepare($insert_new_user);
              $execution_insert->bindParam(':surname',$surname,PDO::PARAM_STR);
              $execution_insert->bindParam(':firstname',$firstname,PDO::PARAM_STR);
              $execution_insert->bindParam(':mail',$mail,PDO::PARAM_STR);
              $execution_insert->bindParam(':password',$hash,PDO::PARAM_STR);
              $execution_insert->bindParam(':id_user_status',$id,PDO::PARAM_INT);
              $execution_insert->execute();

              header("location:index.php");
              exit;

            }else{echo"Ce mail existe déjà ";}

          }else {echo "Les champs mot de passe et confirmation de mot de passe doivent être identiques ";}

        }

      }else{"Veuillez remplir tous les champs";}
  		

  	}

  	public function connect ($mail,$password)
  	{
  		
  	}

}

?>