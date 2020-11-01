<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Variables en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <table border=1>
            <tr>
                <td><b>Valores asignados</b></td>
                <td><b>Mostrando valores</b></td>
            </tr>
            <?php header("Refresh:5; url=index.php");
            $v = 125;
            ?><tr>
                <td>$v=125</td>
                <td>Variable <b>decimal</b>, valor -<?php print($v) ?>-</td>
            </tr>
            <?php $v = 0274;
            ?><tr>
                <td>$v=0274</td>
                <td>Variable <b>octal</b>, valor <b>decimal</b> -<?php print($v) ?>- y en <b>octal</b> -<?php printf("%o", $v) ?>- </td>
            </tr>
            <?php $v = 0xABC12;
            ?><tr>
                <td>$v = 0xABC12</td>
                <td>Variable <b>hexadecimal</b>, valor <b>decimal</b> -<?php print($v) ?>- y en <b>hexadecimal</b> -<?php printf("%x", $v) ?>- </td>
            </tr>
            <?php $v = 0b1100;
            ?><tr>
                <td>$v=0b1100</td>
                <td>Variable <b>binaria</b>, valor <b>decimal</b> -<?php print($v) ?>- y en <b>binario</b> -<?php printf("%b", $v) ?>- </td>
            </tr>
            <?php $v = 1.2343223000332;
            ?><tr>
                <td>$v=1.2343223000332</td>
                <td>Variable <b>float</b>, valor -<?php print($v) ?>- y en <b>notación científica</b> -<?php printf("%e", $v) ?>- </td>
            </tr>
            <?php $v = 1.234000e+1;
            ?><tr>
                <td>$v=1.234000e+1</td>
                <td>Variable <b>float</b>, valor -<?php printf("%.2f", $v) ?>- y en <b>notación científica</b> -<?php printf("%e", $v) ?>- </td>
            </tr>
            <?php $v = null;
            ?><tr>
                <td>$v=null</td>
                <td>Variable <b>null</b> es -<?php print($v) ?>- y en <b>string</b> -<?php print("null") ?>- </td>
            </tr>
            <?php $v = true;
            ?><tr>
                <td>$v=true</td>
                <td>Variable <b>boolean</b> es -<?php print($v) ?>- y en <b>string</b> es -<?php print("true") ?>- </td>
            </tr>
            <?php $v = false;
            ?><tr>
                <td>$v=false</td>
                <td>Variable <b>boolean</b> es -<?php print($v) ?>- y en <b>string</b> es -<?php print("false") ?>- </td>
            </tr>
            <?php $v = "Esto es una cadena de caracteres";
            ?><tr>
                <td>$v = "Esto es una cadena de caracteres"</td>
                <td>Variable <b>string</b>, valor -<?php print($v) ?>-</td>
            </tr>
            <?php $v = 'Esto es una cadena de caracteres';
            ?><tr>
                <td>$v = 'Esto es una cadena de caracteres'</td>
                <td>Variable <b>string</b>, valor -<?php print($v) ?>-</td>
            </tr>
            <?php $v = <<< FIN
                    
Esto que ves,
 es una cadena
multilínea
y termina aquí
                    
FIN;
            ?><tr>
                <td>$v =<<< FIN<br/><br/>
                    Esto que ves,<br/>
                    es una cadena<br/>
                    multilínea<br/>
                    y termina aquí<br/><br/>
                    FIN;<br/></td>
                <td>Variable <b>string</b>, valor -<?php print($v) ?>-</td>
            </tr>
            <?php $v = <<< FIN
<pre>

Esto que ves,
 es una cadena
multilínea
y termina aquí

</pre>
FIN;
            ?><tr>
                <td>$v=<<< FIN
                    <pre>

Esto que ves,
 es una cadena
multilínea
y termina aquí

                    </pre>
                    FIN;</td>
                <td>Variable <b>string</b>, valor -<?php print($v) ?>-</td>
            </tr>
        </table>
        <br/><br/><a href="index.php">Volver</a>
    </body>
</html>
