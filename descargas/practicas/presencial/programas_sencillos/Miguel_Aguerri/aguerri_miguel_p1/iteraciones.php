<?php
header('Refresh: 2; URL=index.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$numero;
for ($x = 0; $x <= 100; $x++){
    if ($x%2==0) {
        $numero+=$x;
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Iteraciones en php:</h1>
        <hr />
        <h1>La suma de los 100 primeros numeros pares es: <?=$numero ?></h1>
    </body>
</html>
