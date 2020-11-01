<?php
   
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
        <title>Practica1 - Asiganción</title>
        <link rel="stylesheet" href="estilos.css" type="text/css" />
        <meta http-equiv="refresh" content="5;URL=index.php">
    </head>
    <body>          
        <div id="enunciado">
            <div id="interior">           
            <h4>Expresión de asignación</h4>
            <p>
                <b>Expresión asignada</b>Siguiendo las especificaciones del enuniado.<br>
                <b>Valor de la expresión</b> Valor que devuelve la <br>
                <b>expresión.</b> de asignacion<br>
            </p>
            </div>
            <div id="volver">           
                <h3><a href="index.php">Volver</a></h3>
            </div>    
        </div>
        
        <div id ="contenido">
            <h1>
                Asignación en PHP
            </h1>
            <table align="center">
                <th>                
                    Expresión asiganda    
                </th>
                <th>
                    Valor de la expresión
                </th>
                <tr>
                    <td><?php $a = 5;
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                 <tr>
                    <td><?php $a = "hola caracola";
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>  
                 <tr>
                    <td><?php $a = 0xADD54;
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                 <tr>
                    <td><?php $a = 0b100001;
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                <tr>
                    <td><?php $a = 5+9;
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                <tr>
                    <td><?php $a = "hola"."caracola";
                        echo "\$a = $a" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                <tr>
                    <td><?php 
                        echo '$a = print("'; 
                        $a = print("hola caracola");
                        echo '")';
                        ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                <tr>
                    <td><?php $a =($v=8);
                        echo "\$a =($v=8)" ?></td>
                    <td><?php echo"-".$a."-" ?></td>
                </tr>
                
            </table>
            </p>
        </div>
    </body>
</html>

