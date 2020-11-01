<?php

    $title = "variables";
    $titulo = "Variables en php";
    $v=226;
    $o=0345;
    $h=0xAEC12;
    $b=01101;
    $f=1.3456223000332;
    $f2=1.567000e+1;
    $n = null;
    $true = true;
    $false = false;
    $cadena = "Esto es una cadena";
    $cadena2 = "Esto es otra cadena";
    $multilinea=<<< FIN

    Esto que ves, 
    es una cadena
    multilínea
    y termina aquí
FIN;
    
    $multilinea2=<<< FIN
        <pre>

        Esto que ves, 
        es una cadena
        multilínea
        y termina aquí

        </pre>
FIN;
?>
<html>
    <head>
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="variables.css">
        <meta http-equiv="refresh" content="5;URL=index.php">
    </head>
    <body><?php  ?>
        <div id="contenedor">
            <div><h1><?php echo $titulo ?></h1></div>
            <div id="contenidos">
                <div id="asignados">
                    <p><a>Valores asignados</a></p>
                    <p><?php print "\$v=" . $v ?></p>
                    <p><?php print "\$v=" . $o ?></p>
                    <p><?php print "\$v=" . $h ?></p>
                    <p><?php print "\$v=" . $b ?></p>
                    <p><?php print "\$v=" . $f ?></p>
                    <p><?php print "\$v=" . $n ?></p>
                    <p><?php print "\$v=" . $true ?></p>
                    <p><?php print "\$v=" . $false ?></p>
                    <p><?php print "\$v=" . $cadena ?></p>
                    <p><?php print "\$v=" . $cadena2 ?></p>
                    <p><?php print "\$v=" . $multilinea ?></p>
                    <p><?php print "\$v=" . $multilinea2 ?></p>
                </div>
                <div id="muestraValores">
                    <p><a>Mostranto valores</a></p>
                    <p><?php print "Variable decimal, valor -$v-"; ?> </p>
                    <p><?php print "Variable octal, valor -$o- y en octal -".decoct($o)."-"; ?> </p>
                    <p><?php print "Variable hexadecimal, valor -$h- y en hexadecimal -".dechex($h)."-"; ?> </p>
                    <p><?php print "Variable binaria, valor -$b- y en binario -".decbin($b)."-"; ?> </p>
                    <p><?php print "Variable decimal, valor -$f- y en notación científica " . printf("%E", $f); ?> </p>
                    <p><?php print "Variable null, valor -$n- y en string es  -null-"; ?> </p>
                    <p><?php print "Variable boolean, valor -$true- y en string es -true-"; ?> </p>
                    <p><?php print "Variable boolean, valor -$false- y en string es -false-" ?> </p>
                    <p><?php print "Variable string, valor -$cadena-" ?> </p>
                    <p><?php print "Variable string, valor -$cadena2-" ?> </p>
                    <p><?php print "Variable string, valor -$multilinea-" ?> </p>
                    <p><?php print "Variable string, valor -$multilinea2-" ?> </p>
                </div>
            </div>
        </div>
    </body>
</html>

