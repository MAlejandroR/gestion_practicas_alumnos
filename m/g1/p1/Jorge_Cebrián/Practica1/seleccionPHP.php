<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h2>Selección en PHP</h2>";
$edadRandom = rand(0, 150);
echo "La edad escogida aleatoriamente es: $edadRandom<br />";
echo "Y el resultado de la encuesta es: <br />";
switch ($edadRandom) {
    case $edadRandom >= 0 && $edadRandom <= 11:
        echo "(0-11). Eres niño";
        break;
    case $edadRandom >= 12 && $edadRandom <= 17:
        echo "(12-17). Eres adolescente";
        break;
    case $edadRandom >= 18 && $edadRandom <= 35:
        echo "(18-35). Eres joven";
        break;
    case $edadRandom >= 36 && $edadRandom <= 65:
        echo "(36-65). Eres adulto";
        break;
    case $edadRandom >= 66 && $edadRandom <= 110:
        echo "(66-110). Eres abuelo";
        break;
    case $edadRandom < 0 || $edadRandom > 110:
        echo "Edad no contemplada en nuestra encuesta";
        break;
    default:
        break;
}
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