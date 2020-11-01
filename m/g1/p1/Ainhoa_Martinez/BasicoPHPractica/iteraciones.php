<?php
$suma = 0;
for ($a = 0; $a < 100; $a++) {
    if ($a % 2 == 0) {
        $suma = $suma + $a;
    }
}
header("Refresh:2;url=http://localhost/BasicoPHPractica/index.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Iteración</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Iteraciones tipo switch</h3></div>
            <div class="parrafo">
                <p>Suma los 100 primeros números pares y muestro el resultado</p>
            </div>
        </div>
        <div id="iteracion">
            <h1>Operando Ternario</h1>
            <div class="parrafo">La suma de los 100 primeros números pares son <?php echo $suma ?></div>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>
