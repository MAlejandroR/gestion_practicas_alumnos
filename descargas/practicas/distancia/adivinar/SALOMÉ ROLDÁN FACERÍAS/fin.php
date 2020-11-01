<?php

$msje = $_GET['mensaje'];
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
      </head>
    <body>
        <fieldset>
            <legend>Fin del juego</legend>
            <form action="index.php" method="POST">
                <h2><?php echo $msje?></h2>                
                <input type="submit" value="Volver a Inicio">
            </form>
        </fieldset>
    </body>
</html>