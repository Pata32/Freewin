<?php 
    require_once "connect_db.php";
    
if((isset($_POST['login']) && isset($_POST['password'])) && (($_POST['login'] != "") && ($_POST['password'] != ""))){
    $query = "SELECT id,email,password FROM user WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($query);
    
    // Récupération des entrées utilisateur
    $login_post = $_POST['login'];
    $password_post = md5($_POST['password']);
    
    // Liaison des paramètres à la requête préparée
    $stmt->bindParam(":email", $login_post);
    $stmt->bindParam(":password", $password_post);
    
    // Exécution de la requête
    $stmt->execute();
    
    // Récupération des résultats
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(($login_post == $row['email']) && ($password_post == $row['password'])){
        session_start();
        $_SESSION["id_user"] = $row['id'];
        header('Location: http://localhost/Freewin');
    }else{
        header('Location: http://localhost/Freewin/login.php');
    }
}else{
    header('Location: http://localhost/Freewin/login.php');
}