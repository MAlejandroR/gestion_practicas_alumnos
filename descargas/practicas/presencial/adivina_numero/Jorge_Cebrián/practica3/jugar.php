<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function jugar(&$generado, &$max, &$min, &$intentos, &$intentosMaximo,&$numeroAdivinar) {
    switch ($_POST['numero']) {
        case 'Mayor':
            $max;
            $min = $generado;
            $generado = floor((($max - $min) / 2) + $min);
            $intentos++;
            break;
        case 'Menor':
            $max = $generado;
            $min;
            $generado = floor((($max - $min) / 2) + $min);
            $intentos++;
            break;
        case 'Igual':
            header("Location:fin.php?&intentos=$intentos&intentosMaximo=$intentosMaximo&num=$numeroAdivinar");
            exit();
            break;
        default:
    }
}

switch ($_POST['submit']) {
    case 'Empezar'://vengo del index
    case 'Reiniciar':
        switch ($_POST['intervalo']) {
            case '1-1.024':
                $numeroAdivinar = 300;
                $valorMin = 1;
                $valorMax = 1024;
                $numProgram = floor((($valorMax - $valorMin) / 2) + $valorMin);
                $intentosMaximo = 10;
                $intentos = 0;
                break;
            case '1-65.536':
                $numeroAdivinar = 7302;
                $valorMin = 1;
                $valorMax = 65536;
                $numProgram = floor((($valorMax - $valorMin) / 2) + $valorMin);
                $intentosMaximo = 15;
                $intentos = 0;
                break;
            case '1-1.048.536':
                $numeroAdivinar = 240999;
                $valorMin = 1;
                $valorMax = 1048536;
                $numProgram = floor((($valorMax - $valorMin) / 2) + $valorMin);
                $intentosMaximo = 20;
                $intentos = 0;
                break;
            default:
        }
        break;
    case 'Jugar': //He presiondo jugar en jugar.php
        $numProgram = filter_input(INPUT_POST, 'numProgram');
        $valorMax = filter_input(INPUT_POST, 'valorMax');
        $valorMin = filter_input(INPUT_POST, 'valorMin');
        $intentosMaximo = filter_input(INPUT_POST, 'intentosMaximo');
        $intentos = filter_input(INPUT_POST, 'intentos');
        $numeroAdivinar = filter_input(INPUT_POST, 'numeroAdivinar');
        jugar($numProgram, $valorMax, $valorMin, $intentos,$intentosMaximo, $numeroAdivinar);
        break;
    case 'Volver':
        header("Location:index.php");
        break;
    default: //han escrito la url directamente y no quiero...
        header("Refresh:1;url=index.php");
    //$msj = "Debes  hacer las cosas bien";
}
if ($intentos > $intentosMaximo) {
    header("Location:fin.php?&intentos=$intentos&intentosMaximo=$intentosMaximo&num=$numeroAdivinar");
    exit();
}
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            body{
                background-color: #c65e55;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <form form action="jugar.php" method="POST">
            <fieldset>
                <legend>Empieza el juego</legend>
                El numero es: <input type="hidden" name="numProgram" value = '<?= $numProgram ?>'/><?= $numProgram ?>
                <input type="hidden" name="valorMax" value = '<?= $valorMax ?>'/>
                <input type="hidden" name="valorMin" value = '<?= $valorMin ?>'/>
                Jugada <input type="hidden" name="intentos" value = '<?= $intentos ?>' /><?= $intentos ?>?
                (IntentosMaximo:<input type="hidden" name="intentosMaximo" value = '<?= $intentosMaximo ?>' /><?= $intentosMaximo ?>)
                <input type="hidden" name="numeroAdivinar" value = '<?= $numeroAdivinar ?>' />
                <input type="hidden" name="intervalo" value = '<?= $_POST['intervalo'] ?>' />
                <fieldset>
                    <legend>Indica cómo es el número qué has pensado</legend>
                    <ul>
                        <input type="radio" value="Mayor" name="numero">Mayor<br>
                        <input type="radio" value="Menor" name="numero">Menor<br>
                        <input type="radio" value="Igual" name="numero">Igual<br>
                    </ul>
                </fieldset>
                <hr />
                <input type="submit" value="Jugar" name="submit">
                <input type="submit" value="Reiniciar" name="submit">
                <input type="submit" value="Volver" name="submit">
            </fieldset>
        </form>
    </body>
</html>
