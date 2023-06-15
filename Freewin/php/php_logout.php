<?php 
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    session_destroy();
    header('Location: http://localhost/Freewin/login.php');