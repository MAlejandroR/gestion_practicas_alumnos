<?php
$a = 4;
$b = 5;

function duplica($prim, &$b) {
    global $a;
    echo "Dentro de la función, antes de modificar parámetros: \$a = $prim, \$b = $b" . "<br>";
    $a = 2 * $prim;
    $b = 2 * $b;
    echo "Dentro de la función, después de modificar parámetros: \$a = $a, \$b = $b " . "<br>";
    if ($a > $b){
        return $a;
    } else {
        if ($b>$a){
            return $b;
        } else{
            return " $a y $b son iguales ";
        }
    }
    
}
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
        <title>Practica1 - Funciones</title>
        <link rel="stylesheet" href="estilos.css" type="text/css" />
    </head>
    <body>          
        <div id="enunciado"> 
            <div id="interior">   
                <h4>Funciones: paso de parámetros</h4>
                <p>
                    <b>Función</b>
                    Recibe dos parámetros (referencia y valor)<br>
                    Duplica los valores de los parámetros <br>
                    Visualiza los valores antes y después de modificarlos <br>
                    Programa principal
                    <b>Crea dos variables</b>
                    Visualiza sus valores <br>
                    Invoca a la función <br>
                    Vuleve a visualizar los valores <br>
                    <i> Plantea globalizar tanto $a como $b, y comprende el resultado </i>
                </p>
            </div>

            <div id="volver">           
                <h3><a href="index.php">Volver</a></h3>
            </div>  
        </div>
        <div id="contenido">
            <h1>
                Funciones PHP
            </h1>
            <p>
                <?php
                echo "Programa principal, antes de invocar a la función: \$a = $a, \$b = $b" . "<br>";
                duplica($a, $b);
                echo "Programa principal, después de invocar a la función: \$a = $a, \$b = $b" . "<br>";
                ?>               
            </p>
        </div>
    </body>
</html>
