<?php 
   require_once "connect_db.php";
   session_start();
   if (!isset($_SESSION["id_user"])) {
       header('Location: http://localhost/Freewin/login.php');
       exit;
   }
if (isset($_POST['prize']) && is_numeric($_POST['prize'])) {
    $sql = "SELECT cash FROM user WHERE id = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_user', $_SESSION["id_user"]);
    $stmt->execute();
    $ligne = $stmt->fetch();
    
    $prize = $ligne['cash'];
    $prize += $_POST['prize'];

    $prize = number_format($prize, 2);
    
    $sql = "UPDATE user SET cash = :cash WHERE id = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cash', $prize);
    $stmt->bindParam(':id_user', $_SESSION["id_user"]);
    $stmt->execute();   
   echo $prize;
} else {
    echo "Le paramètre prize est invalide.";
    header('Location: http://localhost/Freewin/index');
    exit;
}