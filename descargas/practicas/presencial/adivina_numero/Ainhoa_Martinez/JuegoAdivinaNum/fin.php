<?php 
    $intentos = $_GET['intentos'];
    $msj = $_GET['mensaje'];
    $cadena = "";
    
    switch ($msj) {
    case $intentos = 1:
    case $intentos = 2:
    case $intentos = 3:
    case $intentos = 4:
    case $intentos = 5:
        $cadena = "Soy muy listo, lo he adivinado enseguida";
            break;
    case $intentos = 6:
    case $intentos = 7:
    case $intentos = 8:
    case $intentos = 9:
    case $intentos = 10:
        $cadena = "Me ha costado un poco, pero lo he conseguido";
        break;
    case $intentos = 11:
    case $intentos = 12:
    case $intentos = 13:
    case $intentos = 14:
    case $intentos = 15:
        $cadena = "Es un poco difícil, creo que me estás engañando";
        break;
    case $intentos = 16:
    case $intentos = 17:
    case $intentos = 18:
    case $intentos = 19:
    case $intentos = 20:
        $cadena = "Me lo estás poniendo muy difícil, pero lo he conseguido";
        break;
    default:
        $cadena = "He perdido...";
        break;
}
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Fin</title>
        <style>
            fieldset {
                background: #aeedd6;
                width: 450px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend>Fin del juego</legend>
            <form action="index.php">
                <h2><?php echo "$cadena" ?></h2>
                <input type="submit" name="submit" value="Volver a inicio">
            </form>
        </fieldset>
    </body>
</html>
