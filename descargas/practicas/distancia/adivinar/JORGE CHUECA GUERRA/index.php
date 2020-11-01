<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 3</title>
    </head>
    <body>
        
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h1>Juego adivina número</h1></legend>
            <h2>    Selecciona un intervalo del menú de abajo</h2>
            <fieldset>
                <legend>Esteblece intervalo</legend>
                <form action="jugar.php" method="POST">
                    <input type="radio" name="num_intentos" value=10 checked> 1-1.024(2<sup>10</sup>). 10 intentos<br />
                    <input type="radio" name="num_intentos" value=16  > 1-65.536(2<sup>16</sup>). 16 intentos<br />
                    <input type="radio" name="num_intentos" value=20  > 1-1.048.576(2<sup>20</sup>). 20 intentos<br />
                    <input type="submit" value="empezar" name="submit">
                </form>
            </fieldset>
            <br />
            <h2>    Piensa un número de ese intervalo</h2>
            <h2>    La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr/>

            <h2>    Cada vez que la aplicación te especifique un n&uacutemero deberá de indicar</h2>
            <ul>
                <ol>Si el número buscado es mayor</ol>
                <ol>Si el número buscado es menor</ol>
                <ol>Si has aceertado el número</ol>
            </ul>
	</fieldset>
    </body>
</html>
