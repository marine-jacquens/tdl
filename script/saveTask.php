<?php

	require '../class/config.php';

	//var_dump($_POST);

	if(!empty($_POST['title']) && !empty($_POST['description'])){

		$title = htmlspecialchars(strip_tags($_POST['title']));
		$description = htmlspecialchars(strip_tags($_POST['description']));

		$result = $task->register($title,$description);

		if($result > 0){
			echo 1; 

		} else{
			echo 0;
		}

	}
	else{
		echo "Veuillez remplir tous les champs";
	}

?>