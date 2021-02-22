$(document).ready(function(){

	//
	let openConnexion = $('#openConnexion'),
		openSubscription = $('#openSubscription'),
		connexionForm = $('#connexionForm'),
		subscriptionForm = $('#subscriptionForm'),
		messageConnexion = $('#messageConnexion');

	//Afficher le formulaire de connexion
	$('#openConnexion').click(function openConnexionForm(e){

		event.preventDefault();
		connexionForm.css('display','flex');
		subscriptionForm.css('display','none');

	})

	//Afficher le formulaire d'inscription
	openSubscription.click(function(e){

		event.preventDefault();
		subscriptionForm.css('display','flex');
		connexionForm.css('display','none');

	})

	//VALIDATION DES FORMULAIRES COTE CLIENT

	//Récupération données input formulaire d'inscription
	let error = $('#error'),

		field = $('.field'),

		lastname = $("#lastname"),
		firstname = $('#firstname'), 
		mailSubscription = $('#mailSubscription'),
		passwordSubscription = $('#passwordSubscription'),
		checkPassword = $('#checkPassword'),

		civilityFields = $('.civilityFields'),
		civilitiesFieldsError = $('#civilitiesFieldsError'),

		mailfield = $('.mailfield'),
		mailError = $('#mailError'),

		passError = $('#passError'),
		
		checkPassError = $('#checkPassError'),
		pass = $('.pass'),

		subscriptionButton = $('#subscriptionButton');

	//Vérification des champs nom et prénom
	civilityFields.keyup(function(){
		
		if($(this).val().match(/^[A-Za-z]{1}[A-Z- a-z]{1,}$/)){

			$(this).css({
				borderColor : 'green', 
				color : 'green',
				backgroundColor : 'lightgreen'
			});

			civilitiesFieldsError.empty();

		}
		else{

			$(this).css({
				borderColor : 'red', 
				color : 'red',
				backgroundColor : 'pink'
			});

			civilitiesFieldsError.html("Les champs prénoms et noms doivent comporter au moins 2 caractères");
		}

	})

	//Vérification du champs mail
	mailfield.keyup(function(){
		
		if($(this).val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){

			$(this).css({
				borderColor : 'green', 
				color : 'green',
				backgroundColor : 'lightgreen'
			});

			mailError.empty();

		}
		else{

			$(this).css({
				borderColor : 'red', 
				color : 'red',
				backgroundColor : 'pink'
			});

			mailError.html("Le mail n'est pas conforme");
		}

	})

	//Vérification du champs mot de passe
	passwordSubscription.keyup(function(){

		if ($(this).val().match(/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/)){

			$(this).css({
				borderColor : 'green', 
				color : 'green', 
				backgroundColor : 'lightgreen'
			});

			passError.empty();

		}
		else{

			$(this).css({
				borderColor : 'red',
				color :'red', 
				backgroundColor : 'pink'
			});

			passError.html("Votre mot de passe doit contenir entre 8 et 15 caractères dont : une majuscule, une minuscule, un chiffre et un caractère spécial($@%*+-_!) ");
			
		}
	})

	// Vérification correspondance mot de passe et confirmation mot de passe
	pass.keyup(function(){

		if(checkPassword.val() == passwordSubscription.val()){

			checkPassword.css({
				borderColor : 'green', 
				color : 'green', 
				backgroundColor : 'lightgreen'
			});

			checkPassError.empty();

		}
		else{

			checkPassword.css({
				borderColor : 'red',
				color :'red', 
				backgroundColor : 'pink'
			});

			checkPassError.html('Les champs mot de passe et confirmation de mot de passe doivent être identiques');

		}

	})


	//Validation de l'envoi des données ou message d'erreur 
	function check(lastname,firstname,mailSubscription,passwordSubscription,checkPassword){

		if(lastname.css('backgroundColor') != 'rgb(144, 238, 144)' && firstname.css('backgroundColor') != 'rgb(144, 238, 144)' && mailSubscription.css('backgroundColor') != 'rgb(144, 238, 144)' && passwordSubscription.css('backgroundColor') != 'rgb(144, 238, 144)' && checkPassword.css('backgroundColor') != 'rgb(144, 238, 144)'){

			error.html('Veuillez remplir correctement tous les champs');
		}
		else{

			let dataForm = subscriptionForm.serialize();

			$.ajax({

				url : "script/subscriptionScript.php", 
				type : "POST", 
				data : dataForm, 
				success : function(html){

					if(html != "success"){
						error.html(html);
					}
					else{
						console.log(html);
						subscriptionForm.css('display','none');
						connexionForm.css('display','flex');
						messageConnexion.html('Inscription réussie !');
						error.empty();
						
					}
					
				}, 
				error : function(resultat,statut,erreur){

					console.log(resultat,statut,erreur);

				}
			})
		}

	}

	//Lancement de la vérification de tous les champs après validation du formulaire
	subscriptionButton.click(function(e){

		e.preventDefault();

		check(lastname,firstname,mailSubscription,passwordSubscription,checkPassword);

	})






	


		







	

})