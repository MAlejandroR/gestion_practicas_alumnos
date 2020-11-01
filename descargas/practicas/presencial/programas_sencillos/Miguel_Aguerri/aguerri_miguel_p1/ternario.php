<?php
header('Refresh: 2; URL=index.php');
$numero = rand(0, 1000);
$ternario = ($numero%2==0) ? "es par" : "no es par";

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Operador Ternario en php:</h1>
        <hr />
        <h1>El numero <?=$numero." ".$ternario?> </h1>
    </body>
</html>

