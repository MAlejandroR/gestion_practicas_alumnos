<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend><h1 style="color:blue">MasterMind</h1></legend>
            <h2>Requisitos funcionales</h2>
            <p>Crear el html de inicio del juego</p>
            <p>Crear el panel jugar</p>
            <p>Crear la clase que genera la clave</p>
            <ul>
                <li>Genero un array con los colores</li>
                <li>Creo otro array con 4 colores aleatorios del anterior, este será la clave</li>    
            </ul>
            <p>Crear la clase jugada</p>
            <ul>
                <li>Genero un array con la clave según el submit que me pasan</li>
                <li>Creo la función comprobar jugada, la comparo con la clave</li>
                <li>Devuelvo los valores correctos</li>                                
            </ul>
            <p>Crear jugar.php</p>
                <li>Inicio la sesión de usuario</li>
                <li>Genero la clave y la jugada creando un nuevo objeto usando los submits de los formularios</li>  
                <li>Sumo intentos al máximo permitido, si hay más de 14 envío a fin.php</li>
                <li>Comparo la clave generada y la que creo para mostrar errores y envío la nueva opción</li>
                
        <form action="jugar.php" method="POST">
            <input type="submit" value="JUGAR"/> 
        </form>
        </fieldset>
    </body>
</html>
