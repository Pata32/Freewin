<?php
    require_once "php/connect_db.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Freewin - Page de connexion</title>
        <link rel="stylesheet" href="./login.css">
    </head>
    <body>
        <div class="wrap">
            <form class="login-form" action="php/php_login.php" method="POST">
                <div class="form-header">
                    <h1>Freewin</h1>
                </div>
                <!--Email Input-->
                <div class="form-group">
                    <label for="login">Email <span class="field-required">*</span></label>
                    <input name="login" type="text" required class="form-input" placeholder="Veuillez rentrer votre email">
                </div>
                <!--Password Input-->
                <div class="form-group">
                    <label for="password">Mot de passe <span class="field-required">*</span></label>
                    <input name="password" type="password" required class="form-input" placeholder="Mot de passe">
                </div>
                <!--Login Button-->
                <div class="form-group">
                    <button class="form-button" type="submit">Se connecter</button>
                </div>
                <div class="form-footer">
                Vous n'avez pas de compte ? <a href="inscription">S'inscrire</a>
                </div>
            </form>
        </div><!--/.wrap-->
    </body>
    </html>