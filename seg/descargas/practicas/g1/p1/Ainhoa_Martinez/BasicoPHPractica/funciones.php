<?php
$a = 4;
$b = 9;

function funcionVar(&$a, $b) {
    $a = $a * 2;
    $b = $b * 2;
}

$incremeto = funcionVar($a, $b);

header("Refresh:5;url=http://localhost/BasicoPHPractica/index.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Funciones</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Funciones</h3></div>
            <div class="parrafo">
                <p><strong>Función</strong></p>
                <p>Recibe dos parámetros (referencia y valor)</p>
                <p>Duplica los valores de los parámetros</p>
                <p>Visualiza los valores antes y después de modificarlos</p>
                <p><strong>Programa principal</strong></p>
                <p>Crea dos variables</p>
                <p>Visualiza sus valores</p>
                <p>Invoca a la función</p>
                <p>Vuelve a visualizar los valores</p>
                <hr />
                <p>Plantea globalizar tanto $a como $b, y comprende el resultado</p>
            </div>
        </div>
        <div id="funcion">
            <h1>Funciones: paso de parámetros</h1>
            <div class="parrafo">
                <p>Programa principal, antes de invocar a la función. <strong><?php echo "\$a = $a y \$b = $b" ?> </strong></p>
                <p>Dentro de función antes de modificar parámetros: <strong> <?php echo "funcionVar($a, $b)"?> </strong></p>
                <p>Dentro de función después de modificar parámetros <strong> <?php echo " " . $incremeto . " " ?></strong> </p>
                <p>Programa principal, después de infocar a la función.  <strong><?php echo "\$a = $a y \$b = $b" ?></strong></p>
            </div>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>