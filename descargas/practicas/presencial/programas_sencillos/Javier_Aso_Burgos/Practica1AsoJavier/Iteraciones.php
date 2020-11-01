<?php
/* 6.-Iteraciones en php

  Suma los 100 primeros números pares
  Volver al index después de 2 segundos
 */

function sumaPares() {
    $suma = 0;
    for ($i = 2, $j = 0; $j < 100; $i += 2, $j++) {

        $suma += $i;
    }
    return "La suma de los 100 primeros números pares es: $suma";
}
?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?= sumaPares() ?>
        <?php header("refresh:2; url=index.php") ?>

    </body>
</html>