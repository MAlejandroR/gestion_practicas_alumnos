<?php

$total = 0;
for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        $total =$total+ $i;
     
    }
}

echo "la suma de los 100 primeros numeros pares es.. $total";

//header("Refresh:2;url=http://localhost/practica1/index.php");
?>