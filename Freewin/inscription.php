<?php 
require "./php/connect_db.php";

// Définir les variables vides
$nameErr = $surnameErr = $emailErr = $fpErr = $spErr = ""; //messages d'erreur pour les champs qui ne respectent pas les règles
$name = $surname = $email = $fp = $sp = ""; //Valeurs qui récupèrent les noms, noms de famille, email, et mot de passe
$samepassword = "false";    // variable qui enregistre la comparaison des deux mots de passe
$rightpassword = "false";   // variable qui suit la norme des deux mots de passe

if ($_SERVER["REQUEST_METHOD"] == "POST") { // condition lors d'une méthode poste
    $name = test_input($_POST["name"]);
    $surname = test_input($_POST["surname"]);
    $email = test_input($_POST["login"]);
    $fp = test_input($_POST["first_password"]);
    $sp = test_input($_POST["second_password"]);
}

function test_input($data) {    // enregistre les données
    $data = stripslashes($data); /*retire les / et \ d'une chaîne de caractère*/
    $data = htmlspecialchars($data); /*cette ligne permet de sécuriser l'ajout de balise html remplace les <> par &lt; et &gt;*/
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //chaîne de conditions pour les champs
    if (empty($_POST["name"])) {
        $nameErr = "Veuillez remplir ce champ";
    } else {
        $name = test_input($_POST["name"]);
        $nameErr = "";
    }

    if (empty($_POST["surname"])) {
        $surnameErr = "Veuillez remplir ce champ";
    } else {
        $surname = test_input($_POST["surname"]);
        $surnameErr = "";
    }

    if (empty($_POST["login"])) {
        $emailErr = "Veuillez mettre un email valide";
    } else {
        $email = test_input($_POST["login"]);
        $emailErr = "";
    }

    if (empty($_POST["first_password"])) {
        $fpErr = "Veuillez remplir ce champ";
    } else {
        $fp = test_input($_POST["first_password"]);
        $fpErr = "";
    }

    if (empty($_POST["second_password"])) {
        $spErr = "Veuillez remplir ce champ";
    } else {
        $sp = test_input($_POST["second_password"]);
        $spErr = "";
    }

    if ($_POST["first_password"] !== $_POST["second_password"]) {
        $spErr = "Les mots de passe ne sont pas identiques";
        $samepassword = false;
    } else {
        $samepassword = true;
    }

    // if ( ! preg_match ("/[a-z]/i", $_POST["first_password"])) {
    //     $fpErr ="Le mot de passe doit contenir au moins une lettre";
    // } else {
    //     if ( ! preg_match ("/[0-9]/", $_POST["first_password"])) {
    //         $fpErr ="Le mot de passe doit contenir au mois un chiffre";
    //     } else {
    //         if (strlen($_POST["first_password"]) < 8) {
    //             $fpErr ="Le mot de passe doit au moins faire 8 caractères";
    //         } else {
    //             $rightpassword = true;
    //         }
    //     }
    // }

    $sql1 = "SELECT email FROM user WHERE email=:email";
    // Récupération des résultats
    $stmt = $conn -> prepare($sql1);
    $login_post = $_POST['login'];
    $stmt->bindParam(":email", $login_post);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (is_array($row)) {
        // Utilisez la variable comme un tableau
        if($login_post == $row['email']) {
            $emailErr = "Email déjà existant";
        }
    }

    if ( ! filter_var($_POST["login"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Veuillez rentrer un email valide";
    } else {

        if ($name != "" && $surname != "" && $email != "" && $fp!="" && $sp !="" && $samepassword == true && $rightpassword == true) {
            $sql = "INSERT INTO user (name, surname, email, password) VALUES (:name, :surname, :email, :fp)";
            $stmt = $conn -> prepare($sql);
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password_post = md5($_POST['first_password']);
            // Liaison des paramètres à la requête préparée
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":surname", $surname);
            $stmt->bindParam(":email", $login_post);
            $stmt->bindParam(":fp", $password_post);
            if ($stmt->execute()) {
                echo "Signup successful";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<title>Freewin - S'inscrire</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="./SignUp.css">
<style>
</style>
<body>
	<div class="wrap">
		<form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
			Vous avez déjà un compte ? <a href="#">Se connecter</a>
			</div>
		</form>
	</div><!--/.wrap-->
</body>
</html>