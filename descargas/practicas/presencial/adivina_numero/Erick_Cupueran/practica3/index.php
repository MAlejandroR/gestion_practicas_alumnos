<?php ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>MENU</title>
        <style>
            fieldset{
                background-color: #81F781;
                width: 350px;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend><h1>Juego adivina n&uacutemero</h1></legend>
            <h2>    Selecciona un intervalo del men&uacute de abajo</h2>
            <fieldset>
                <legend>Esteblece intervalo</legend>
                <form action="jugar.php" method="POST">
                    <input type="radio" name="num_intentos" value=10 checked> 1-1.024(2<sup>10</sup>). 10 intentos<br /> 
                    <input type="radio" name="num_intentos" value=15 checked> 1-65.536(2<sup>15</sup>). 15 intentos<br />
                    <input type="radio" name="num_intentos" value=20 checked> 1-1.048.536<sup>20</sup>). 20 intentos<br /> 
                    <input type="submit" value="empezar" name="submit">
                </form></fieldset>
            <br />
            <h2>    Piensa un número en ese intervalo</h2>
            <h2>    La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr />

            <h2>   Cada vez que la aplicación te especifique un número deberás de indicar</h2>
            <ul>
                <ol>Si el número buscado es mayor</ol>
                <ol>Si el número buscado es menor</ol>
                <ol>Si has acertado el número</ol>
            </ul>
        </fieldset>
    </body>
</html>

