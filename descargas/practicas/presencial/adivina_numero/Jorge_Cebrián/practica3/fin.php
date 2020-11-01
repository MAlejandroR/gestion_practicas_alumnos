<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
switch ($_POST['submit']) {
    case 'Volver al index':
        header("Location:index.php");
        break;
    default :
}
$intentos = filter_input(INPUT_GET, 'intentos');
$intentosMaximo = filter_input(INPUT_GET, 'intentosMaximo');
$num = filter_input(INPUT_GET, 'num');
if ($intentos < $intentosMaximo) {
    $msj = "FELICIDADES!!! Lo has acertado en $intentos intentos $intentosMaximo<br />";
} else {
    $msj = "Has fallado y deberías de haberlo adivinado hace rato  Intentos: $intentos Max:$intentosMaximo<br />";
}
$msj .= " El número a adivinar era $num";
?>
<!doctype html>
<html lang="en">
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
        <form form action="fin.php" method="POST">
        <fieldset>
            <legend>Fin.php</legend>
            <h2><?= $msj ?></h2>
        </fieldset>
        <input type="submit" value="Volver al index" name="submit">
        </form>
    </body>
</html>