<?php    
?>
<!DOCTYPE html>
<!--
                        Práctica 3
                    JORGE ALLOZA MENDEZ
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport">
        <title>Adivina número</title>
    </head>
    <body>
        <!-- creo un fieldset para delimitar el espacio que va ocupar-->
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: palegreen">
                        <!-- le asigno una leyenda-->
            <legend><h1>Juego adivina número</h1></legend>            
            <h2>   Selecciona un intervalo en el menú de abajo </h2>
             <!-- creo otro fieldset-->
            <fieldset>
                <!-- le asigno una leyenda-->
                <legend><h2>Establece el intervalo</h2></legend>               
                <!-- 
                creo el formulario el cual lleva a jugar.php y envía mediante
                POST la información de que se ha pulsado el boton de empezar y 
                la dificultad elegida
                -->
            <form action="jugar.php" method="POST" style="margin-left: 10%;">
                <input type="radio" value="10" name="dificultad">1 - 1024(2^10) - 10 intentos<br>
                <input type="radio" value="15" name="dificultad">2 - 32.768(2^15) - 15 intentos<br>
                <input type="radio" value="20" name="dificultad">3 - 1.048.576(2^20) - 20 intentos<br>
                <input type="submit" value="empezar" name="empezar">     
            </form>
                <?php      
                $err = filter_input(INPUT_GET, 'err');
                echo "<h2 style='color: red;'>" . $err. "</h2>";
                ?>
            </fieldset>
            <h2>   Piensa en un número de ese intervalo</h2>
            <h2>   La aplicación lo acertará en el el numero de intentos establecidos según intervalos </h2>
            <hr>
            <h2>   Cada vez que la aplicación especifique un número deberás indicar</h2>
            <p> Si el numero buscado es mayor</p>
            <p> Si el numero buscado es menor</p>
            <p> Si la aplicación ha acertado el número</p>
        </fieldset>

    </body>
</html>

