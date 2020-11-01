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
        <form action="jugar.php" method="post">
            <fieldset>
                <legend><h2>Juego adivina número</h2></legend>
                <h3>Selecciona un intervalo del menú de abajo</h3>
                
                <fieldset>
                    <legend>Establece intervalo</legend>
                    <input type="radio" name="valorMayor" value="1024" checked="cheched" />1-1.024 (2<sup>10</sup>). 10 intentos <br/>
                    <input type="radio" name="valorMayor" value="65536" />1-65.536 (2<sup>16</sup>). 16 intentos <br/>
                    <input type="radio" name="valorMayor" value="1048576" />1-1.048.576 (2<sup>20</sup>). 20 intentos <br/>
                    <input type="submit" name="empezar" value="Empezar juego" />
                    <input type="hidden" name="valorMenor" value="1" />
                    <input type="hidden" name="contador" value="1" />
                </fieldset>
                
                <h3>Piensa un número de ese intervalo</h3>
                <h3>La aplicaci{on lo acertará en el número de intentos establecidos según el intervalo</h3>
                <h3>Cada vez que la aplicación te especifique un número deberás de indicar:</h3>
                
                <ul>
                    <li>Si el número buscado es mayor</li>
                    <li>Si el número buscado es menor</li>
                    <li>Si has acertado el número</li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>
