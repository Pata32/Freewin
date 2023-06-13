<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Freewin</title>
</head>
<body>
    <form action="php/php_inscription.php" method="post" class="form-example">
        <input type="text" name="name" placeholder="Prénom">
        <input type="text" name="surname" placeholder="Nom"><br>
        <input type="text" name="login" placeholder="Email"><br>
        <input type="password" name="first_password" placeholder="Mot de passe"><br>
        <input type="password" name="second_password" placeholder="Confirmez votre mot de passe"><br>
        <br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>