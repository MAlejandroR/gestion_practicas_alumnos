<?php

$num = rand(0, 1000);

$ternario = ($num % 2 == 0) ? "el numero $num es par" : "el numero $num es  impar";

echo $ternario;

header("Refresh:2;url=http://localhost/practica1/index.php")
?>
