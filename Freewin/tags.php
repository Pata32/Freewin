<?php
    require "php/php_tags.php";
?>

<html>
<head>
    <title>Tags</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/css.css">
    <script src="javascript/functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <h1 class="tag">Vos Tags</h1>

    <form action="php/php_tags.php" method="post">
        <div class="btn-group-toggle" data-toggle="buttons">
            <?php
                $sqlRequest = "SELECT id, tag_name,icon FROM TAG";
                $table = $conn->query($sqlRequest);
                
                while ($ligne = $table->fetch()) {
                    $tagId = $ligne['id'];
                    $tagName = $ligne['tag_name'];
                    $icon = $ligne['icon'];
                    $checked = "";
                    $active = "";
                    if(in_array($tagId, $tableau)){
                        $checked = "checked";
                        $active = "active";
                    }
                    echo '<label class="btn btn-tag '.$active.'">';
                
                    echo '<input type="checkbox" '.$checked .' name="tag[]" onchange="getCheckedCount()" value="'.$tagId.'" autocomplete="off">'.$icon.' '.$tagName;
                    echo '</label>';    
                }
            ?>
        </div>

        <div class="center">       
            <input type="submit" class="btn button" id="check-tag" value="Mettre à jour les tags (au moins 3)" disabled>
        </div>

    </form>
</body>
</html>