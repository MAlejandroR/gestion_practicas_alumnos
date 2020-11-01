<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h2>Asignacion en PHP</h2>";
$a = 12;
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = "Esto es una cadena";
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = 0xFFaabc901;
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = b11100011;
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = 10 +10;
$tipo = gettype($a);
echo "La variable \$a vale $a  y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = 'Cadena'.'de'.'caracteres';
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
$a = print("Cadena de texto con la funcion print");
$tipo = gettype($a);
echo "La variable \$a vale $a y es del tipo $tipo<br />";
//---------------------------------------------------------
echo "La variable \$a vale ".($a = 24)." y es del tipo ".($tipo = gettype($a))."<br />";
header("Refresh:5;url=index.php");
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