<?php
header('Refresh: 5; URL=index.php');
$variable;

define("constnum", 1998);
define("conststr", "Miguel Aguerri");
define("consthex", dechex(constnum));
define("constbin", decbin(constnum));

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            *{
               text-align: center; 
            } 
        </style>
    </head>
    <body>
        <h1>Asignacion en php:</h1>
        <hr />
        <?php
        echo "Un valor constante numérico ".$variable=constnum."<br />";
        echo "Un valor constante string ".$variable=conststr."<br />";
        echo "Un valor constante numérico con valor hexadecimal ".$variable=consthex."<br />";
        echo "Un valor constante numérico con valor binario ".$variable=constbin."<br />";
        echo "Un valor de una expresión numérica ".($variable=2000)."<br />";
        echo "Un valor de una expresión de cadena de caracteres ".($variable="Hola que tal")."<br />";
        echo "Un valor que devuelva una función, por ejemplo la funcion print ".($variable= print("Me llamo Alejandro"))."<br />";
        echo "Un valor de una expresión que sea una asignación ".($variable*=10)."<br />";
        ?>
    </body>
</html>

