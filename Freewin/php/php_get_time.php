<?php 
    require_once "php/connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $sql = "SELECT roul_1, roul_2, roul_3 FROM user WHERE id = " . $_SESSION["id_user"];
    $result = $conn->query($sql);
    $ligne = $result->fetch();

    $date1 = new DateTime($ligne['roul_1']); // Utilise la date stockée en SQL
    $result = $date1->format('Y-m-d H:i:s');

    echo $result;
?>

