$(document).ready(function(){

	//Récupération données input formulaire de connexion
	let connexionForm = $('#connexionForm');
		

	//Vérification correspondance BDD mdp et login
	connexionForm.submit(function(e){

		e.preventDefault();

		let dataForm = $(this).serialize();
		//console.log(dataForm);

			$.ajax({

				url : "script/loginScript.php", 
				type : "POST",
				data : dataForm,
				success : function(html){
				

				if(html == true){
					
					$(location).attr('href','todolist.php');
				}
				else{
					messageConnexion.html(html);
				}
					
				}, 
				error : function(resultat,statut,erreur){

					console.log(resultat,statut,erreur);

				}

			});

	})

})
	