<?php 
    require_once "connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }

    $sql = "SELECT tag_name FROM POSSESS INNER JOIN TAG ON TAG.id = POSSESS.id_tag WHERE id_user = " . $_SESSION["id_user"];
    $result = $conn->query($sql);

    $json = "{";
    $i = 0;
    while($ligne = $result->fetch()) {
        $json .=  '"'.$i.'":'.'"'.$ligne['tag_name'].'",';
        $i++;
    }
    $json = substr($json, 0, -1);
    $json .= "}";
    
    echo $json;