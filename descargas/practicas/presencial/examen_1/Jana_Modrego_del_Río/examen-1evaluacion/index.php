<?php
/* Requisitos del programa
 * 1.- Cuando el usuario pulse "Empezar", se generará la clave de colores a adivinar y
 * se mostrará en jugar.php la opción de ver/ocultar la clave, los select donde el
 * usuario elige su jugada y los botones "jugar" y "reset".
 * 3.- Si el usuario pulsa "jugar" se comprobará la jugada con respecto a la clave y
 * se mostrará al usuario los colores que ha acertado y de ellos, cuántos están
 * en la posición correcta.
 * 4.- Si el usuario elige otra jugada y vuelve a pulsar "jugar" se mostrarán todas las
 * las jugadas con su correspondiente información de aciertos.
 * 5.- Se permiten 14 jugadas.
 * 6.- Si el usuario pulsa el botón "Reset" se genera una nueva clave de colores y las jugadas
 * vuelven a 0.
 * 7.- Si el usuario pulsa "Mostrar clave" se mostrará la clave de colores.
 * 8.- La clase Clave contiene la clave de colores a adivinar.
 * 9.- La clase Jugada contiene una jugada con los aciertos que tiene respecto a la clave
 * 10.- La clase Plantilla genera el html del formulario para jugar y el html para mostrar
 * las jugadas realizadas.
 *
 * 
 */
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
        <title>Mastermind</title>
    </head>
    <body>
        <fieldset style="width: 50%;margin:auto; background:lavenderblush">
            <legend><h1>Juego Martermind</h1></legend>
            <h2>Debes adivinar una secuencia de colores</h2>
            <h2>Tienes un máximo de 14 intentos</h2>
            <form action="jugar.php" method="POST">
                <input type="submit" value="Empezar" name="submit">
            </form>
        </fieldset>
    </body>
</html>
