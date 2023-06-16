<?php
    require "php/php_layout.php";
?>

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout.css">
<script src="./librairy/layout.js"></script>
<div class="topnav" id="Topnavbar">
    <img src="./images/Freewin.png" alt="logo" class="logo">
    <a href="php/php_logout">Se déconnecter</a>
    <a href=""><?php echo $ligne['cash']?>€</a>
    <a href=""><?php echo $ligne['name']." ". $ligne['surname'] ?></a>
    <a href="tags">TAGS</a>   
    <a href="index" class="active">ACCUEIL</a>
    <a href="javascript:void(0);" class="icon" onclick="menu()">
        <i class="fa fa-bars"></i>
  </a>
</div>