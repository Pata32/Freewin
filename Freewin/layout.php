<?php 
    require_once "php/connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $sql = "SELECT cash FROM user WHERE id = " . $_SESSION["id_user"];
    $result = $conn->query($sql);
    $ligne = $result->fetch();

?>

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout.css">
<script src="./librairy/layout.js"></script>
<div class="topnav" id="Topnavbar">
    <img src="./images/Freewin.png" alt="logo" class="logo">
    <a href="#about">Se déconnecter</a>
    <a href=""><?php echo $ligne['cash']?>€</a>
    <a href="tags">TAGS</a>
    <a href="index" class="active">ACCUEIL</a>
    <a href="javascript:void(0);" class="icon" onclick="menu()">
        <i class="fa fa-bars"></i>
  </a>
</div>