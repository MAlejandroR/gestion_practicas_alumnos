<?php

$a = 4;
$b = 5;

echo " valor de a= $a y valor de b= $b<br/>";

function mifuncion($a, $b) {
    echo "valor de a y b dentro de la función $a y $b<br/>";
    $a++;
    $b++;
    echo " valor de a y b incrementados $a y $b dentro de la función<br/>";
    $mayor = ($a > $b) ? "el mayor es $a<br/>" : "el mayor es $b<br/>";

    return $mayor;
}

echo "llamamos a la función" . mifuncion($a, $b);
echo " valor de a y b   $a y $b<br/> ";


echo "Si usamos la palabra reservada Global dentro de la funcion.. <br/>"
 . "a la variable que se lo asignemos,  no seria necesario pasarlo como parámetro en la función ";
?>

