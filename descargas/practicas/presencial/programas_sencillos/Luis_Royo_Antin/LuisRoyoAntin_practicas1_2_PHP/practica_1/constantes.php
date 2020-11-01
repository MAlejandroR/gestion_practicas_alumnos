<?php
header("Refresh:2; url=index.php");
define("EDAD", strtotime("12/28/1987"));
define("ANIOS", calculaAnios());

function calculaAnios() {
    $diferencia = date("Y", time()) - date("Y", EDAD);
    $diferencia1 = $diferencia - 1;
    if ((date("m", time())) >= (date("m", EDAD))) {
        return $diferencia;
    } else {
        return $diferencia1;
    }
}

function diferencia100() {
    return 100 - ANIOS;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Constantes en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        
        <?= "Tu edad es " . ANIOS . "<br/> Te quedan " . diferencia100() . " años para cumplir cien años" ?>
        <br/><br/><a href="index.php">Volver</a>
    </body>
</html>

