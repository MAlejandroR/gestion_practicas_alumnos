<?php
    switch ($_POST['num_intentos']){
        case '1':
            $num_intentos = 1;
            $numero_intentos = 10;
            header("Location:jugar.php?numero_intentos=$numero_intentos&num_intentos=$num_intentos");
            exit();
            break;
        case '2':
            $num_intentos = 2;
            $numero_intentos = 15;
            header("Location:jugar.php?numero_intentos=$numero_intentos&num_intentos=$num_intentos");
            exit();
            break;
        case '3':
            $num_intentos = 3;
            $numero_intentos = 20;
            header("Location:jugar.php?numero_intentos=$numero_intentos&num_intentos =$num_intentos");
            exit();
            break;
    }
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
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend><h1>Juego adivina un número</h1></legend>
            <h2>Selecciona un intervalo del menú de abajo</h2>
            <fieldset>
                <legend>Esteblece intervalo</legend>
                <form action="." method="POST">
                    <input type="radio" name="num_intentos" value="1" checked> 1-1.024(2<sup>10</sup>). 10 intentos<br />
                    <input type="radio" name="num_intentos" value="2" > 1-65.536(2<sup>15</sup>). 15 intentos<br />
                    <input type="radio" name="num_intentos" value="3" > 1-1.048.536(2<sup>20</sup>). 20 intentos<br />
                    <input type="submit" value="empezar" name="submit">
                </form>
            </fieldset>
            <br/>
            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicacion lo acertara en el numero de intentos establecidos segun el intervalo</h2>
            <hr />

            <h2>Cada vez que la aplicacion te especifique un numero deberas de indicar</h2>
            <ul>
                <ol>Si el numero buscado es mayor</ol>
                <ol>Si el numero buscado es menor</ol>
                <ol>Si has acertado el numero</ol>
            </ul>
        </fieldset>
    </body>
</html>