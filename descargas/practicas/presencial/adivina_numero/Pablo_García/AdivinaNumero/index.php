<?php
$checked1 = "";
$checked2 = "";
$checked3 = "";
if (isset($_GET['intentos'])) {
    $intentos = ($_GET['intentos']);
    //Compruebo intentos y obtengo su valor.
    //Dependiendo de la opcion que haya elegido en la pestaña posterior, me devuelve un valor y pongo un checked en el que haya elegido.
    //Cuando le de a volver le saldra seleccionado el elegido antes.
    if ($intentos === "10") {
        $checked1 = "checked";
    }
    if ($intentos === "15") {
        $checked2 = "checked";
    }
    if ($intentos === "20") {
        $checked3 = "checked";
    }
}else{
    //Nada mas empezar el juego no hemos elegido nada, por lo que selecciono por defecto el primero.
     $checked1 = "checked";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego de adivinar número</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h1>Juego adivina número</h1></legend>
            <h2>Selecciona un intervalo del menú de abajo</h2>
            <fieldset>
                <legend>Esteblece intervalo</legend>
                <form action="juego.php" method="POST">
                    <input type="radio" name="intentos" value="10" <?php echo $checked1 ?>> 1-1.024(2<sup>10</sup>). 10 intentos<br>
                    <input type="radio" name="intentos" value="15" <?php echo $checked2 ?>> 1-65.536(2<sup>15</sup>). 15 intentos<br>
                    <input type="radio" name="intentos" value="20" <?php echo $checked3 ?>> 1-1.048.536(2<sup>20</sup>). 20 intentos<br>
                    <input type="submit" value="Empezar juego" name="submit">
                </form>
            </fieldset>
            <h2>Piensa un número de ese intervalo<br/><br/>
                La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <hr/>
            <h2>Cada vez que la aplicación te especifique un número deberás indicar</h2>
            <ul>
                <li>Si el número buscado es mayor</li>
                <li>Si el número buscado es menos</li>
                <li>Si has acertado el número<br/></li>
            </ul>
        </fieldset>
    </body>
</html>
