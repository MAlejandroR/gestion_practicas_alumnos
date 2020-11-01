<?php

//valor constante númerico
define("num", 5);

echo num ." constante numerico <br/>";
//constante string
define("str", "perro");
echo str." constante string <br/>";
//constante hexadecimal
define("hexa", dechex(23));
echo hexa." constante hexadecimal <br/>";
//constante binario
define("bin", decbin(23));
echo  bin." constante binario <br/>";
//expresion numerica
$suma = 2 + 2;
echo "expresion numérica $suma <br/>";
//expresion cadena de caracteres
$cadena = "holaCTM";
echo " expresion cadena de caracteres $cadena <br/>";
//funcion
function miFuncion() {
    return print 'mi Funcion';
}
echo "esto devuelve la funcion mifuncion()". miFuncion()."<br/>";
//asignacion de valores
$b = "Hola ";
echo "asignacion de valores <br/> b = $b <br/> le asignamos 'ahí!' <br/> ";
$b .= "ahí!";
echo "$b ";




header("Refresh:5;url=http://localhost/practica1/index.php");
?>

