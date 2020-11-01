<?php
$dec = 19;
$oct = 0134;
$hex = 0xADD12;
$bin = 0b11101;
$cad1 = "esto es una cadena con comillas dobles";
$cad2 = 'esto es una cadena con comillas simples';
$text2 = <<<FIN
            <pre>
        Esto que ves, 
        es una cadena
        multilínea
        y termina aquí
        
            </pre>
FIN;
$text = <<<FIN
        Esto que ves, 
        es una cadena
        multilínea
        y termina aquí                  
FIN;
$num = 123443214.23142;
$numreducido = 1.2344321423142e3;
$null = null;
$true = true;
$false = false;
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
        <title>Practica1 - Variables</title>
        <link rel="stylesheet" href="estilos.css" type="text/css" />
        <meta http-equiv="refresh" content="5;URL=index.php">
    </head>
    <body>

        <div id="enunciado"> 
            <div id="interior">   
                <h4>Mostrando variables</h4>
                <p>
                    Valores asignados son los asignaciones realizadas en el programa php
                    Mostrando valores muestra el valor de la variable y el valor visualizado con la representación deseada
                </p>
            </div>
            <div id="volver">       
                <a href="index.php">Volver</a>
            </div>    
        </div>
        <div id="contenido">
            <h1>
                Variables en PHP
            </h1>
            <table align="center">
                <th>
                    Valores Asigandos
                </th>
                <th>
                    Mostrando Valores
                </th>
                <tr>
                    <td><?php print ("\$dec = $dec") ?></td>
                    <td> Variable <b>decimal</b> valor: <?php print ($dec) ?></td>
                </tr>
                <tr>
                    <td><?php print("\$oct = $oct") ?></td>
                    <td>Valor <b>decimal</b> valor: <?php print($oct) ?>, 
                        valor <b>octal</b> valor: <?php print(decoct($oct)); ?></td>
                </tr>
                <tr>
                    <td><?php print("\$hex = $hex")?></td>
                    <td>Valor <b>decimal</b> valor: <?php print($hex) ?>, 
                        valor <b>hexadecimal</b> valor: <?php echo dechex($hex);?> </td>
                </tr>
                <tr>
                    <td><?php print("\$bin = $bin") ?></td>
                    <td> Valor <b>decimal</b> valor: <?php print($bin) ?>, 
                        valor <b>binario</b> valor: <?php print(decbin($bin)); ?></td>
                </tr>   
                <tr>
                    <td><?php print("\$num = $num") ?></td>
                    <td>Valor <b>decimal</b> valor: <?php print($num) ?>, 
                        valor en <b>notación cientifica</b> valor: <?php printf("%E",$num); ?></td>
                </tr>  
                <tr>
                    <td><?php print("\$null = ".print($null)) ?></td>
                    <td>Valor de la variable <b>$null</b>: -<?php print($null) ?>-, valor como string<?php print(" null") ?></td>
                </tr>
                <tr>
                    <td><?php print("\$true = ") .print($true)?></td>
                    <td>Valor de la  variable <b>$null</b>: -<?php print($true) ?>-, valor como string<?php print(" true") ?></td>
                </tr>
                <tr>
                    <td><?php echo "\$false = $false" ?></td>
                    <td>Valor de la  variable <b>$false</b>: -<?php print($false) ?>-, valor como string<?php print( " false") ?></td>
                </tr>

                <tr>
                    <td><?php print("\$cad1 = ".'"'."$cad1".'"') ?></td>
                    <td>Valor del <b>string</b>, valor: <?php print( $cad1 )?></td>
                </tr>
                <tr>
                    <td><?php print("\$cad2 = '$cad2'") ?></td>
                    <td>Valor del <b>string</b>, valor: <?php print( $cad2) ?></td>
                </tr>
                <tr>
                    <td><?php print( "\$text = $text") ?></td>
                    <td>Valor del <b>string</b>, valor: <?php print($text) ?></td>
                </tr>
                <tr>
                    <td><?php print( "\$text2 = $text2" )?></td>
                    <td>Valor del <b>string</b>, valor: <?php print( $text2 )?></td>
                </tr>
                 
            </table>
        </div>
       
    </body>
</html>

