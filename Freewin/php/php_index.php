<?php
    require_once "php/connect_db.php";  

    $sql = "SELECT id_tag FROM possess WHERE id_user = " . $_SESSION["id_user"];
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    $rowCount = count($rows);

    if($rowCount == 0){
        header('Location: http://localhost/Freewin/tags.php');
    }
    
    if (!isset($_SESSION["id_user"])) {
        header('Location: http://localhost/Freewin/login.php');
    }
?>