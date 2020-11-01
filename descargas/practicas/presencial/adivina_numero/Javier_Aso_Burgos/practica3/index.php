<?php
$dificultadPos = filter_input(0, "dificultad"); //Recojo la dificultad por Post. Tendrá valor si ha venido de fin.php.
$dificultadGet = filter_input(1, "dificultad"); //Recojo la dificultad por Get. Tendrá valor si ha venido de jugar.php.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <fieldset>
            <legend><h2>Juego adivina un número</h2></legend>

            <h3>Selecciona un intervalo del menú de trabajo</h3>

            <fieldset>
                <legend>Establece intervalo</legend>
                <form action="jugar.php" method="post">
                    <label><input type="radio" name="dificultad" value="10" <?php if ($dificultadPos == 10 || $dificultadGet == 10) echo 'checked' ?> >1-1.024(2¹⁰). 11 intentos</label><br>
                    <label><input type="radio" name="dificultad" value="15" <?php if ($dificultadPos == 15 || $dificultadGet == 15) echo 'checked' ?> >1-32.768(2¹5). 16 intentos</label><br>
                    <label><input type="radio" name="dificultad" value="20" <?php if ($dificultadPos == 20 || $dificultadGet == 20) echo 'checked' ?> >1-1.048.576(2²⁰). 21 intentos</label><br><br>
                    <input type="submit" name="submit" value="empezar">
                </form>
            </fieldset>

            <h3>Piensa un número en ese intervalo</h3>
            <h3>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h3>
            <hr>
            <h3>Cada vez que la aplicación te especifique un número deberás de indicar</h3>

            <ul>
                <li>Si el número buscado es mayor</li>
                <li>Si el número buscado es menor</li>
                <li>Si el número ha sido acertado</li>


            </ul>



        </fieldset>


    </body>
</html>
