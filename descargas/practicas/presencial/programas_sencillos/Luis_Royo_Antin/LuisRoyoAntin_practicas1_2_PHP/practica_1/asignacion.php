<!--
AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Asignación en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <table border=1>
            <tr>
                <td><b>Expresión asignada</b></td>
                <td><b>Valor de la expresión</b></td>
            </tr>
            <?php
            header("Refresh:5; url=index.php");
            const A = 3;
            ?>
            <tr>
                <td>const A = 3</td>
                <td><?php echo A ?></td>
            </tr>
            <?php $a = 3.5; ?>
            <tr>
                <td>$a = 3.5</td>
                <td><?php print($a) ?></td>
            </tr>
            <?php $a = 0b101; ?>
            <tr>
                <td>$a = 0b101</td>
                <td><?php print($a) ?></td>
            </tr>
            <?php $a = "hola hola"; ?>
            <tr>
                <td>$a = "hola hola"</td>
                <td><?php print($a) ?></td>
            </tr>
            <?php $a = "hola" . "hola"; ?>
            <tr>
                <td>$a = "hola" . "hola"</td>
                <td><?php print($a) ?></td>
            </tr>
            <?php $a = 7 + 6; ?>
            <tr>
                <td>$a = 7 + 6</td>
                <td><?php print($a) ?></td>
            </tr>
            <tr>
                <td>$a = print("hola hola")</td>
                <td><?php $a = print("hola hola"); ?><?php echo "<br/>La variable \$a toma valor " . $a ?></td>
            </tr>
            <?php $a = ($v = 4); ?>
            <tr>
                <td>$a = ($v = 4);</td>
                <td><?php print($a) ?></td>
            </tr>
        </table>
        <br/><br/><a href="index.php">Volver</a>
    </body>
</html>
