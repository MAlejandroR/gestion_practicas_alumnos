<?php
header("Refresh:2; url=index.php");
$contador = 0;
$numero = 0;
$par = 0;
do {
    $numero++;
    if ($numero % 2 == 0) {
        $contador++;
        $par = $par + $numero;
    }
} while ($contador < 100);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Iteraciones en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <?= "El resultado de la suma de los cien primeros números pares es <b>$par</b>" ?>
        <br/><br/><a href="index.php">Volver</a>
    </body>
</html>


