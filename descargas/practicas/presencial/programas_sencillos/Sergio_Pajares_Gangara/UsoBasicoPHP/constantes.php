<?php
define("CONSTANTE", "Tengo 48 años");
const constante = "Tengo 11 años";
define("resta", 100-48);
const resta1 = 100-11;
?>

<html>
    <head><title>Constantes</title></head>
    <body>
        <h1>Constantes en PHP</h1>
        <h3>Constante declarada con Define</h3><br>
        <?php echo CONSTANTE ;?> (Constante declarada con <?php echo gettype(CONSTANTE); ?>)
        <h3>Constante declarada con const </h3><br>
        <?php echo constante ;?> (Constante declarada con <?php echo gettype(CONSTANTE); ?>)
        <h3>Operación con Define</h3>
        <?php echo "Para los 100, me faltan ". resta ." años ";?> (Constante declarada con <?php echo gettype(CONSTANTE); ?>)
        <h3>Operación con Const</h3>
        <?php echo "Para los 100, me faltan ". resta1 ." años " ;?> (Constante declarada con <?php echo gettype(CONSTANTE); ?>)
        <br>
        <a href="index.php">Volver</a>
    </body>
</html