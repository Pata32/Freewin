<?php
    require_once "php/connect_db.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script src='librairy/Winwheel.js'></script>

    <title>Accueil - Freewin</title>
</head>
<body>
  <canvas id='myCanvas' width='880' height='300'>
    Canvas not supported, use another browser.
  </canvas>
  <script>
      let theWheel = new Winwheel({
        'canvasId'    : 'myCanvas',
        'numSegments' :  10,
        'fillStyle'   : '#e7706f',
        'lineWidth'   : 3
    });
    startSpin();
  </script>
</body>
</html>



   