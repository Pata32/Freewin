<?php
	require "php/connect_db.php";
	session_start();

	// Définir les variables vides
	$nameErr = $surnameErr = $emailErr = $fpErr = $spErr = ""; //messages d'erreur pour les champs qui ne respectent pas les règles
	$name = $surname = $email = $fp = $sp = ""; //Valeurs qui récupèrent les noms, noms de famille, email, et mot de passe
	$samepassword = "false";    // variable qui enregistre la comparaison des deux mots de passe

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
	
		if ( ! filter_var($_POST["login"], FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Veuillez rentrer un email valide";
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") { // condition lors d'une méthode poste
		$name = test_input($_POST["name"]);
		$surname = test_input($_POST["surname"]);
		$email = test_input($_POST["login"]);
		$fp = test_input($_POST["first_password"]);
		$sp = test_input($_POST["second_password"]);
		if ($_POST["first_password"] !== $_POST["second_password"]) {
			$samepassword = false;
		} else {
			$samepassword = true;
		}
	}
	
	function test_input($data) {    // enregistre les données
		$data = stripslashes($data); /*retire les / et \ d'une chaîne de caractère*/
		$data = htmlspecialchars($data); /*cette ligne permet de sécuriser l'ajout de balise html remplace les par &lt; et &gt;*/
		return $data;
	}
	
	$sql1 = "SELECT email FROM user WHERE email=:email";
	$stmt = $conn -> prepare($sql1);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$login_post = $_POST['login'];
		$stmt->bindParam(":email", $login_post);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (is_array($row)) {
			// Utilisez la variable comme un tableau
			if($login_post == $row['email']) {
				$emailErr = "Email déjà existant";
			} else {
				if ($name != "" && $surname != "" && $email != "" && $fp!="" && $sp !="" && $samepassword == true && $emailErr == "") {
					$date = new DateTime(); // Utilise la date stockée en SQL
					$date = $date->format('Y-m-d H:i:s');
					$sql = "INSERT INTO user (name, surname, email, password, cash,roul_1,roul_2,roul_3) VALUES (:name, :surname, :email, :fp, :cash,:roul1,:roul2,:roul3)";
					$stmt = $conn -> prepare($sql);
					$name = $_POST['name'];
					$cash = 0;
					$surname = $_POST['surname'];
					$password_post = md5($_POST['first_password']);
					// Liaison des paramètres à la requête préparée
					$stmt->bindParam(":name", $name);
					$stmt->bindParam(":surname", $surname);
					$stmt->bindParam(":email", $login_post);
					$stmt->bindParam(":fp", $password_post);
					$stmt->bindParam(":cash", $cash);
					$stmt->bindParam(":roul1", $date);
					$stmt->bindParam(":roul2", $date);
					$stmt->bindParam(":roul3", $date);
					if ($stmt->execute()) {
						header('Location: http://localhost/Freewin/login.php');
					}
				}
			}
		}
	}
?>