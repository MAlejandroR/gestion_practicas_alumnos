<?php

echo "constante define";
define("iva", 2.4);

$total = 3 * iva;

echo "$total<br/>";

echo "constante const<br/>";
const iva_2 = 0.06;
$total = 3 * iva_2;
echo " $total";

echo "EDAD DE ERICK<br/>";
define("edad", 22);


//echo "<br/> constantes predefinidas <br/>";

echo "Dias dias restantes para que cumplas 100 años<br/>";
echo "Te faltan  ".(100-edad)." años para que cumplas cien años";

//echo PHP_VERSION;

header("Refresh:2;url=http://localhost/practica1/index.php");
?>

