<?php
   $numAleat = rand(0, 150);
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
        <title>Practica1 - Selección</title>
         <link rel="stylesheet" href="estilos.css" type="text/css" />
         <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>          
        <div id="enunciado"> 
            <div id="interior">   
            <h4>Iteraciones tipo switch</h4>
            <p>
                <b>Switch (true)</b> Puedo hacerlo gracias a la 
                expresividad de las instrucciones en php
            </p>
            </div>
            <div id="volver">           
                <a href="index.php">Volver</a>
            </div>  
        </div>    
        <div id="contenido">
            <h1>
                Selecciones en PHP
            </h1>
            <p>
                <?php
                switch (true) {
                    case $numAleat < 12: $msj = "Eres un niño";
                        break;
                    case $numAleat < 18: $msj = "Eres un adolescente";
                        break;
                    case $numAleat < 36: $msj = "Eres un joven";
                        break;
                    case $numAleat < 65: $msj = "Eres un adulto";
                        break;
                    case $numAleat < 111: $msj = "Eres un jubilado";
                        break;
                    default:
                        $msj = "Edad no contemplada";
                    break;
                }
                echo "Tienes ".$numAleat." años, ".$msj;
                ?>
                <a href="seleccion.php">Probar otra edad</a>
            </p>
        </div>
    </body>
</html>
