<?php
    require_once "php/connect_db.php";
    session_start();
    if(!isset($_SESSION["id_user"])){
        header('Location: http://localhost/Freewin/login.php');
    }
    $sql = "SELECT id_tag FROM possess where id_user = " .$_SESSION["id_user"];
    $result = $conn->query($sql);
    $tableau = $result->fetchAll(PDO::FETCH_COLUMN);
   
?>

<?php
    include "./layout.php";
?>

<html>
<head>
  <title>Tags</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/layout.css">
  <script src="javascript/functions.js"></script>
</head>
<body>
    <h1 class="tag">Vos Tags</h1>
    <form action="php/php_tags.php" method="post">
    <div class="btn-group-toggle" data-toggle="buttons">
        <?php
            $sqlRequest = "SELECT id, tag_name FROM TAG";
            $table = $conn->query($sqlRequest);
            
            while ($ligne = $table->fetch()) {
                $tagId = $ligne['id'];
                $tagName = $ligne['tag_name'];
                $checked = "";
                $active = "";
                if(in_array($tagId, $tableau)){
                    $checked = "checked";
                    $active = "active";
                }
                echo '<label class="btn btn-tag '.$active.'">';
               
                echo '<input type="checkbox" '.$checked .' name="tag[]" onchange="getCheckedCount()" value="'.$tagId.'" autocomplete="off">'.$tagName;
                echo '</label>';    
            }

        ?>
    </div>
    <div class="center">       
        <input type="submit" class="btn button" id="check-tag" value="Mettre à jour les tags (au moins 3)" disabled>
    </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>