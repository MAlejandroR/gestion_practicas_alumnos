<?php
/* 7.-Funciones en php Haz una función que reciba dos variables $a y $b $a se ha de pasar por referencia $b por valor

  La función duplica el valor de los parámetros
  La función devuelve el valor mayor de los dos
  El programa principal creará hará lo siguientes

  1.-Crea dos valores en variables

  2.-Visualiza sus valores

  3.-Invoca a la función

  4.-Visualiza los valores de los parámetros

  5.-Hace lo especificado

  6.-Visualiza los valores

  7.-Después de la llamada a la función se visualizarán los valores

  8.-Plantea que pasará si creamos dentro de la función una variable global que sea el igual al segundo parámetro de  la función
 */

function fun(&$valor1, $valor2) {

    //global $valor2;

    echo "<h2>Dentro de la función sin aplicar el doble: <br></h2>";
    echo 'Valor de $valor1: ' . $valor1 . "<br>";
    echo 'Valor de $valor2: ' . $valor2;

    $valor1 *= 2;
    $valor2 *= 2;


    echo "<h2>Dentro de la función aplicando el doble: <br></h2>";
    echo 'Valor de $valor1: ' . $valor1 . "<br>";
    echo 'Valor de $valor2: ' . $valor2;

    return ($valor1 > $valor2) ? $valor1 : $valor2;
}

$valor1 = 5;
$valor2 = 6;

echo "<h2>Antes de la función: <br></h2>";

echo 'Valor de $valor1: ' . $valor1 . "<br>";
echo 'Valor de $valor2: ' . $valor2;

fun($valor1, $valor2);

echo "<h2>Después de la función: <br></h2>";

echo 'Valor de $valor1: ' . $valor1 . "<br>";
echo 'Valor de $valor2: ' . $valor2;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

        <p>Si globalizamos las variables dentro de la función, todas las referencias que se hagan a las mismas se harán a la variable global.
            En este caso el resultado sería el mismo que pasarlo por referencia. Es decir la variable se doblará y conservará ese valor. Cuidado con los nombres que le damos a las variables si no coinciden con el que
            se les da a los parámetros, hay que globalizar con el nombre que tengan fuera.</p>



    </body>
</html>