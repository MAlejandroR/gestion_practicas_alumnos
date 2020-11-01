<?php
//Recojo los valores enviados desde juega.php
$num_intentos = filter_input(INPUT_GET, 'num_intentos');
$max_intentos = filter_input(INPUT_GET, 'max_intentos');
$num = filter_input(INPUT_GET, 'num');
//Si el número de intentos es menor o igual al máximo permitido muestreo mensaje de acierto.
$msj = "¡Lo he acertado en $num_intentos de $max_intentos intentos!<br />";
$msj .= " El número es $num."
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Fin</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <h2><?= $msj ?></h2>
            <form action="index.php" method="POST">
                <input type="submit" name="volver" value="Volver"/>
            </form>
        </fieldset>
    </body>
</html>