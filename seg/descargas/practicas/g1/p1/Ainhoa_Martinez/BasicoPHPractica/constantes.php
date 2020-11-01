<?php
/**
 * A la constante Edad le asignas tu edad.
    Luego visualiza los años que tienes y los años que te quedan para cumplir 100 años
    Volver al index después de 2 segundos* 
 */
define("Edad", 27);
const EDAD = 26;

$defEdad = 100 - Edad;
$conEdad = 100 - EDAD;

header("Refresh:2;url=http://localhost/BasicoPHPractica/index.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Constantes</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Declarando constantes</h3></div>
            <div class="parrafo"><strong>define</strong> No funciona en clases</div>
            <div class="parrafo"><strong>const</strong> Funciona tanto en clases como fuera de ellas</div>
        </div>
        <div id="constantes">
            <h1>Constantes en PHP</h1>
            <div class="parrafo"><strong>Constante declarada con Define</strong></div>
            <div class="parrafo"><?php print "Tengo " . Edad . " años"?></div>
            <div class="parrafo"><strong>Constante declarada con const</strong></div>
            <div class="parrafo"><?php print "Tengo " . EDAD . " años"?></div>
            <div class="parrafo"><strong>Operación con define</strong></div>
            <div class="parrafo"><?php print "Para los 100, me faltan " . $defEdad . " años"?></div>
            <div class="parrafo"><strong>Operación con const</strong></div>
            <div class="parrafo"><?php print "Para los 100, me faltan " . $conEdad . " años"?></div>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>