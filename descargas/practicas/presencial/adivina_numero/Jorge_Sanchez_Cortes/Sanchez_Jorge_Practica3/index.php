<!DOCTYPE html>
<html>
    <head>
        <title>Practica numero</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <fieldset>       
            <legend>Seleccione el rango de juego</legend>
            <form action="jugar.php" method="post">
            <input type="radio" name="rango" value="p1">1 - 1024(2<sup>10</sup>)<br>
            <input type="radio" name="rango" value="p2">1- 65536(2<sup>15</sup>)<br>
            <input type="radio" name="rango" value="p3">1 - 1048576(2<sup>20</sup>)<br>
            <input type="submit" name="enviar" value="Empezar">
            </form>
        </fieldset>
    </body>
</html>