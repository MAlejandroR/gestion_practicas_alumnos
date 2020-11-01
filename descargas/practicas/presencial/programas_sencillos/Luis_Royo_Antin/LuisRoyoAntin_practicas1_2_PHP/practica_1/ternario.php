<?php
header("Refresh:2; url=index.php");
$numeroAleatorio = rand(1, 1000);
$msj = ($numeroAleatorio % 2 == 0) ? "par" : "impar";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Operador Ternario en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <?= "El número $numeroAleatorio es <b>$msj</b>" ?>
        <a href="ternario.php">Probar con otro número</a>
        <br/><br/><a href="index.php">Volver</a>
    </body>
</html>
