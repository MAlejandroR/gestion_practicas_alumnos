<?php
//Recogemos la variable jugadas y la variable booleana para distiguir si hemos ganado o no.
$jugadas = ($_GET['jugadas']);
$fin = ($_GET['fin']);

//Mostramos los mensajes
if ($fin==false) {
    $msj = "HAS MENTIDO, LO DEBERIA DE HABER ACERTADO";
} else {
    $msj = "TOMA, HE ACERTADO EL NUMERO!!<br/>"
            . "Lo he acertado en $jugadas jugadas";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" content="width = device-width, user-scalable = no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
        <title>Juego de adivinar número</title>
    </head>
    <body style="width: 60%;
          float:left;
          margin-left: 20%;
          ">
        <fieldset style="width:30%; background:bisque">
            <legend>Resultado</legend>
            <h2><?php echo $msj ?></h2>
            <form action="index.php" method="GET">
                <input type="submit" value="VOLVER AL INICIO" name="boton">
            </form>
        </fieldset>
    </body>
</html>