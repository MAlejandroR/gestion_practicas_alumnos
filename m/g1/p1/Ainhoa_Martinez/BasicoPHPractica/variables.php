<?php
$ent = 250;
$o = 724;
$h = 0xABC12;
$b = 0b1100;
$cadena1 = "Esto es una cadena de caracteres";
$cadena2 = 'Esto es otra cadena de caracteres';
$cadenaHeredoc = <<<FIN
        Esto es una cadena
        multilinea
        y termina aqui
FIN;

$cadenaNowdoc = <<<'FIN'
        <pre>
        Esto es una cadena
        multilinea
        y termina aqui
        </pre>
FIN;

$numR = 1.2343223000332;
$numCientif = 1234E-2;
$n = null;
$varBool1 = true;
$varBool2 = false;

$oct = octdec($o);
$hex = hexdec($h);
$bin = bindec($b);


header("Refresh:5;url=http://localhost/BasicoPHPractica/index.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Variables</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Mostrando variables</h3></div>
            <div class="parrafo"><strong>Valores asignados</strong> son las asignaciones realizadas en el programa php</div>
            <div class="parrafo"><strong>Mostrando valores</strong> muestra el valor de la variable y el valor convertido a la respresentación deseada</div>
        </div>
        <div id="variables">
            <h1>Variables en PHP</h1>
            <table>
                <tr>
                    <th>Valores Asignados</th>
                    <th>Mostrando Valores</th>
                </tr>

                <tr>
                    <td>$va=250</td> 
                    <td>Variable <strong>decimal</strong>, valor <span class="variable"><?php print $ent?></span></td>
                </tr>
                <tr>
                    <td>$va=724</td>
                    <td> Variable <strong>octal</strong>, valor <strong>decimal </strong><span class="variable"><?php print $oct?></span> y en <strong>octal</strong> <span class="variable"><?php print $o?></span>
                </tr>
                <tr>
                    <td>$va=0xABC12</td>
                    <td>Variable <strong>hexadecimal</strong>,valor <strong>decimal </strong> <span class="variable"><?php print $hex?></span> y en <strong>hexadecimal</strong>  <span class="variable"><?php print $h?></span></td>
                </tr>
                <tr>
                    <td>$va=01100</td>
                    <td>Variable <strong>binaria</strong>, valor <strong>decimal </strong> <span class="variable"><?php print $bin?></span> y en <strong>binario</strong>  <span class="variable"><?php print $b?></span></td>
                </tr>
                <tr>
                    <td>$va=1.2343223000332</td>
                    <td>Variable <strong>float</strong>,valor  <span class="variable"><?php print $numR ?></span></td>
                </tr>
                <tr>
                    <td>$va=1234E-2</td>
                    <td>Variable <strong>float</strong>,valor <span class="variable"><?php print $numCientif ?></span></td>
                </tr>
                <tr>
                    <td>$va=null</td>
                    <td>Variable <strong>null</strong>  es <span class="variable"><?php print $n . "--"?></span> y en string es<span class="variable"> null<span> </td>
                </tr>
                <tr>
                    <td>$va=true</td>
                    <td>Variable <strong>boolean</strong>,valor <span class="variable"><?php print $varBool1 ?></span> y en string es <span class="variable">true</span></td>
                </tr>
                <tr>
                    <td>$va=false</td>
                    <td>Variable <strong>boolean</strong>,valor <span class="variable"><?php print $varBool2 . "--" ?></span> y en string es <span class="variable">false</span></td>
                </tr>
                <tr>
                    <td>$va="Esto es una cadena de caracteres"</td>
                    <td>Variable <strong>string</strong>, valor  <span class="variable"><?php print $cadena1 ?></span></td>
                </tr>
                <tr>
                    <td>$va='Esto es una cadena de caracteres'</td>
                    <td>Variable <strong>string</strong>, valor  <span class="variable"><?php print $cadena2 ?></span></td>
                </tr>
                <tr>
                    <td>$va=<<< FIN <pre>Esto que ves, 
                        es una cadena
                        multilínea
                        y termina aquí</pre> FIN;</td>
                    <td>Variable <strong>string</strong>, valor  <span class="variable"><?php print $cadenaHeredoc ?></span></td>
                </tr>
                <tr>
                    <td>$v=<<< 'FIN'<br /> &lt;pre&gt;<pre>Esto que ves, 
 es una cadena
multilínea
y termina aquí</pre>&lt;/pre&gt;<br /> FIN;</td>
                    <td>Variable <strong>string</strong>, valor  <span class="variable"><pre><?php print $cadenaNowdoc ?></pre></span></td>
                </tr>
            </table>
        </div>
                            <div id="volver">
                                <form action="index.php" method="POST">
                                    <input type="submit" value="Volver" name="submit">
                                </form>
                            </div>
                            </body>
                            </html>