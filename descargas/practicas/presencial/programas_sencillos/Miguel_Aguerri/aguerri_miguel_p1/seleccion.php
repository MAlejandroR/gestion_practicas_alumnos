<?php
header('Refresh: 2; URL=index.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
//Generamos un número de mes
$edad = rand(0, 150);
 
//Evaluamos en número de días del mes generado
 
switch ($edad) {
    case ($edad >=0 && $edad <11):
        $msj = "Tienes $edad años, todavía eres un niño";
        break;
 
    case ($edad >=11 && $edad <18):
        $msj = "Tienes $edad años, eres un adolescente";
        break;
    case ($edad >=18 && $edad <36):
        $msj = "Tienes $edad años, todavía eres joven";
        break;
    case ($edad >=36 && $edad <66):
        $msj = "Tienes $edad años, ya eres todo un adulto";
        break;
    case ($edad >=66 && $edad <111):
        $msj = "Tienes $edad años, eres un jubileta";
        break;
    default:
        $msj = "Edad no contenplada en nuestra encuesta";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Seleccion en php:</h1>
        <hr />
        <h1><?= "$msj" ?></h1>
 
    </body>
</html>
