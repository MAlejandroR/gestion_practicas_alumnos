<?php
$v1 = 125;
$v2 = 0274;
$v3 = 0xABC12;
$v4 = "01100";
$v5 = 1.2343223000332;
$v6 = 1.234000e+1;
$v7 = null;
$v8 = true;
$v9 = false;
$v11 = 'Esto es una cadena de caracteres';
$v12 = <<< FIN
                    Esto que ves, 
                    es una cadena
                    multilínea
                    y termina aquí
FIN;
$v13 = <<< FIN
                    <pre>
Esto que ves, 
 es una cadena
multilínea
y termina aquí
                    </pre>
FIN;
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Valores Asignados</th>
                <th>Mostrando Valores</th>
            </tr>

            <tr>
                <td> $v1=125 </td> 
                <td><?php echo "variable: " . gettype($v1) . " valor: " . $v1 ?></td>
            </tr>

            <tr>
                <td> $v2=0274</td> 
                <td>Variable octal, valor decimal <?php print_r($v2) ?> y en octal <?php print_r(decoct($v2)) ?></td>
            </tr>
            <tr>
                <td> $v3=0xABC12</td> 
                <td>Variable hexadecimal, valor decimal <?php print_r($v3) ?> y en hexadecimal <?php print_r(dechex($v3)) ?></td>
            </tr>
            <tr>
                <td>  $v4=01100</td> 
                <td>Variable binaria, valor en decimal <?php print_r(bindec($v4)) ?> y en binario  <?php print_r(decbin($v4)) ?> </td>
            </tr>
            <tr>
                <td> $v5=1.2343223000332 </td> 
                <td>Variable float valor <?php print_r($v5) ?> y en notacion cientifica es <?php printf("%.6e", $v5) ?></td>
            </tr>
            <tr>
                <td> $v6=1.234000e+1 </td> 
                <td>Variable float valor <?php print_r($v6) ?> y en notacion cientifica es <?php printf("%.6e", $v6) ?></td>
            </tr>
            <tr>
                <td> $v7=null </td> 
                <td> variable <?php echo  gettype($v7) ?> es  ,y en string es <?php echo ($v7) ?></td>
            </tr>
            <tr>
                <td> $v8=true </td> 
                <td>Variable boolean, valor <?php print_r($v8) ?> y en string <?php echo "$v8" ?></td>
            </tr>
            <tr>
                <td> $v9=false </td> 
                <td>Variable <?php print_r($v9) ?></td>
            </tr>
            <tr>
                <td> $v10="Esto es una cadena de caracteres" </td> 
                <td>Variable <?php print_r($v10) ?></td>
            </tr>
            <tr>
                <td> $v11='Esto es una cadena de caracteres' </td> 
                <td>Variable string <?php print_r($v11) ?></td>
            </tr>
            <tr>
                <td>$v12=<<< FIN
                    Esto que ves, 
                    es una cadena
                    multilínea
                    y termina aquí
                    FIN;
                </td> 
                <td>Variable string <?php echo($v12) ?></td>
            </tr>
            <tr>
                <td> $v13=<<< FIN
                    <pre>
Esto que ves, 
 es una cadena
multilínea
y termina aquí
                    </pre>
                    FIN;
                </td> 
                <td>Variable string <?php echo($v13) ?></td>
            </tr>

        </table>
        <?php header("refresh:5; url=index.php"); ?>
    </body>
</html>