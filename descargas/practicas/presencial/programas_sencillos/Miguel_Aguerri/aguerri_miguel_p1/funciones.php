<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$a=5;
$b=10;
function comparador(&$a,$b){
    echo "Los valores de los parametros son \$a=$a y \$b=$b"."<br/>";
    $a*=2;
  $b*=2;
  echo "Los valores de los parametros despues de lo especificado son \$a=$a y \$b=$b"."<br/>";
  return ($a > $b) ? "La mayor es \$a" : "La mayor es \$b";
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Funciones en php:</h1>
        <hr />
        <h2>El valor de $a es: <?=$a ?></h2><br/>
        <h2>El valor de $b es: <?=$b ?></h2><br/>
        <?= comparador($a, $b)?><br />
        <h2>El valor de $a despues de la funcion es: <?=$a ?></h2><br/>
        <h2>El valor de $b despues de la funcion es: <?=$b ?></h2><br/>
        
        <a style="color: red;">Si creamos una variable global en la función, $b se actualizara
            y cuando la mostremos despues de la función tendra el valor que le
            hemos ado en la funcion</a>
    </body>
</html>


