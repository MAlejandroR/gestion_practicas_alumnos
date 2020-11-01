<?php
// inicio la sesión
session_start();
// cargo las clases necesarias
spl_autoload_register(function($clase) {
    require "$clase.php";
});
const COLORES = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marrón', 'Rosa'];
//Analizo los submit
switch ($_POST['submit']) {
    // Se genera una clave de colores y se inicializan las jugadas a 0.
    case 'Empezar':
    case 'Reset':
        $clave_juego = new Clave();
        $jugadas_posibles = 14;
        $jugadas = 0;
        //Muestro la clave

        break;
    // Se compara la jugada con la clave y se muestran los aciertos y los intentos
    case 'Jugar':
        // Leo la variable de sesión
        $total_jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];
        // Genero los select para que el usuario introduzca sus colores
        $selects = new Plantilla();
        //Leo los colores introducidos por el usuario
        $colores = $_POST['colores'];
        // creo la jugada
        $jugada = new Jugada($colores);
        // añado la jugada al array de jugadas guardado en la variable de sesión
        $total_jugadas[] = $jugada;

        // Muestro las jugadas

        break;
    default:
        break;
}

$_SESSION['jugadas'] = serialize($total_jugadas);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mastermind</title>
    </head>
    <body>
        <form action="jugar.php" method="POST">
            <input type="submit" value="Jugar" name="submit" value="">
            <input type="submit" value="Reset" name="submit">
        </form>

    </body>
</html>



