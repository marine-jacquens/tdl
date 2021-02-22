<?php

	 class Task{
	 	private $id_task;
	 	private $title;
	 	private $description;
	 	private $date_created;
	 	private $date_completed;
	 	private $id_task_status;

	 	public function __construct($db){

			$this->db = $db;

		}

		public function register($title,$description){

			$connexionDb = $this->db->connectDb();

			date_default_timezone_set('Europe/Paris');
    		$date_created = date("Y-m-d H:i:s");
    		$id_task_status = 1;

			$insert_new_task = "INSERT into tasks (title,description,date_created,id_task_status) VALUES (:title,:description,:date_created,:id_task_status)";
            $execution_insert = $connexionDb->prepare($insert_new_task);
            $execution_insert->bindParam(':title',$title,PDO::PARAM_STR);
            $execution_insert->bindParam(':description',$description,PDO::PARAM_STR);
            $execution_insert->bindParam(':date_created',$date_created,PDO::PARAM_STR);
            $execution_insert->bindParam('id_task_status',$id_task_status,PDO::PARAM_INT);
            $execution_insert->execute();

            echo "success";

		}

		public function displayTask(){

			$connexionDb = $this->db->connectDb();

			$getNewTask = $connexionDb->prepare(" SELECT * FROM tasks WHERE id_task_status = 1 ORDER BY id_task DESC ");
        	$getNewTask ->execute();
        	$newTask = $getNewTask ->fetchAll(PDO::FETCH_ASSOC);

        	return $newTask;

		}

		public function displayAcomplishedTask(){

			$connexionDb = $this->db->connectDb();

			$getAccomplishedTask = $connexionDb->prepare(" SELECT * FROM tasks WHERE id_task_status = 2 ORDER BY date_completed DESC ");
        	$getAccomplishedTask ->execute();
        	$accomplishedTask = $getAccomplishedTask ->fetchAll(PDO::FETCH_ASSOC);

        	return $accomplishedTask ;

		}

		public function delete($id_task){

			$connexionDb = $this->db->connectDb();

			$deleteTask = $connexionDb->prepare("DELETE FROM tasks WHERE id_task = $id_task "); 
			$deleteTask->execute();

		}

		public function update($id_task){

			$connexionDb = $this->db->connectDb();

			date_default_timezone_set('Europe/Paris');
    		$date_completed = date("Y-m-d H:i:s");
			$id_task_status = 2;

			$updateTask = $connexionDb->prepare("UPDATE tasks SET date_completed = '$date_completed', id_task_status = $id_task_status WHERE id_task = $id_task "); 
			$updateTask->execute();

		}
	 }

?>