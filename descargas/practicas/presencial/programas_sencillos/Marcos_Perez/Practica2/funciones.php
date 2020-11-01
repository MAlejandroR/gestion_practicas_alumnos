<?php
//creo una funcion que incrementara los valores de los parametros 
function incrementar($a, $b){
    $a=$a*2;
    $b=$b*2;
    if($a>$b){
        return $a;
    }else{
        return $b;
    }
}
// damos valores a las variables 
$a=4;
$b=2;
// mostramos el valor de las variables.
echo "La variable \$a vale $a <br/>";
echo "La variable \$b vale $b <br/>";
//invoco a la funcion
incrementar($a, $b);
echo "tras invocar la funcion:  <br/>";
//muestro los valores despues de invocar a la funcion 
echo "La variable \$a vale $a <br/>";
echo "La variable \$b vale $b <br/>";
// tras 5 segundos volvemos al index 
header("Refresh:5; url=index.php");

?>