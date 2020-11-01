<?php
    define(edad, 22); 
    const CONSTCONST = 11;
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
        <title>Practica1 - Cosntantes</title>
         <link rel="stylesheet" href="estilos.css" type="text/css" />
         <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>      
        <div id="enunciado">
            <div id="interior">           
            <h4>Declarando constantes</h4>
            <p>
                <b>define</b> No funciona en clases
                <b>const</b> Funciona tanto en clases como fuera de ellas
            </p>
            </div>
            <div id="volver">            
                <h3><a href="index.php">Volver</a></h3>
            </div>    
        </div>       
        <div id="contenido">
            <h1>
                Constantes en PHP
            </h1>
            <p>
                <b>Constante declarada con Define</b> 
                <?php echo "Tengo ". edad ." años"."<br>"?>             
                <b>Constante declarada con const</b> 
                <?php echo "Tengo ".CONSTCONST." años"."<br>"?>               
                <b>Operación con define</b>   
                <?php echo "Para los 100, me faltan ".(100-edad)." años"."<br>"?>
                <b>Operación con const</b> 
                <?php echo "Para los 100, me faltan ".(100-CONSTCONST)." años"."<br>"?> 
            </p>
        </div>
    </body>
</html>
