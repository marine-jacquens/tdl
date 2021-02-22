<?php 

	require '../class/config.php';

	if(!empty($_POST['id'])){

		$id_task = intval($_POST['id']); 

		$result = $task->update($id_task);

		if($result){
			echo 1; 

		} else{
			echo 0;
		}

	}

	

?>