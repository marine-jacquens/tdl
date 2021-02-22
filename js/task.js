$(document).ready(function(){

	// Show Tasks
			function loadTasks(){

				$.ajax({
					url:"script/displayTask.php", 
					type:"POST", 
					success: function(data){
						$("#tasks").html(data);
					}
				});

			};

	// Show Accomplished Tasks
	function loadAccomplishedTasks(){

		$.ajax({
			url:"script/displayAccomplishedTask.php", 
			type:"POST", 
			success: function(data){
				$("#accomplishedTasks").html(data);
			}
		});

	};

	//Add Task
			$('#saveTaskButton').click(function(e){

				e.preventDefault();

				let title = encodeURIComponent($('#title').val() ),
				description = encodeURIComponent($('#description').val() );

				$.ajax({
					url:"script/saveTask.php", 
					type:"POST",
					data : "title=" + title + "&description=" + description ,
					success : function(data){
						loadTasks() 
						$('#title').val('');
						$('#description').val('');
						if(data == 0){

							alert("Ca n'a pas fonctionné. Essayez encore.");

						}

					}
				});

			});

			//Remove Task
			$(document).on('click','#removeBtn',function(e){

				e.preventDefault();
				var id = $(this).data('id');
				
				$.ajax({
					url:"script/removeTask.php", 
					type:"POST", 
					data:"id=" + id,
					success : function(data){
						loadTasks();
						loadAccomplishedTasks();
						if(data == 1){
							alert("Ca n'a pas fonctionné. Essayez encore.");

						}

					}
				});


			});

	//Update Task status
	$(document).on('click','#accomplishedBtn',function(e){

		e.preventDefault();
		var id = $(this).data('id');

				console.log(id);
				
				$.ajax({
					url:"script/updateTask.php", 
					type:"POST", 
					data:"id=" + id,
					success : function(data){
						loadTasks();
						loadAccomplishedTasks();
						if(data == 1){
							alert("Ca n'a pas fonctionné. Essayez encore.");

						}

					}
				});


	});

	
	

	// 				$('#tasks').prepend("<div class='card'><div><h2>" + $('#title').val() + "</h2><p>" + $('#description').val() + "<br/> créee le : "+ dateHours +"</p></div></div>");
					
	// 			}
				
	// 		});

	

	
})



