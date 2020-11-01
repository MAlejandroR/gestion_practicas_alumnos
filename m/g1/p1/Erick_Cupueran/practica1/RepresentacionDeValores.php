<?php
//Valor $dec en la asignación $dec=125 es 125
//Valor $bin en la asignación $bin =0b1100111 es 125
//Valor $oct en la asignación $oct=0447 es 125
//Valor $hex en la asignación $hex=0xFFA1 es 125
//decimal a ..:
$dec = 125;
$bin = 0b1100111;
$oct = 0447;
$hex = 0xFFA1;

header("Refresh:2;url=http://localhost/practica1/index.php");
?>


<html>
    <head>

        <title>Valores</title>
    </head>
    <body>
        <h1>
            Valor 125
            Valor $bin en la asignación 125 en bin <?php echo "es: " . decbin($dec) ?><br/>
            Valor $oct en la asignación 125 en oct <?php echo "es: " . decoct($dec) ?><br/>
            Valor $hex en la asignación e125 en hex<?php echo "es: " . dechex($dec) ?><br/>
            <hr/>
            Valor 0b1100111
            Valor $bin en la asignación 125 en bin <?php echo "es: " . decbin($bin) ?><br/>
            Valor $oct en la asignación 125 en oct <?php echo "es: " . decoct($bin) ?><br/>
            Valor $hex en la asignación e125 en hex<?php echo "es: " . dechex($bin) ?><br/>
            <hr/>
            Valor 0447
            Valor $bin en la asignación 125 en bin <?php echo "es: " . decbin($oct) ?><br/>
            Valor $oct en la asignación 125 en oct <?php echo "es: " . decoct($oct) ?><br/>
            Valor $hex en la asignación e125 en hex<?php echo "es: " . dechex($oct) ?><br/>
            <hr/>
            Valor 0xFFA1
            Valor $bin en la asignación 125 en bin <?php echo "es: " . decbin($hex) ?><br/>
            Valor $oct en la asignación 125 en oct <?php echo "es: " . decoct($hex) ?><br/>
            Valor $hex en la asignación e125 en hex<?php echo "es: " . dechex($hex) ?><br/>
        </h1>

    </body>
</html>

