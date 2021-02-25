<form action="index.php" method="POST" id="subscriptionForm" class="subscriptionForm">

	<h1 class="titleIndex">Inscription</h1>

	<div id="error"></div>

	<div id="civilitiesFieldsError"></div>
	<label for="lastname">Nom</label>
	<input type="text" name="lastname" class="field civilityFields input" id="lastname">
	<label for="firstname">Prénom</label>
	<input type="text" name="firstname" class="field civilityFields input" id="firstname">

	<div id="mailError"></div>
	<label for="mail">Mail</label>
	<input type="mail" name="mail" class="field mailfield input" id="mailSubscription">

	<div id="passError"></div>
	<label for="password">Mot de passe</label>
	<input type="password" name="password" class="field pass input" id="passwordSubscription">

	<div id="checkPassError"></div>
	<label for="checkPassword">Confirmation de mot de passe</label>
	<input type="password" name="checkPassword" class="field pass input" id="checkPassword">
	
	<input type="submit" name="subscription" value="ENREGISTREMENT" id="subscriptionButton" class="button">

</form>