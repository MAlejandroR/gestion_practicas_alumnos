<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
$intentos=$_GET["intentos"];
$msj="checked";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Juego adivina un número</h1>
        <h2>Selecciona un intervalo del menú de abajo</h2>
        <form action="juego.php" method="POST">
            Establece intervalo <br/>
            <input type="radio" value="10" name="tipo"<?php if($intentos==10){echo $msj;}?>>1-1.024(210). 10 intentos<br/>
            <input type="radio" value="15" name="tipo"<?php if($intentos==15){echo $msj;}?>>1-65.536(215). 15 intentos<br/>
            <input type="radio" value="20" name="tipo"<?php if($intentos==20){echo $msj;}?>>1-1.048.536(220). 20 intentos<br/>
            <input type="submit" name="enviar" value="Enviar">
            
            
        </form>
        <h2>Piensa un número de ese intervalo<br/>
            La aplicación lo acertará en el número de intentos establecidos según el intervalo<br/>
            <hr/>
            Cada vez que la aplicación te especifique un número deberás indicar:
        </h2>
        <ul>
            <ol>Si el número buscado es mayor</ol>
            <ol>Si el número buscado es menor</ol>
            <ol>Si has acertado el número</ol>
        </ul>
    </body>
</html>
