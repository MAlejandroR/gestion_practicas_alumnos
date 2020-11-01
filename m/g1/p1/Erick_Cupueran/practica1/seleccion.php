<?php

$num = rand(1, 150);

$msj = "";
switch ($num) {
    case ($num >= 0 && $num < 12):
        $msj = "Aún eres un niño";

        break;
    case ($num >= 12 && $num < 18):
        $msj = "Aún eres un adolescente";

        break;
    case ($num >= 18 && $num < 36):
        $msj = "Ya eres un adulto";

        break;
    case ($num >= 36 && $num < 66):
        $msj = "Jubilado";

        break;
    case ($num >= 66 && $num < 151):
        $msj = "Jubilado";

        break;

    default:
        break;
}

echo "<h3>numero generado $num  $msj</h3> <br/>";

header("Refresh:2;url=http://localhost/practica1/index.php");
?>
