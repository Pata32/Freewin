<?php
    require_once "connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $date = new DateTime('now'); // Crée un nouvel objet DateTime avec l'heure actuelle
    $date->add(new DateInterval('P1D'));
    $date = $date->format('Y-m-d H:i:s'); 
   
    $sql = "UPDATE USER SET " . $_REQUEST['roul'] . " = '" . $date . "' WHERE id = " . $_SESSION["id_user"];
    $table = $conn->prepare($sql);
    $table->execute();

    echo "true";