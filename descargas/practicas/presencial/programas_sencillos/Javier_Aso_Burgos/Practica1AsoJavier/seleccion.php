<?php
/*
  Usando la selección del tipo switch, haz un programa que genere una edad aleatoria entre 1 y 150 años y nos diga si somos niños (0-11) adolescentes (12-17) jóvenes (18-35) adultos (36-65) jubilados (66- ...)
  La edad que no esté en el intevalo 0-110 años se visualizará 'edad no contenplada en nuestra encuesta'
  Volver al index después de 2 segundos
 */

function edadRandom() {
    return rand(0, 150);
}

function encuesta($num) {

    switch (true) {

        case $num < 12: return "Tienes $num años eres niño.";
        case $num < 18: return "Tienes $num años eres adolescente.";
        case $num < 36: return "Tienes $num años eres joven.";
        case $num < 66: return "Tienes $num años eres adulto.";
        case $num < 111: return "Tienes $num años eres jubilado.";
        default : return "Tienes $num años esa edad no está contemplada en nuestra encuesta";
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

        <?= encuesta(edadRandom()) ?>
        <?php header("refresh:2; url=index.php") ?>


    </body>
</html>