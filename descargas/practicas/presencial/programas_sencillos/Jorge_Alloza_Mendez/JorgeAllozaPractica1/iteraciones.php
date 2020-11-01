<?php
    $suma = 0;
    $cantNumPares = 0;
    for ($i = 0; $cantNumPares <= 100; $i++) {
        if ($i%2 == 0) {
            $cantNumPares = $cantNumPares + 1;
            $suma = $suma + $i; 
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
        <title>Practica1 - Iteraciones</title>
         <link rel="stylesheet" href="estilos.css" type="text/css" />
         <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>
        <div id = "enunciado">
           <div id="interior">              
                <h4>Iteraciones tipo For</h4>
                <p>
                    Suma los 100 primeros números pares
                    Muestro el resultado
                </p>
             </div>
            <div id="volver">           
                <h3> <a href="index.php">Volver</a></h3>
             </div>    
        </div>
        
        <div id="contenido">
            <h1>
                Iteraciones PHP
            </h1>
            <p>
                <?php
                   
                 echo "La suma de los 100 primeros números pares es $suma";
                ?>
                
            </p>
        </div>
    </body>
</html>
