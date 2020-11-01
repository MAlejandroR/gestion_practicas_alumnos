<?php
$a = 125;
$b = 0274;
$c = 0xABC12;
$d = 0b1100;
$e = "Esto es una cadena de caracteres";
$f = 'Esto es otra cadena de caracteres';
$g = <<<EOD
        Esto es una cadena
        multilínea
        y termina aquí.
EOD;
$h = <<<EOD
        <pre>
        Esto es una cadena
        multilínea
        y termina aquí.
        </pre>
EOD;
$i = 1.23432230003322014000002234101;
$j = 1234E-2;
$k = null;
$l = true;
$m = false;
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Valores Asignados</th>
                    <th>Mostrando Valores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$a = 125</td>
                    <td><?php printf("Variable <b>decimal</b>: %d", $a) ?></td>
                </tr>
                <tr>
                    <td>$b = 0274</td>
                    <td><?php printf("Variable <b>octal</b><br/>Valor <b>decimal</b>: %d<br />Valor <b>octal</b>: %o", $b, $b) ?></td>
                </tr>
                <tr>
                    <td>$c=0xABC12</td>
                    <td><?php printf("Variable <b>hexadecimal</b><br/>Valor <b>decimal</b>: %d<br />Valor <b>hexadecimal</b>: %X", $c, $c) ?></td>
                </tr>
                <tr>
                    <td>$d = 0b1100</td>
                    <td><?php printf("Variable <b>binaria</b><br/>Valor <b>decimal</b>: %d<br />Valor <b>binario</b>: %b", $d, $d) ?></td>
                </tr>
                <tr>
                    <td>$i = 1.23432230003322014000002234101</td>
                    <td><?php printf("Variable <b>float</b><br/>Valor: %.15f<br />Notación <b>científica</b>: %e", $i, $i) ?></td>
                </tr>
                <tr>
                    <td>$j = 1234E-2;</td>
                    <td><?php printf("Variable <b>float</b><br/>Valor: %.2f<br />Notación <b>científica</b>: %e", $j, $j) ?></td>
                </tr>
                <tr>
                    <td>$k = null;</td>
                    <td><?php printf("Variable <b>null</b> es: %S<br/>Y en cadena es: <b>%s</b>", $k, is_null($k) ? "null" : "not null") ?></td>
                </tr>
                <tr>
                    <td>$l = true</td>
                    <td><?php printf("Variable <b>boolean</b><br>Valor: %d <br>Y en <b>string</b>: <b>%s</b>", $l, ($l) ? "true" : "false") ?></td>
                </tr>
                <tr>
                    <td>$m = false;</td>
                    <td><?php printf("Variable <b>boolean</b><br>Valor: %d <br>Y en <b>string</b>: <b>%s</b>", $m, ($m) ? "true" : "false") ?></td>
                </tr>
                <tr>
                    <td>$e = "Esto es una cadena de caracteres"</td>
                    <td><?php printf("Variable <b>String</b></br>%s", $e) ?></td>
                </tr>

                <tr>
                    <td>$f = 'Esto es otra cadena de caracteres';</td>
                    <td><?php printf("Variable <b>String</b></br>%s", $f) ?></td>
                </tr>
                <tr>
                    <td>$g = &LT;&LT;&LT;EOD
                        Esto es una cadena<br>
                        multilínea<br>
                        y termina aquí<br>
                        EOD;</td>
                    <td><?php printf("Variable <b>String<b><br />%s", $g); ?></td>
                </tr>
                <tr>
                    <td>$h = &LT;&LT;&LT;EOD
                        &lt;pre>
                        <pre>
                        Esto es una cadena
                        multilínea
                        y termina aquí.
                        </pre>
                        &lt;pre>
                        EOD;
                    <td><?php printf("Variable <b>String<b><br />%s", $h); ?></td>
                </tr>
            </tbody>
        </table>


        <?php header("refresh:5; url=index.php") ?>

    </body>
</html>
