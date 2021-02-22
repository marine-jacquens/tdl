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

	public function register($lastname,$firstname, $mail, $password){

		$connexionDb = $this->db->connectDb(); 

		$check_mail = $connexionDb->prepare("SELECT mail FROM users WHERE mail = '$mail' ");
        $check_mail->execute();
        $checked_mail = $check_mail->fetchAll(PDO::FETCH_ASSOC);

        if(empty($checked_mail[0])){

        	$id_user_status = 2;

        	$insert_new_user = "INSERT into users (lastname,firstname,mail,password,id_user_status) VALUES (:lastname,:firstname,:mail,:passwordhash,:id_user_status)";
            $execution_insert = $connexionDb->prepare($insert_new_user);
            $execution_insert->bindParam(':lastname',$lastname,PDO::PARAM_STR);
            $execution_insert->bindParam(':firstname',$firstname,PDO::PARAM_STR);
            $execution_insert->bindParam(':mail',$mail,PDO::PARAM_STR);
            $execution_insert->bindParam(':passwordhash',$password,PDO::PARAM_STR);
            $execution_insert->bindParam(':id_user_status',$id_user_status,PDO::PARAM_INT);
            $execution_insert->execute();

            echo "success";

        }
        else{
        	echo "Ce mail existe déjà";
        }

	} 

	public function connect($mail,$password){

		$connexionDb = $this->db->connectDb(); 

		$user_account = $connexionDb->prepare("SELECT * FROM users WHERE mail = '$mail' ");
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

          		echo  $success;

	     	}
	     	else{
	     		
	     		echo "Mot de passe erroné";
	     	}

	    }
	    else{
	    	echo "Ce mail n'a pas encore été enregistré";
	    }

	}

	public function disconnect(){

		$this->id_user = "";
	    $this->lastname = "";
	    $this->firstname = "";
	    $this->mail = "";
	    $this->password = "";
	    $this->id_user_status = "";

	    session_unset();
	    session_destroy();
	    header('Location:index.php');
	}

	public function getContributors(){

		$connexionDb = $this->db->connectDb(); 

		$getUsers = $connexionDb->prepare("SELECT * FROM users");
		$getUsers->execute();
        $users = $getUsers->fetchAll(PDO::FETCH_ASSOC);

        var_dump($users);

	}
}

?>