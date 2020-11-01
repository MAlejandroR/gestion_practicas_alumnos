<?php
header("Refresh:2; url=index.php");
$edad = rand(0, 150);
switch (true) {
    case $edad >= 0 and $edad <= 11:
        $msj = "Eres un niño";
        break;
    case $edad <= 17:
        $msj = "Eres un adolescente";
        break;
    case $edad <= 35:
        $msj = "Eres un joven";
        break;
    case $edad <= 65:
        $msj = "Eres un adulto";
        break;
    case $edad <= 110:
        $msj = "Eres un jubilado";
        break;
    default:
        $msj = "Edad no contemplada en nuestra encuesta";
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
        <h1>Selección en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <?= "$msj <br/>Tu edad es $edad" ?>
        <br/><a href="seleccion.php">Probar con otra edad</a>
        <br/><a href="index.php">Volver</a>
    </body>
</html>



