<?php 
    require_once "connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $sqlDelete = "DELETE FROM possess WHERE id_user = " . $_SESSION["id_user"];
    $conn->exec($sqlDelete);
    $id_tag = $_POST['tag'];
    $sql = "INSERT INTO possess VALUES ";
    foreach ($id_tag as $id){ 
        $sql .= "(".$id.",".$_SESSION["id_user"]."),";
    }
    $sql  = substr($sql, 0, -1);
    $rowCount = $conn->exec($sql);
    echo $rowCount . " record inserted successfully.";
    header('Location: http://localhost/Freewin/tags');
?>