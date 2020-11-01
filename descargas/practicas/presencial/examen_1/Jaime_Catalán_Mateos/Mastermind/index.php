<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend>Clave generada por el sistema</legend>
            <form action="Juego.php" method="POST">
                <input type="submit" name="submit" value="muestraClave"/>
                <?= $LaClaveDice?>
            </form>
        </fieldset>
        <fieldset>
            <legend>¡A jugar!</legend>
            <form action="Juego.php" method="POST">
                <select name="color1">
                    <?php foreach ($gamaColores as $color) {
                        echo "<option value='$color'>$color</option> ";
                    }?>
                </select>
                <select name="color2">
                    <?php foreach ($gamaColores as $color) {
                        echo "<option value='$color'>$color</option> ";
                    }?>
                </select>
                <select name="color3">
                    <?php foreach ($gamaColores as $color) {
                        echo "<option value='$color'>$color</option> ";
                    }?>
                </select>
                <select name="color4">
                    <?php foreach ($gamaColores as $color) {
                        echo "<option value='$color'>$color</option> ";
                    }?>
                </select>
                <input type="submit" name="submit" value="Jugar"/>
            </form>
        </fieldset>
        <fieldset>
            <legend>Info</legend>
            <p>Se permiten 14 jugadas</p>
            <p>Cada vez que juegues te muestro el resultado de tu jugada</p>
            <p><?= $mensaje?></p>
        </fieldset>
    </body>
</html>
