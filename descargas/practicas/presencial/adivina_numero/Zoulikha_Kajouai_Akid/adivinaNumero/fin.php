<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>
    <body>
         <?php
        echo"<h1>Has acertado!!!! en " . ($_GET["num"]- ($_GET["jugadas"])) . " jugadas<br>O no has sido sincero/a! </h1>";
        ?>
        <fieldset>
            <legend>Fin del juego</legend>
            <form action="index.php" method="POST">
              <input type="submit" value="Volver al Inicio">
            </form>

        </fieldset>


    </body>
</html>