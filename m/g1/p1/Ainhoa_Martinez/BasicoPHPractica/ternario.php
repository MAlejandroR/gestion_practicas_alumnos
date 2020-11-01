<?php
$num = rand(1, 1000);
if ($num % 2 === 0) {
    $result = "El numero $num es par";
} else {
    $result = "El numero $num es impar";
}
header("Refresh:2;url=http://localhost/BasicoPHPractica/index.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ternario</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Operador Ternario</h3></div>
            <div class="parrafo">
                <p>Genera un número aleatorio.</p>
                <p>Evalúa con un operando ternario si es par o no.</p>
                <p>Informa de ello con un mensaje.</p>
            </div>
        </div>
        <div id="ternario">
            <h1>Operando Ternario</h1>
            <div class="parrafo"><?php echo $result ?></div>

            <div class="parrafo"><strong><a href="ternario.php">Probar otro número</a></strong></div>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>
