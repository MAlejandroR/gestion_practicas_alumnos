<?php
$rango=$_GET['rango'];
switch($rango){
    case 1:
        $ind1="checked";
        break;
    case 2:
        $ind2="checked";
        break;
    case 3:
        $ind3="checked";
        break;
    default:
        $ind1="checked";
        
}
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="width: 40%">
            <legend>Juego adivina un numero</legend>
            <h2>Selecciona un intervalo del menú de abajo</h2>
            <fieldset>
                <legend>Establece intervalo</legend>
                <form action="juego.php" method="POST">
                    <input type="radio" name="rango" value="1" id="" <?php echo $ind1 ?>>1-1024. 10 intentos<br>
                    <input type="radio" name="rango" value="2" id="" <?php echo $ind2 ?>>1-65536. 15 intentos<br>
                    <input type="radio" name="rango" value="3" id="" <?php echo $ind3 ?>>1-10485635. 20 intentos<br>
                    <input type="submit" name="enviar" value="empezar">
                </form>
            </fieldset>
            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicación lo acertará en el número de intentos establecido según el intervalo</h2>
            <hr>
            <h2>Cada vez que la aplicación te especifique un número deverás indicar</h2>
            <ul>
                <li>Si el número buscado es mayor</li>
                <li>Si el número buscado es menor</li>
                <li>Si se ha acertado el número</li>
            </ul>
        </fieldset>


    </body>
</html>
