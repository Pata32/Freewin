<?php
    require_once "php/connect_db.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <title>Page de connexion Freewin</title>
</head>
<body class="login-background">
    <div class="box">
        <h2>Freewin</h2>
        <form action="php/php_login.php" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Adresse email <span class="field-required">*</span></label>
                <input name="login" required type="text" class="form-control" id="login" placeholder="Entrez votre adresse email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe <span class="field-required">*</span></label>
                <input name="password" required type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
            </div>
            <div class="button-container d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>   
</body>
</html>