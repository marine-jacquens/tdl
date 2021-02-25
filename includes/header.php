<nav class="navbar">

	<?php 
 
		if(isset($_SESSION['user']['mail'])){ 

			if(isset($_POST['submitDeconnexion'])){
				$user->disconnect();
			}

	?>

		<a href="todolist.php" class="logo">To do list</a>

		<?php echo "<div class='helloMessage'> Salut ".$_SESSION['user']['firstname'].' <i class="fal fa-smile-wink"></i> </div>'; ?>
			
		<form action="#" method="POST">
			<button type="submit" name="submitDeconnexion" class="logOutButton">
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


