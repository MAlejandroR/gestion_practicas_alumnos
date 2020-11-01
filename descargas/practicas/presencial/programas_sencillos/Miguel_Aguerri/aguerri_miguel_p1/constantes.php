<?php
header('Refresh: 5; URL=index.php');
define("edad", 21);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            *{
               text-align: center; 
            } 
        </style>
    </head>
    <body>
        <h1>Constantes en php:</h1>
        <hr />
        <?php 
        echo "Tengo ".edad." años<br/>";
        echo "Me quedan ".(100-edad)." años para llegar a 100";
        ?>
    </body>
</html>

