<!--
AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->
<?php
//De jugar.php recibo el número de jugada y el límite. 
$numeroJugada = filter_input(INPUT_GET, "numeroJugada");
//Este número de jugada lo utilizo para hacer un if-else en función de si el jugador
//ha sobrepasado o no el límite de jugadas. Si no lo ha sobrepasado, significará que, en jugar.php, 
//ha marcado la opción "igual".
$limiteJugadas = filter_input(INPUT_GET, "limiteJugadas");
//El límite de jugadas lo empleo en el if, pero también, como se puede apreciar en el formulario de más
//abajo, para enviarle al index.php la opción en la que ha jugado el usuario, ya que el número límite de jugadas
//implica una opción u otra.
if ($numeroJugada <= $limiteJugadas) {
    $msj = "Has acertado en " . $numeroJugada . " jugadas";
} else {
    $msj = "No has sido sincero o sincera";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="background-color: rosybrown;width:40%">
            <h3><?= $msj ?></h3>
            <form action='index.php' method='post'>
                <input type="submit" value="Reiniciar" name="reiniciar"/>
                <input type="hidden" value="<?= $limiteJugadas ?>" name="opcionJugar"/>
            </form>
        </fieldset>
    </body>
</html>


