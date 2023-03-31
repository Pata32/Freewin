<?php 
    require_once "connect_db.php";

if((isset($_POST['login']) && isset($_POST['password'])) && (($_POST['login'] != "") && ($_POST['password'] != ""))){
    $query = "SELECT email,password FROM user WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($query);
    
    // Récupération des entrées utilisateur
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    // Liaison des paramètres à la requête préparée
    $stmt->bindParam(":email", $login);
    $stmt->bindParam(":password", $password);
    
    // Exécution de la requête
    $stmt->execute();
    
    // Récupération des résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Itération sur les résultats pour récupérer l'email
    foreach ($results as $row) {
        $email = $row['email'];
        echo $email;
    }
}
else{
    echo "Les champs de formulaire n'ont pas été soumis.";
}