<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h2>Iteraciones en PHP</h2>";
echo "Vamos a sumar los 100 primeros números pares<br />";
$sumarNumPares = 0;
$contador = 0;
while ($contador < 100) {
    for ($i = 1; $i <= 200; $i++) {
        if ($i % 2 == 0) {
            $sumarNumPares += $i;
            $contador++;
            echo "Num par: $i || $sumarNumPares || $contador<br />";
        }
    }
}
header("Refresh:2;url=index.php");
?>
