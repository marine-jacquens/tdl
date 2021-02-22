<form action="index.php" method="POST" id="subscriptionForm" class="subscriptionForm">

	<div id="error"></div>

	<div id="civilitiesFieldsError"></div>
	<label for="lastname">Nom</label>
	<input type="text" name="lastname" class="field civilityFields" id="lastname">
	<label for="firstname">Prénom</label>
	<input type="text" name="firstname" class="field civilityFields" id="firstname">

	<div id="mailError"></div>
	<label for="mail">Mail</label>
	<input type="mail" name="mail" class="field mailfield" id="mailSubscription">

	<div id="passError"></div>
	<label for="password">Mot de passe</label>
	<input type="password" name="password" class="field pass" id="passwordSubscription">

	<div id="checkPassError"></div>
	<label for="checkPassword">Confirmation de mot de passe</label>
	<input type="password" name="checkPassword" class="field pass" id="checkPassword">
	
	<input type="submit" name="subscription" value="ENREGISTREMENT" id="subscriptionButton">

</form>