
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $a = 7;
        $b = 8;
        echo 'Programa principal, antes de invocar a la funciòn. $a = '. $a . ' $b = '. $b .'<br>';
        function variables($a,$b){
            global $a;
            $a = 7;
            $b = 8;
        echo 'Dentro de la función, antes de modificar parámetros. $a = '. $a . ' $b = '. $b .'<br>';
        $a = 7*2;
        $b = 8*2;
        echo 'Dentro de la función, después de modificar parámetros. $a = '. $a . ' $b = '. $b .'<br>';
        }
        variables($a, $b);
        echo 'Programa principal, después de invocar a la función. $a = '. $a . ' $b = '. $b .'<br>';
        ?>
        <br>
        <a href="index.php">Volver</a>      
    </body>
</html>

