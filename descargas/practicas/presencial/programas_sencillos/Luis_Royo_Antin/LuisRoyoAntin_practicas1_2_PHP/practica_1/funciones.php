<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Práctica 1 PHP. Luis Royo Antín 2ºDAW</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Funciones en PHP</h1>
        <h3>Luis Royo Antín 2ºDAW</h3>
        <?php
        $a = 7;
        $b = 8;
        echo "Programa principal, antes de invocar a la función <b>\$a=$a \$b=$b </b><br/>";

        function duplica(&$a, $b) {
            $a;
            $b;
            //global$b;
            echo "Dentro de la función, antes de modificar parámetros <b>\$a=$a \$b=$b </b><br/>";
            $a = $a * 2;
            $b = $b * 2;
            echo "Dentro de la función, después de modificar parámetros <b>\$a=$a \$b=$b </b><br/>";
            if ($a > $b) {
                return $a;
            } else {
                if ($a === $b) {
                    return "los valores son iguales";
                } else {
                    return $b;
                }
            }
        }

        echo "Al invocar la función, el programa devuelve el número mayor. En este caso: " .duplica($a, $b)."<br/>";
        echo "Programa principal, después de invocar al a función <b>\$a=$a \$b=$b </b><br/>";
        echo "Si creamos <b>global \$b</b> dentro de la función, el valor de la variable \$b se multiplicará por dos "
        . "dentro de la función y fuera de la función el valor de la variable será igual al resultado de dicha multiplicación, "
                . "a diferencia de lo que ocurre cuando la variable no es global, como vemos en las líneas anteriores."
        ?>
    </body>
    <br/><br/><a href="index.php">Volver</a>
</html>
