<?php
    require_once "php/connect_db.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion Freewin</title>
</head>
<body>
    <form action="php/php_login.php" method="post" class="form-example">
        <input type="text" name="login" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>