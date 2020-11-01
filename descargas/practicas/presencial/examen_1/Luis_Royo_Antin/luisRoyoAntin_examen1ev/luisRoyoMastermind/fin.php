<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$estado = filter_input(INPUT_GET, "estado");
$msj = "";
if ($estado == "victoria") {
    $msj = "Has ganado";
}

if ($estado == "limite") {
    $msj = "Has superado el límite de jugadas";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3><?= $msj ?></h3>
        <form action='index.php' method='post'>
            <input type="submit" value="Volver al index" name=""/>
        </form>
    </body>
</html>