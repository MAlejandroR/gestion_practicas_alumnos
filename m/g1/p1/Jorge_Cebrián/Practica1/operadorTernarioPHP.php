<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h2>Operador Ternario en PHP</h2>";
$numRandom = rand(1, 1000);
echo "Vamos a comprobar si \$numRandom es par o impar<br />";
$comprobarNum = ($numRandom % 2 == 0) ? "El número es par" : "El número es impar";
echo "El número es: $numRandom, y por lo tanto: <br />"
 . "$comprobarNum";
header("Refresh:2;url=index.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </body>
</html>