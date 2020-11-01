<?php
//recibe por get el número de intentos, el número máximo de intentos
//y el número a adivinar
$numIntentos = filter_input(INPUT_GET, 'intentos');
$maxIntentos = filter_input(INPUT_GET, 'max_int');
$numJugador = filter_input(INPUT_GET, 'numJugador');
//si el num de intentos es mayor al máximo, muestra un mensaje aconsejando al jugador, 
//si no muestra los datos
if ($numIntentos > $maxIntentos) {
    $msj = "Eres un manta dedicate a la pentanca";
} else {
    $msj = "la máquina ha necesitado $numIntentos intentos de $maxIntentos posibles para adivinar el número $numJugador";
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: oldlace">
            <!-- le asigno una leyenda-->
            <legend><h1>Resultado</h1></legend>            
            <?php
            //muestra el mensaje
            echo $msj;
            ?>
        </fieldset>
    </body>
</html>

