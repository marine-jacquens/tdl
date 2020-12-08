<?php
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<title>To do list - Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=image">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="fontawesome/all.css">
    <link rel="stylesheet" href="todolist.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php include("includes/header.php") ?>
    </header>
    <main class="main_index">

        <?php if(isset($_POST['connexion'])){$user->connect($_POST['mail'],$_POST['password']);} ?>

        <form action="todolist.php" method="POST" class="form" id="connectForm">

            <h2>Connexion</h2>

            <div class="input_part">
                <label for="mail">Email</label>
                <input type="email" name="mail" placeholder="marine.jacquens@gmail.com" class="input" id="mail">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="input">

                <input type="submit" name="connexion" value="VALIDER"class="input submit">

                <a href="" id="showSignUp"> Vous n'avez pas encore de compte ? </a>
            </div>
            

        </form>

        <?php 

        if(isset($_POST['subscribe'])){$user->register($_POST['surname'],$_POST['firstname'],$_POST['mail'],$_POST['password'],$_POST['check_password']);} 

        ?>

        <form action="" method="POST" class="form" id="subscribeForm">

            <h2>Inscription</h2>

            <div class="input_part">

                <label for="surname">Nom</label>
                <input type="text" name="surname" placeholder="jacquens" class="input" required>

                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" placeholder="marine" class="input" required>

                <label for="mail">Email</label>
                <input type="email" name="mail" placeholder="marine.jacquens@gmail.com" class="input" id="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="input" required>

                <label for="check_password">Confirmation de mot de passe</label>
                <input type="password" name="check_password" class="input" required>

                <input type="submit" name="subscribe" value="VALIDER" class="input submit" id="subscribe">

                <a href="" id="showSignIn">Déjà inscrit ?</a>
                
            </div>

        </form>
    </main>
    <footer>
        <?php include('includes/footer.php') ?>
    </footer>
    <script type="text/javascript" src="js/sign_in_sign_up.js"></script>
</body>
</html>
<?php ob_end_flush();?>