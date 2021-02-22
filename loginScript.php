<?php 

    require '../class/config.php';

    // var_dump($_POST['mail'], $_POST['password']);

    if(!empty($_POST['mail']) && !empty($_POST['password'])){

      // var_dump($_POST['mail'], $_POST['password']);

      $data = $user->connect($_POST['mail'],$_POST['password']);

      echo ($data);

    }
    else{

      echo "<span>Veuillez remplir tous les champs<span>";

    }


?>