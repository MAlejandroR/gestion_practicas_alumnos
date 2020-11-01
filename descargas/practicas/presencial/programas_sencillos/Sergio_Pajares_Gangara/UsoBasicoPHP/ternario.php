 <!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
        $a = rand(1, 100);
        //Operadores ternarios
        $b = ($a % 2) == 0 ? "par" : "impar";
        if($a % 2 == 0){
            echo "el numero $a es $b <br/>";
        }else{
            echo "el numero $a es $b <br/>";
        }
        ?>
        <br>
        <a href="ternario.php">Prueba otro número</a>
        <br>
        <a href="index.php">Volver</a>
    </body>
</html>    






