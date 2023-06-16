<?php 
    include "layout.php";
    require_once "php/connect_db.php";

    if( !isset($_SESSION["id_user"]) ) {
        header('Location: http://localhost/Freewin/login.php');
    }
    
    $sql = "SELECT id_tag FROM possess where id_user = " .$_SESSION["id_user"];
    $result = $conn->query($sql);
    $tableau = $result->fetchAll(PDO::FETCH_COLUMN);
?>