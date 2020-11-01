
<?php
spl_autoload_register(function ($clase) {
    require "$clase.php";
});

session_start(); //comienzo la sesion
$jugando = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : []; //alamceno las jugadas
$clave = new Clave();

$jugada = new Jugada();

if ($_POST['submit'] == 'mostrarJugada') {
    $msj = $clave;
} else if ($_POST['submit'] == 'ocultarJugada') {
    $msj = "";
}

if ($_POST['reiniciar']) {//esto es para reiiniciar el juego
    session_destroy();
    session_start();
}


foreach ($todas_jugadas as $num => $jugada) {//lo que hare en cada jugada
}
?>



<!DOCTYPE html>
<!--
 Requisitos:
El usuario empezará la partida
Se generará un código de colores
El usuario introducira  4 colores
Se compararán los colores introducidos con los generados
     Se comprara el color
     Se compara la posición
     se comprueban las veces que se ha jugado
Se envia mensae con el color y la posición acertado
El usuario vuelve a introudcir colores
Se repiet la comparacion hsta que
 o se acierten todos los colores
se da el mensaje de que se ha ganado
 o se lleve al maximo de intentos
se da el mensaje de que se ha perdido










-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form action="index.php" method="POST">
            <input type="submit" name="submit" value="mostrarJugada">
            <input type="submit" name="submit" value="ocultarJugada">
            <input type="submit" name="submit" value="reiniciar">
            <input type="submit" name="submit" value="jugar">
        </form>



        <h1><?php echo $msj ?></h1>
        <form action="index.php" method="POST">
            <select name="colores">
                <option value="Rojo[]">Rojo</option>
                <option value="Verde[]">Verde</option>
                <option value="Azul[]">Azul</option>
                <option value="Violeta[]">Violeta</option>
                <option value="Marron[]">Marron</option>
                <option value="Rosa[]">Rosa</option>
                <option value="Naranja[]">Naranja</option>

            </select>

        </form>
    </body>
</html>
