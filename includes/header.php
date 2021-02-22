<nav class="navbar">

	<?php 
 
		if(isset($_SESSION['user']['mail'])){ 

			if(isset($_POST['submitDeconnexion'])){
				$user->disconnect();
			}

	?>

		<a href="index.php" class="logo">To do list</a>
			
		<form action="#" method="POST">
			<button type="submit" name="submitDeconnexion">
				<i class="fal fa-sign-out-alt"></i>
			</button>
		</form>
			

			
  <?php }
		else
		{?>

			<a href="index.php" class="logo">To do list</a>
			<a href="#" id="openSubscription">Inscription</a>
			<a href="#" id="openConnexion">Connexion</a>

  <?php }

	?>
	
	
</nav>


