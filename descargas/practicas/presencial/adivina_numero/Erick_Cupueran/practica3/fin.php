<?php
$msj = $_GET['mensaje'];//recibimos si es 1 o 0 de $msj

$cadena = "";
if ($msj) {//si es true entonces ganó la máquina

    $cadena = "Las máquinas somos muy listas!!!";
} else {//si no ha perdido
    $cadena = "Creo que me has engañado!!";
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FIN</title>
        <style>
            fieldset{
                background-color:  #81F781;
                width: 55%;
            }
        </style>
    </head>
    <body>
        <fieldset> <h1><?php echo "$cadena"; ?></h1><!-- imrpimo el mensaje de php -->
         <form action="index.php" method="Post">
            <input type="submit" value="reiniciar"> <!-- volvemos al index.php -->
         </form>
</fieldset>
       
    </body>
</html>