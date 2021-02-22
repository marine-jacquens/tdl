$(document).ready(function(){

let connnectForm = $('#connectForm'),
    showSignUp = $('#showSignUp'), 
    subscribeForm = $('#subscribeForm'),
    resultatConnexion = $('#resultatConnexion');
    messageSub = $('#messageSub');

    //Passer du formulaire connexion au formulaire inscription sur la même page sans rabraichissement
    showSignUp.click(function(e){

        e.preventDefault();

        connnectForm.hide();
        subscribeForm.show();

    });

    //Soumission du formulaire connexion

    connnectForm.submit(function(e){

        e.preventDefault();

        messageSub.empty();

        let dataForm = $(this).serialize();
        // console.log(dataForm);

        $.ajax({

            url : "traitement/loginScript.php", 
            type : "POST",
            data : dataForm, 
            success : function(html){
            // console.log(html);

                if(html == true){

                    console.log(html);

                    $(location).attr('href','todolist.php');
                }
                else {

                    resultatConnexion.html(html);
                }

            },
            error : function(resultat,statut,erreur){
            console.log (resultat,statut,erreur);
            }

        });

    });

});
