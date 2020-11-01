<?php ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica3</title>
        <style>
            body{
                background-color: #c65e55;
                width: 100%;
            }
            fieldset {
                width: 400px;
                height: 130px;
            }
            p {
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Juego adivina número</h1>

        <h2>Selecciona un intervalo del menú de abajo</h2>
        <form action="jugar.php" method="POST">
            <fieldset>
                <legend>Establece intervalo</legend>
                <input type="radio" value="1-1.024" name="intervalo">0-1.024(2^10). 10 intentos<br>
                <input type="radio" value="1-65.536" name="intervalo">0-65.536(2^15). 15 intentos<br>
                <input type="radio" value="1-1.048.536" name="intervalo">0-1.048.536(2^20). 20 intentos<br>
                <br />
            </fieldset>
            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr />
            <h2>Cada vez que la aplicación te especifique un número deberás de indicar</h2>
            <p>Si el número buscado es mayor</p>
            <p>Si el número buscado es menor</p>
            <p>Si has acertado el número</p>
            <input type="submit" value="Empezar" name="submit"><br />
        </form>
    </body>
</html>
