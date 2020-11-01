<?php
//en la variable $fin recogemos el valor de la variable que le hemos pasado por medio del header
$fin = $_GET['fin'];
$num = $_GET['num'];

//en funcion del valor de la variable mostaremos un mensaje u otro
if ($fin == true) {
    $msj = "Enhorabuena hemos hacertado. El número era: ";
} else {
    $msj = "Tramposo, ya tendria que haber acertado el numero";
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Fin del juego</h1>
        <h2><?php echo $msj . " " . $num ?></h2>
        <form action="index.php" method="POST">
            <input type="submit" name="inicio" value="Ir al inicio">
        </form>
    </body>
</html>

