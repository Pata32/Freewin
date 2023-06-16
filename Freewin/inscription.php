<?php 
	require "php/php_inscription.php";
?>

<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<title>Freewin - S'inscrire</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="./css/SignUp.css">
<style>
</style>
<body>
	<div class="wrap">
		<form class="login-form" method="post">
			<div class="form-header">
				<h1>Freewin</h1>
			</div>
			<!--Name / Surname-->
			<div class="form-group">
				<label for="name">Prénom <span class="field-required">*</span></label>
				<input name="name" required type="text" class="form-input" placeholder="Entrez votre prénom">
				<span class="error"><?php echo $nameErr;?></span>
			</div>
			<div class="form-group">
				<label for="surname">Nom <span class="field-required">*</span></label>
				<input name="surname" required type="text" class="form-input" placeholder="Entrez votre nom">
				<span class="error"><?php echo $surnameErr;?></span>
			</div>
			<!--Email Input-->
			<div class="form-group">
				<label for="login">Email <span class="field-required">*</span></label>
				<input name="login" required type="text" class="form-input" placeholder="Entrez votre email">
				<span class="error"><?php echo $emailErr;?></span>
			</div>
			<!--Password Input-->
			<div class="form-group">
				<label for="first_password">Mot de passe <span class="field-required">*</span></label>
				<input name="first_password" required type="password" class="form-input" placeholder="Entrez votre mot de passe">
				<span class="error"><?php echo $fpErr;?></span>
			</div>
			<div class="form-group">
				<label for="second_password">Vérifier le mot de passe <span class="field-required">*</span></label>
				<input name="second_password" required type="password" class="form-input" placeholder="Confirmez votre Mot de passe">
				<span class="error"><?php echo $spErr;?></span>
			</div>
			<!--Login Button-->
			<div class="form-group">
				<button class="form-button" type="submit">Se connecter</button>
			</div>
			<div class="form-footer">
			Vous avez déjà un compte ? <a href="login">Se connecter</a>
			</div>
		</form>
	</div><!--/.wrap-->
</body>
</html>