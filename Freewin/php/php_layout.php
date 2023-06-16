<?php 
    require_once "php/connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $sql = "SELECT cash,name,surname FROM user WHERE id = " . $_SESSION["id_user"];
    $result = $conn->query($sql);
    $ligne = $result->fetch();
?>