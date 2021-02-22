<?php

	class User{

		 private $id_user;
		 private $lastname;
		 private $firstname;
		 private $mail;
		 private $password;
		 private $id_user_status;
		 private $db;

		public function __construct($db){
			
			$this->db = $db;
		}

		public function register($lastname,$firstname,$mail,$password,$checkPassword){

			$connexion_db = $this->db->connectDb();

		    $user_status = "normal";

		    $check_mail = $connexion_db->prepare("SELECT mail FROM users WHERE mail = '$mail' ");
	        $check_mail->execute();
	        $checked_mail = $check_mail->fetchAll(PDO::FETCH_ASSOC);

	        if(empty($checked_mail[0]))
	        {
	        	$get_user_status = $connexion_db->prepare("SELECT id_user_status FROM users_status WHERE name_user_status = '$user_status' ");
	        	$get_user_status->execute();
	        	$get_id_user_status = $get_user_status->fetchAll(PDO::FETCH_ASSOC);
	        	$id_user_status = intval($get_id_user_status); 

	        	// var_dump($id_user_status);

	          
	            $insert_new_user = "INSERT into users (lastname,firstname,mail,password,id_user_status) VALUES (:lastname,:firstname,:mail,:password,:id_user_status)";

	            $execution_insert = $connexion_db->prepare($insert_new_user);
	            $execution_insert->bindParam(':lastname',$lastname,PDO::PARAM_STR);
	            $execution_insert->bindParam(':firstname',$firstname,PDO::PARAM_STR);
	            $execution_insert->bindParam(':mail',$mail,PDO::PARAM_STR);
	            $execution_insert->bindParam(':password',$password,PDO::PARAM_STR);
	            $execution_insert->bindParam(':id_user_status',$id_user_status,PDO::PARAM_INT);
	            $execution_insert->execute();

	            $success = true;
			        
			    echo $success;


			}
			else{

				echo 'Ce mail exite déjà !';
			}

		
		}

		public function connect($mail, $password){

			$connexion_db = $this->db->connectDb();

			// var_dump($mail, $password);

			$user_account = $connexion_db->prepare("SELECT * FROM users WHERE mail = '$mail' ");
		    $user_account->execute();
		    $user = $user_account->fetch(PDO::FETCH_ASSOC);

		    if(!empty($user)){

		    	if(password_verify($password,$user['password'])){

			        $this->id_user = $user['id_user'];
			        $this->lastname = $user['lastname'];
			        $this->firstname = $user['firstname'];
			        $this->mail = $user['mail'];
			        $this->password = $user['password'];
			        $this->id_user_status = $user['id_user_status'];


			        $_SESSION['user'] = [
			        'id_user' => $this->id_user,
			        'lastname' => $this->lastname,
			        'firstname' => $this->firstname,
			        'mail' => $this->mail,
			        'password' => $this->password,
			        'id_user_status' => $this->id_user_status
			          
			        ];

			        $success = true;
			        
			        echo $success;
		        }
		      	else
		      	{
		        	echo "<span>Mot de passe incorrect</span>";
		      	}

			    }
			    else{
			    	echo "<span>Email incorrect<span>";
			    } 

		    


		}

		public function disconnect(){

			$this->id_user = "";
		    $this->lastname = "";
		    $this->firstname = "";
		    $this->mail = "";
		    $this->password = "";
		    $this->id_user_status="";
		    session_unset();
		    session_destroy();
		    header('Location:index.php');

		}

	}



?>