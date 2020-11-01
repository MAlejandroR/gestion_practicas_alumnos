<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h1>Funciones en PHP</h2>";
/* Creamos las variables y les asignamos sus respectivos valores */
$a = 8;
$b = 12;
echo "<h2><span style=color:red>Función duplica</span></h2>";
echo " <h3>-Valores de la variables antes de invoncar la función duplica. \$a = $a y \$b = $b<br /></h3>";
echo " <h3>-Valores de la variables antes de modificarlos con la función duplica. \$a = $a y \$b = $b<br /></h3>";
function duplica() {
    global $a, $b;
    $a *= 2;
    $b *= 2;
}
duplica($a, $b);
echo " <h3>-Valores de la variables después de modificarlos con la función duplica. \$a = $a y \$b = $b<br /></h3>";
echo " <h3>-Valores de la variables después de invoncar la función duplica. \$a = $a y \$b = $b<br /></h3>";
echo "<hr />";
echo "<h2><span style=color:red>Función mayor</span></h2>";
echo " <h3>-Valores de la variables antes de invoncar la función mayor. \$a = $a y \$b = $b<br /></h3>";
echo " <h3>-Valores de la variables antes de modificarlos con la función mayor. \$a = $a y \$b = $b<br /></h3>";
function mayor(&$a, &$b) {
        $valor1 = "<b><u>Mayor:</u></b>  \$a=$a";
        $valor2 = "<u><b>Mayor:</b></u>  \$b=$b";
        $retorno = ($a>$b)? $valor1: $valor2;
        return $retorno;
}
$resultado = mayor($a, $b);
echo " <h3>-Valores de la variables después de invoncar la función mayor. \$a = $a y \$b = $b</h3>";
echo " <h3>$resultado</h3>";
echo " <h3>-Valores de la variables después de modificarlos con la función mayor. \$a = $a y \$b = $b</h3>";
echo " <h3>$resultado</h3>";
header("Refresh:5;url=index.php");
?>