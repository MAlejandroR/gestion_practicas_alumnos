<?php $texto = $_GET["texto"]; ?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 3</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend>Fin del juego</legend>
            <form action="index.php" method="POST">
                <h2><?php echo $texto ?></h2>
                <input type="submit" value="Volver a Inicio">
            </form>
        </fieldset>
    </body>
</html>