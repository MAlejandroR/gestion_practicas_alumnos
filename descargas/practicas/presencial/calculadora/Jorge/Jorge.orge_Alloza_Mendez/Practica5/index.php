<?php
//función que detecta automáticamente las clases
spl_autoload_register(function($class) {
    require "$class.php";
});
//variable del mensaje
$msjError="";
//variable para almacenar los datos en un array
$array = [];
//variable que recibe lo escrito en el campo de texto
$expresion = filter_input(INPUT_POST, "expresion");
//variable que almacena el valor del submit
$calc = filter_input(INPUT_POST, 'calcular');
//si se ha pulsado el submit entro
if (isset($calc)) {
    //si el área de texto está vacía muestro mensaje
    if (empty($expresion)) {
        $msjError = "Intoduce una operación";
    } else {
        //si no guardo el objeto en una variable
        $operacion = Operacion::valida($expresion);
        //en el caso de que sea nula muestro mensaje
        if ($operacion == null) {
            $msjError = "Los datos introducidos no son validos";
            //y si no
        } else {
            //guardo en una variable el resultado de operar
            $resul = $operacion->operar();
            //y asigno valores dentro del array según corresponda
            $array = [
            'Concepto' => 'Valores',
            'Número 1' => $operacion->getNum1(),
            'Número 2' => $operacion->getNum2(),
            'Operador' => $operacion->getOperador(),
            'Tipo'=> $operacion->getTipo(),
            'Resultado' => $resul
        ];          
        }
    }
}
//creo el código html de la tabla para mostrar el resultado
$html = "<table style='float: right; display: inline-block; background-color: palegreen;'>";
foreach ($array as $concepto => $valor){
    $html .= "<tr>"
            . "<td style='border: solid 1px black; padding: 5px;'> $concepto </td>"
            . "<td style='border: solid 1px black; padding: 5px;'> $valor </td>"
            . " </tr>";
}
$html .= "</html>";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica5</title>
    </head>
    <body>
        <!-- Primer fieldset con las condiciones-->
        <fieldset style="background-color: powderblue; border: solid 2px black; width: 50%; 
                  display: inline-block; float: left;">
            <legend><h2 style="color: coral;">Reglas de uso de la calculadora</h2></legend>
            La calculadora se usa esctibiendo una operación. <br>
            La operación será <b>Operando_1 operación Operando_2</b><br>
            Cada operando puede ser número <b> real o racional </b><br>
            Real p.e. <b>5</b> o <b>5.12</b> Racional p.e <b>6/3 o 7/1</b> <br>
            Los operadores reales permitidos son <b>+ - * /</b><br>
            Los operadores racionales permitidos son <b>+ - * :</b><br>
            No se deben dejar espacios en blanco entre operandos y operación<br>
            Si un operando es real y el otro es racional se considera operación racional<br>
            Ejemplo(Real) <b>5.1+4</b> (Racional)<b>5/1:2</b> (Error) <b>5.2+5/1</b> (Error) <b>52214+</b><br>    
        </fieldset>
        <!-- Segundo fieldset dentro de un formulario-->
        <form action="index.php" method="POST">
            <fieldset style="background-color: lemonchiffon; border: solid 2px black; width: 35%; 
                  display: inline-block; float: right;">
                <legend><h2 style="color: seagreen;"> Establece la operación</h2></legend>   
                <br>
                Operación <input type="text" name="expresion"> <input type="submit" name="calcular" value="Calcular">
                <br><br><br>
                <!-- Escribo la tabla y el mensaje de error, si tienen valor se muestran-->
                <?php 
                    echo $html;
                    if ($msjError != "") {
                        echo $msjError;
                    }
                    
                ?>
            </fieldset>
        </form>
        
    </body>
</html>
