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
<html lang="en">
<meta charset="UTF-8">
<title>Freewin - S'inscrire</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="icon" href="./logo.jpg">
<link rel="stylesheet" href="./grid.css">
<link rel="stylesheet" href="./SignUp.css">
<style>
</style>
<body>
	<div class="wrapper">
		<div class="logo1">
			<img src=""></img>
		</div>
		<div class="logo2">
			<img src=""></img>
		</div>
		<div class="one">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h1>Free Win - S'inscrire</h1>
			<div class="form">
				<label for="">Prénom *</label>
				<input type="text" name="name" placeholder="Prénom *" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"> 
				<span class="error"><?php echo $nameErr;?></span>
			</div>
			<div class="form">
				<label for="">Nom *</label>
				<input type="text" name="surname" placeholder="Nom" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>">
				<span class="error"><?php echo $surnameErr;?></span>
			</div>
			<div class="form">
				<label for="">Email *</label>
				<input type="text" name="login" placeholder="Email" value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
				<span class="error"><?php echo $emailErr;?></span>
			</div>
			<div class="form">
				<label for="">Mot de passe *</label>
				<input type="password" name="first_password" placeholder="Mot de passe">
				<span class="error"><?php echo $fpErr;?></span>
			</div>
			<div class="form">
				<label for="">Confirmez mot de passe *</label>
				<input type="password" name="second_password" placeholder="Confirmez votre mot de passe">
				<span class="error"><?php echo $spErr;?></span>
			</div>
			<div class="field">
					<input type="submit" name="submit" value="Submit">
            </div>
			<div class="botbar">
            </div>
		</form>
		</div>
	</div>
</body>
</html>