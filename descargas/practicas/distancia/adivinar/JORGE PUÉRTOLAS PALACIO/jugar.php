<?php

$min = 0;
$max = 0;
$intentos;
$jugado;
$intervalo;
if ($_REQUEST["btn"] == "Comenzar" || $_REQUEST["btn"] == "Reiniciar") {
    $intervalo = $_REQUEST["rdb"];
    $jugado = 1;
    if ($_REQUEST["rdb"] == "intervalo1") {
        $min = 1;
        $max = 10;
        $intentos = 5;
    } else if ($_REQUEST["rdb"] == "intervalo2") {
        $min = 1;
        $max = 100;
        $intentos = 15;
    } else if ($_REQUEST["rdb"] == "intervalo3") {
        $min = 1;
        $max = 1000;
        $intentos = 35;
    }
} else if ($_REQUEST["btn"] == "Volver") {
    header("Location: /practica3/index.php");
} else {
    $intervalo = $_REQUEST["rdb"];
    $intentos = $_REQUEST["intento"] - 1;
    $jugado = $_REQUEST["jug"] + 1;
    if ($intentos > 0) {
        if ($_REQUEST["rdb1"] == "mayor") {
            $min = $_REQUEST["num"];
            $max = $_REQUEST["max"];
        } else if ($_REQUEST["rdb1"] == "menor") {
            $min = $_REQUEST["min"];
            $max = $_REQUEST["num"];
        } else if ($_REQUEST["rdb1"] == "igual") {
            $msg = 'Gane la partida';
            header("Location: /practica3/fin.php?ms=$msg");
        }
    } else {
        $msg = 'Perdi la partida';
        header("Location: /practica3/fin.php?ms=$msg");
    }

    if ($max == $min) {
        $msg = 'Gane la partida, porque el maximo y el minimo son el mismo';
        header("Location: /practica3/fin.php?ms=$msg");
    }
}
$numero = rand($min, $max);

echo '<h1>el numero es ' . $numero . '</h1>';
echo 'jugada ' . $jugado . ' quedan ' . $intentos . ' intentos';
echo '<br></br>';
echo 'Indica como es el numero que has pensado';

echo '<form action="jugar.php" method="POST">';
echo '<input type="radio" name="rdb1" value="mayor" checked><label>Mayor</label>';
echo '<br></br>';
echo '<input type="radio" name="rdb1" value="menor"><label>Menor</label>';
echo '<br></br>';
echo '<input type="radio" name="rdb1" value="igual"><label>Igual</label>';
echo '<br></br>';
echo '<input type="submit" name="btn" value="Jugar">';
echo '<input type="submit" name="btn" value="Volver">';
echo '<input type="submit" name="btn" value="Reiniciar">';
echo '<input type="hidden" name="min" value=' . $min . '>';
echo '<input type="hidden" name="max" value=' . $max . '>';
echo '<input type="hidden" name="num" value=' . $numero . '>';
echo '<input type="hidden" name="rdb" value=' . $intervalo . '>';
echo '<input type="hidden" name="intento" value=' . $intentos . '>';
echo '<input type="hidden" name="jug" value=' . $jugado . '>';
echo '</form>';

?>