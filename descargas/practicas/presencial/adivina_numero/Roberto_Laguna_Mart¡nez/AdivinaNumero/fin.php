<?php
//recojo los valores enviados por el header y los asigno a las variables
$mensaje = filter_input(INPUT_GET, 'mensaje');
$numero = filter_input(INPUT_GET, 'numero');
$gracias = filter_input(INPUT_GET, 'gracias');
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>       
    </head>
    <body>        
        <fieldset style="width:40%; background: lemonchiffon; margin:0 auto; padding: 10px;">
            <legend><h2>Resultado final</h2></legend>
            <h1><span style="color: blue;"><?= $mensaje ?>&nbsp;<?= $numero ?><br /><?= $gracias ?></span></h1>  
            <form action="index.php">
                <input style="width:30%" type="submit" value="Volver a jugar"/>
            </form>
        </fieldset>
</html>

