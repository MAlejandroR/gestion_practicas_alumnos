<?php ?>
<html>
    <head>
        <title>Adivina un número</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <fieldset style="width:40%; background: lemonchiffon; margin:0 auto; padding: 15px">
            <legend><h1>Te adivino el número que estás pensando</h1></legend>
            <h2>Selecciona un intervalo del menú de abajo</h2>
            <fieldset style="width:50%; margin:0 auto; padding: 10px;">
                <legend><h4>Establece el intervalo</h4></legend>
                <form action="jugar.php" method="POST" >
                    <!--Creo un formulario que da inicio al juego, llamando a jugar.php-->
                    <input type="radio" name="modo" value="<?= $modo = pow(2, 10); ?>"/>1 - <?php echo pow(2, 10); ?> (2 <sup>10</sup>) 11 intentos.<br />
                    <input type="radio" name="modo" value="<?= $modo = pow(2, 15); ?>"/>1 - <?php echo pow(2, 15); ?> (2 <sup>15</sup>) 16 intentos.<br />
                    <input type="radio" name="modo" value="<?= $modo = pow(2, 20); ?>"/>1 - <?php echo pow(2, 20); ?> (2 <sup>20</sup>) 21 intentos.<br /><br />
                    <input style="width:25%;" type="submit" value="Empezar" name="submit"/>
                </form>                
            </fieldset>  
            <?=
            //Recojo los valores de error enviados por el header y los muestro
            "<h1 style='color: blue;'>" . $error = filter_input(INPUT_GET, 'error') . "</h1>";
            ?>
            <?=
            "<h1 style='color:blue'>" . $error = filter_input(INPUT_GET, 'error2') . "</h1>";
            ?>
            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr style="border:1px solid cornflowerblue"/>
            <h2>Cada vez que la aplicación te especifique un número deberás indicar</h2>
            <ul>
                <li type="none">Si el número buscado es mayor</li>
                <li type="none">Si el número buscado es menor</li>
                <li type="none">Si el número es correcto</li>
            </ul>
        </fieldset>
    </body>
</html>

