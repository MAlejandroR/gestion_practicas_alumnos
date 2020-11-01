<!--
AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->
<?php
//Desde fin.php o jugar.php recibiré la opción "jugar". En función del valor que tenga, 
//el programa marcará con "cheched" un radio buttom u otro: 
$opcion = filter_input(INPUT_POST, "opcionJugar");
if (isset($opcion)) {
    switch (true) {
        case $opcion == 10:
            $checked10 = "checked";
            break;
        case $opcion == 15:
            $checked15 = "checked";
            break;
        case $opcion == 20:
            $checked20 = "checked";
            break;
    }
} else {
    //Por defecto, el programa marcará el primer radio buttom: 
    $checked10 = "checked";
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
            <legend><b>Juego adivina número</b></legend>
            <h3>Selecciona un intervalo</h3>
            <form action="jugar.php" method="post">
                <!--A través del método post le envío a jugar.php la opción que seleccione el jugador y
                también el "submit"-->
                <input type="radio" name="opcion" value="10" <?= $checked10 ?> />1-1.024(2<sup>10</sup>).11intentos<br/>
                <input type="radio" name="opcion" value="15" <?= $checked15 ?>/>1-32.768(2<sup>15</sup>).16intentos<br/>
                <input type="radio" name="opcion" value="20" <?= $checked20 ?>/>1-1.048.576(2<sup>20</sup>).21 intentos<br/>
                <input type="submit" value="Empezar" name="empezar"/>
            </form>
            <h3>Piensa un número de ese intervalo</h3>
            <h3>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h3>
            <hr/>
            <h3>Cada vez que la aplicación te especifique un número deberás indicar</h3>
            <ul style="list-style: none">
                <li>Si el número buscado en mayor</li>
                <li>Si el número buscado es menor</li>
                <li>Si has acertado el número</li>
            </ul>
        </fieldset>
        <p>Programa desarrollado por Luis Royo Antín 1ºDAW</p>
    </body>
</html>
