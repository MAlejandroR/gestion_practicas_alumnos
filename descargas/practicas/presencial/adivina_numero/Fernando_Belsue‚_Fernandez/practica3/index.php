<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport">
        <title>Adivina número</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h1>Juego adivina número</h1></legend>
            <h2>Selecciona un intervalo del menú de abajo</h2>
            <!--Con el atributo action hago que al darle al submit envie a juega.php. Método de envío POST-->
            <form action="juega.php" method="POST">
                <fieldset>
                    <legend>Establece intervalo</legend>
                    <input type="radio" name="intervalo" value="intervalo1">1-1024 (11 intentos)<br />
                    <input type="radio" name="intervalo" value="intervalo2">1-32768 (16 intentos)<br />
                    <input type="radio" name="intervalo" value="intervalo3">1-1048576 (21 intentos)<br />
                    <input type="submit" value="Empezar" name="submit">
                </fieldset>
            </form>
            <?php
            $err = filter_input(INPUT_GET, 'err');
            echo "<h1 style='color:red;'>" . $err . "</h1>";
            ?>
            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr>
            <h2>Cada vez que la aplicación te especifice un número deberás de indicar</h2>
            <ul>
                <ol>Si el número buscado es mayor</ol>
                <ol>Si el número buscado es menor</ol>
                <ol>Si has aceertado el número</ol>
            </ul>
    </body>
</html>