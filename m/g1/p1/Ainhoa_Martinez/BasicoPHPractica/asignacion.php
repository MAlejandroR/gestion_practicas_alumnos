<?php
/*
 */
header("Refresh:5;url=http://localhost/BasicoPHPractica/index.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Asignación</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Expresión de asignación</h3></div>
            <div class="parrafo"><strong>Expresión asignada</strong> Siguiendo las especificaciones del enunciado</div>
            <div class="parrafo"><strong>Valor de la expresión</strong> Valor que devuelve la <strong>expresión</strong> de asignación</div>
        </div>
        <div id="asignacion">
            <h1>Asignación en PHP</h1>
            <table>
                <tr>
                    <th>Expresión asignada</th>
                    <th>Valor de la expresión</th>
                </tr>

                <tr>
                    <td><strong>$a=9</strong></td>
                    <td><span class='variable'><?php print ($a = 9); ?></span></td>
                </tr>
                <tr>
                    <td><strong>$a=9.4</strong></td>
                    <td><span class='variable'><?php print ($a = 9.4);?></span></td>
                </tr>
                <tr>
                    <td><strong>$a=0b100001</strong></td>
                    <td><span class='variable'><?php print ($a = 0b100001); ?></span></td>
                </tr>
                <tr>
                    <td><strong>$a="una cadena"</strong></td>
                    <td><span class='variable'><?php print ($a = "una cadena"); ?></span></td>
                </tr>
                <tr>
                    <td><strong>$a=21+9</strong></td>
                    <td><span class='variable'><?php print ($a = 21+9);?></span></td>
                </tr>
                <tr>
                    <td><strong>$a="Bien"."venid@"</strong></td>
                    <td><span class='variable'><?php print ($a = "Bien"."venid@"); ?></span></td>
                </tr>
                <tr>
                    <td><strong>$a= print("Hasta luego")</strong></td>
                    <td><span class='variable'><?php print ($a = print ("Hasta luego")); ?></span></td>
                </tr>
                <tr>
                    <td><strong>$a=($v=6)</strong></td>
                    <td><span class='variable'><?php print ($a = ($v=6)); ?></span></td>
                </tr>
            </table>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>