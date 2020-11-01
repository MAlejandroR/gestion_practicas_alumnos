<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
spl_autoload_register(function ($clase) {
    require "$clase.php";
});
echo "<h1>Bienvenidos a Mastermid</h1>";

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (isset($_SESSION['clave']))
    $clave = $_SESSION['clave'];
else {
    $clave = new Clave();
    $_SESSION['clave'] = $clave;
}

$coloresClaveMsj = "";
$jugadaMsj = "";
$jugadaMsjJuego = "";
$coloresClaveMsjJuego = "";
$msjResultado="";

switch ($_POST['submit']) {
    case 'Mostrar':
        $coloresClaveMsj = "<p id='campo2'><br/>1Color:" . $clave->getClaveColores()[0] . "<br />"
                . "2Color:" . $clave->getClaveColores()[1] . "<br />"
                . "3Color:" . $clave->getClaveColores()[2] . "<br />"
                . "4Color:" . $clave->getClaveColores()[3] . "<br /></p>";
        break;
    case 'Ocultar':
        $coloresClaveMsj = "";
        break;
    case 'Jugada':
        $aciertosColores = 0;
        $aciertosPos = 0;
        $colorNum1 = filter_input(INPUT_POST, 'colores1');
        $colorNum2 = filter_input(INPUT_POST, 'colores2');
        $colorNum3 = filter_input(INPUT_POST, 'colores3');
        $colorNum4 = filter_input(INPUT_POST, 'colores4');
        $all_jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];
        $jugada = new Jugada($colorNum1, $colorNum2, $colorNum3, $colorNum4);
        $jugadaMsj = "<p id='campo1'><br />Jugada actual:<br/>1Color:" . $jugada->getArrayJugada()[0] . "<br />"
                . "2Color:" . $jugada->getArrayJugada()[1] . "<br />"
                . "3Color:" . $jugada->getArrayJugada()[2] . "<br />"
                . "4Color:" . $jugada->getArrayJugada()[3] . "<br /></p>";
        $all_jugadas[] = $jugada;
        $_SESSION['jugadas'] = serialize($all_jugadas);
        $jugadaMsjJuego = "<p id='campo1'><span>Jugada actual</span>:<br/>1Color:" . $jugada->getArrayJugada()[0] . "<br />"
                . "2Color:" . $jugada->getArrayJugada()[1] . "<br />"
                . "3Color:" . $jugada->getArrayJugada()[2] . "<br />"
                . "4Color:" . $jugada->getArrayJugada()[3] . "<br /></p>";
        $coloresClaveMsjJuego = "<p id='campo2'><span>Clave Juego</span><br/>1Color:" . $clave->getClaveColores()[0] . "<br />"
                . "2Color:" . $clave->getClaveColores()[1] . "<br />"
                . "3Color:" . $clave->getClaveColores()[2] . "<br />"
                . "4Color:" . $clave->getClaveColores()[3] . "<br /></p>";
        $jugada->comprobarAciertos($clave);
        $msjResultado = "<p id='campoResultado' style='color:red'><br />Has acertado ".$jugada->getCol() . " colores y has acertado " .$jugada->getPos()." posiciones</p>";
        break;
    case 'Reiniciar':
        session_destroy();
        header("Location:index.php");
        break;
    default :
        break;
}
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
        <title></title>
        <style>
            #campo1{
                float:left;
            }
            #campo2{
                float:right;
            }
            span{
                color: red;
            }
            #campoResultado{
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <form action="jugar.php" method="POST">
            <fieldset id="juego">
                <legend>Juego</legend>
                <input type="submit" value="Mostrar" name="submit">
                <input type="submit" value="Ocultar" name="submit">
                <input type="submit" value="Reiniciar" name="submit">
                <?= $coloresClaveMsj ?>
            </fieldset>
            <fieldset id="clavesJugador">
                <legend>Clave</legend>
                <select name="colores1">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Violeta</option>
                    <option>Verde</option>
                    <option>Marron</option>
                    <option>Rosa</option>
                    <option>Amarillo</option>
                </select>
                <select name="colores2">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Violeta</option>
                    <option>Verde</option>
                    <option>Marron</option>
                    <option>Rosa</option>
                    <option>Amarillo</option>
                </select>
                <select name="colores3">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Violeta</option>
                    <option>Verde</option>
                    <option>Marron</option>
                    <option>Rosa</option>
                    <option>Amarillo</option>
                </select>
                <select name="colores4">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Violeta</option>
                    <option>Verde</option>
                    <option>Marron</option>
                    <option>Rosa</option>
                    <option>Amarillo</option>
                </select>
                <?= $jugadaMsj ?>
                <input type="submit" value="Jugada" name="submit">
            </fieldset>
            <fieldset id="jugadas">
                <legend>Plantilla</legend>
                <?= $jugadaMsjJuego ?>
                <?= $coloresClaveMsjJuego ?>
                <?=$msjResultado?>
            </fieldset>
        </form>
    </body>
</html>
