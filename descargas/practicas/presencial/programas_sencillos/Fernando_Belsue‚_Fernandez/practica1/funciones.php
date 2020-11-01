<?php
    $titulo = "funcionesPhp";
    $num1 = 2;
    $num2 = 6;
    
    function duplicaValores(&$num1, $num2){
        global $num2;
        $num1 = $num1 * 2;
        $num2 = $num2 * 2;
        if ($num1 > $num2) {
            return $num1;
        }else{
            return $num2;
        }
    }
?>
<html>
    <head>
        <title><?php echo $titulo; ?></title>
    </head>
    <body>
        <p>El valor de la variable $num1 es <?php echo $num1?></p>
        <p>El valor de la variable $num2 es <?php echo $num2?></p>
        <p>El valor devuelto por la función "duplicaValores" es <?php echo duplicaValores($num1, $num2);?></p>
        <p>El valor de la variable $num1 después de invocar a la función es <?php echo $num1?> porque ha sido pasado por referencia</p>
        <p>El valor de la variable $num2 después de invocar a la función es <?php echo $num2?>, (el mismo valor).</p>
        <p>En caso de declarar una variable golbal dentro de la función, la variable $num2 pasar a hacer referencia a la variable declarada en el ámbito global</p>
    </body>
</html>

