<?php
/* 2.-Constantes en php

  Haz un ejercicio donde definas la constante edad
  A la constante Edad le asignas tu edad.
  Luego visualiza los años que tienes y los años que te quedan para cumplir 100 años
  Volver al index después de 2 segundos */

const EDAD = 29;

function imprimeEdad() {

    printf("Tengo %d años.<br />Me faltan %d años para los 100.", EDAD, 100 - EDAD);
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

        <H2><?php imprimeEdad() ?></H2>
        <?php header("refresh:2; url=index.php") ?>


    </body>
</html>