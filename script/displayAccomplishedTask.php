<?php

	require '../class/config.php';

	$data = $task->displayAcomplishedTask();

	if(!empty($data)){

		foreach($data as $tasks){ ?>

			<div class="card">
				<div>
					<h2><?php echo $tasks['title']?></h2>
					<p><?php echo $tasks['description'].'<br/><br/> terminée le : '.$tasks['date_completed']?></p>
				</div>
				<div>
					<i id="removeBtn" class="fal fa-times-square" data-id="<?php echo $tasks['id_task']; ?>"></i>
				</div>
			</div>

		<?php }

	}else{
		echo "<div>Pas de tâches enregistrées</div>";
	}
	
	


	

?>