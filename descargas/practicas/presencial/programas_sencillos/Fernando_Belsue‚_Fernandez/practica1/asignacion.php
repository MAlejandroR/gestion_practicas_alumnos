<?php

define (numero, 26);
define (cadena, "Hola qué tal");
define (hexadecimal, dechex(26));
define (binario, decbin(26));
$num = 26;
$texto = "jashdoa";
$funcion = print("");
$asignacion = $variable = $num;

?>
<html>
    <head>
        <title>asignacionPhp</title>
        <meta http-equiv="refresh" content="5;URL=index.php">
    </head>
    <body>
        <p>EL valor de la constante numero es: <?php echo numero?></p>
        <p>EL valor de la constante cadena es: <?php echo cadena?></p>
        <p>EL valor de la contante hexadecimal es: <?php echo hexadecimal?></p>
        <p>El valor de la constante binario es <?php echo binario?></p>
        <p>EL valor de $num es: <?php echo $num?></p>
        <p>EL valor de $texto es: <?php echo $texto?></p>
        <p>EL valor de $funcion es: <?php echo $funcion?></p>
        <p>El valor de $asignacion es: <?php echo $asignacion?></p>
        <br />
        <br />
        <p>EL valor de $variable irá cambiando con las asignaciones:</p>
        <p>Le asigno el valor de la constante numero.<?php $variable = numero;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor de la constante cadena.<?php $variable = cadena;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor de la constante hexadecimal.<?php $variable = hexadecimal;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor de la constante binario.<?php $variable = binario;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor de la expresión num.<?php $variable = $num;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor que devuelve la función print.<?php $variable = $funcion;?> Su valor es <?php echo $variable?></p>
        <p>Ahora le asigno el valor de una asignacion.<?php $variable = $asignacion;?> Su valor es <?php echo $variable?></p>
    </body>
</html>


