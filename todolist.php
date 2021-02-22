<?php 
ob_start();
require'class/config.php';
if(isset($_SESSION['user']['id_user'])){}else{header('location:index.php');}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Page To do list</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="index.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<header><?php include('includes/header.php')?></header>

	<main>

		<?php 

			if(isset($_SESSION['user']['mail'])){

				echo "Salut ".$_SESSION['user']['firstname'];

			}
			else{
				header('location:index.php');
			}
			
		?>

		<section>

			<h1>Ajout de tâches</h1>

			<form action="#" method="POST" class="addTaskForm" id="saveTask">

				<div id="alert"></div>
				<label for="title">Titre</label>
				<input type="text" name="title" id="title">

				<label for="title">Description</label>
				<textarea name="title" id="description"></textarea>

				<input type="submit" name="saveTask" value="ENREGISTRER" id="saveTaskButton">

			</form>
			
		</section>
		<section class="taskList">

			<div class="todolist">
				<h1>Liste de tâche(s) à faire</h1>	
				<div id="tasks">
					<?php 
						$displaySavedTasks = $task->displayTask();
						if(!empty($displaySavedTasks)){
							foreach($displaySavedTasks AS $tasks){
					?>

					<div class="card">
						<div>
							<h2><?php echo $tasks['title']?></h2>
							<p><?php echo $tasks['description'].'<br/> créée le : '.$tasks['date_created']?></p>
							<button type="submit" id="accomplishedBtn"  data-id="<?php echo $tasks['id_task']; ?>">Terminé</button>
						</div>
						<div>
							<i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $tasks['id_task']; ?>"></i>
						</div>
					</div>
				<?php 		}
						}else{

							echo "<div>Pas de tâches en cours</div>";

						} ?>
				</div>
			</div>

			<div class="accomplished">
				<h1>Liste de tâche(s) accomplis</h1>
				<div id="accomplishedTasks">
					<?php
						$displayAccomplishedTasks = $task->displayAcomplishedTask();
						if(!empty($displayAccomplishedTasks)){foreach($displayAccomplishedTasks AS $accomplishedTasks){

					?>

					<div class="card">
						<div>
							<h2><?php echo $accomplishedTasks['title']?></h2>
							<p><?php echo $accomplishedTasks['description'].'<br/> terminée le : '.$accomplishedTasks['date_completed']?></p>
						</div>
						<div>
							<i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $accomplishedTasks['id_task']; ?>"></i>
						</div>
					</div>
				<?php }} ?>
					
				</div>
			</div>

		</section>
	</main>

	<footer><?php include('includes/footer.php')?></footer>

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/task.js"></script>
</body>
</html>
<?php ob_end_flush();?>