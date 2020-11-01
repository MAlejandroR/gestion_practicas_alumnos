<?php

$edad=rand(1, 150);
switch($edad){
    case ($edad<=11):
        $msj="tienes $edad años, eres un niño.";
        break;
    case(($edad>=12)&&($edad<=17)):
        $msj="tienes $edad años, eres un adolescente.";
        break;
    case(($edad>=18)&&($edad<=35)):
        $msj="tienes $edad años, eres un joven.";
        break;
    case(($edad>=36)&&($edad<=65)):
        $msj="tienes $edad años, eres un adulto.";
        break;
    case(($edad>=66)&&($edad<=110)):
        $msj="tienes $edad años, eres un jubilado.";
        break;
    default:
        $msj="$edad. Edad no contemplada en nuestra encuesta";
        break;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo $msj;
        header("Refresh:2; url=index.php ");
        ?>
    </body>