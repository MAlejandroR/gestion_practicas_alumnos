<?php
   $numAleat = rand(0, 1000);
   $numAleat % 2 == 0 ? $msj = " es par" : $msj = " es impar";
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
        <title>Practica1 - Operador Ternario</title>
        <link rel="stylesheet" href="estilos.css" type="text/css" />
        <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>          
        <div id="enunciado"> 
            <div id="interior">   
            <h4>Operador Ternario</h4>
            <p>
                Genera un número aleatorio.
                Evalúa con un operador ternario si es par o no.<br>
                Informa de ello con un mensaje.
            </p>
            </div>
            <div id="volver">           
                <a href="index.php">Volver</a>
            </div>    
        </div>   
        <div id="contenido" >
            <h1>
                Operador Ternario
            </h1>
            <p color="red">
                <?php                 
                 echo $numAleat.", ".$msj."<br>";
                ?>
                <a href="ternario.php">Probar otro número</a>
            </p>
        </div>
    </body>
</html>
