<?php 
$v = 125;
$v1 = 0274;
$v1octal = decoct($v1);
$v2 = 0xABC12;
$v2hex = dechex($v2);
$v3 = 01100;
$v3bin = decbin($v3);
$v4 = 1.2343223000332;
$v5 = 1.234000e+1;
$v6 = null;
$v7 = true;
$v8 = false;
$v9 = "Esto es una cadena de caracteres";
$v10 = 'Esto es una cadena de caracteres';
$v11 = <<< FIN
                        Esto que ves, 
                        es una cadena
                        multilínea
                        y termina aquí
FIN;
$v12=<<< FIN
                        <pre>
                        Esto que ves, 
                        es una cadena
                        multilínea
                        y termina aquí
                        </pre>
FIN;
?>
<html>
    <body>
        <div class="solucion">
            <h1>Variables en PHP</h1>
            <table border="1">
                <tr>
                    <th>Valores Asignados</th>
                    <th>Mostrando Valores</th>
                </tr>
                <tr><td> $v = 125 </td><td>Variable decimal, valor <?php print_r($v) ?></td>
                <tr><td> $v = 0274 </td><td>Variable octal, valor decimal <?php print_r($v1) ?> y en octal <?php print_r($v1octal)?></td>
                <tr><td> $v = 0xABC12 </td><td>Variable hexadecimal, valor decimal <?php print_r($v2) ?> y en hexadecimal <?php print_r($v2hex)?></td>
                <tr><td> $v = 01100 </td><td>Variable binaria, valor decimal <?php print_r($v3) ?> y en binario <?php print_r($v3bin)?></td>
                <tr><td> $v = 1.2343223000332 </td><td>Variable float, valor <?php print_r($v4) ?> y en notacion cientifica <?php printf("%.6e",$v4)?></td>
                <tr><td> $v = 1.234000E+1 </td><td>Variable float, valor <?php print_r($v5) ?> y en notacion cientifica <?php printf("%.6e",$v5)?></td>
                <tr><td> $v = null </td><td>Variable null, es -<?php print_r($v6) ?> - y en string es <?php var_dump($v6) ?></td>
                <tr><td> $v = true </td><td>Variable boolean, valor <?php print_r($v7) ?> y en string es <?php var_dump($v7)?></td>
                <tr><td> $v = false </td><td>Variable boolean, valor <?php print_r($v8) ?> y en string es <?php var_dump($v8)?></td>
                <tr><td> $v = "Esto es una cadena de caracteres"</td><td>Variable string, valor -<?php print_r($v9) ?> -</td>
                <tr><td> $v = 'Esto es una cadena de caracteres' </td><td>Variable string, valor -<?php print_r($v10)?> -</td>
                <tr><td> $v = <<< FIN
                        Esto que ves, 
                        es una cadena
                        multilínea
                        y termina aquí
                        FIN; </td><td>Variable string valor - <?php print_r($v11) ?> - </td>
                <tr><td> $v=<<< FIN
                        <pre>
                        Esto que ves, 
                        es una cadena
                        multilínea
                        y termina aquí
                        </pre>
                        FIN;</td><td>Variable string, valor -<?php print_r($v12) ?> - </td>

            </table>
        </div>
        <div class ="enunciado">
            <h3><a href="index.php">Volver</a></h3>
        </div>

    </div>
</body>
</html>

