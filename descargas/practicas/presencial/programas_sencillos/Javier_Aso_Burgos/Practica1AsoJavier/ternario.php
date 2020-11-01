<?php
/* 5.-Operador Ternario en php

  Usando el operador ternario obtén un número aleatorio de 1 a 1000 y visualiza con un texto si el número es par o impar .
  Volver al index después de 2 segundos
 */

function numRandom() {
    return rand(1, 1000);
}

function parImpar($num) {

    return ($num % 2 == 0) ? "El número $num es par" : "El número $num es impar";
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?= parImpar(numRandom()) ?>
        <?php header("refresh:2; url=index.php") ?>

    </body>
</html>