<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego adivina un número</title>
        <link rel="stylesheet" href="css/estilo_Index.css" type="text/css">
    </head>
    <body>
        <fieldset id="limites">
            <legend><h1>Fin del juego</h1></legend>
            
            <?php
            $nJugadas = $_GET['intento'];
             echo '<h1>HE ACERTADO!!!!!!!</h1><br>';
             if($nJugadas == 1){
                echo '<h2>En ' . $nJugadas . ' intento</h2>';
             }else{
                 echo '<h2>En ' . $nJugadas . ' intentos</h2>';
             }
             echo '<h2>O por el contrario no has sido sincero!!!!</h2>';
             
            ?>
            <form action="index.php" method="POST">
                <input type="submit" name="Reiniciar" id="Reiniciar" value="Reiniciar">
            </form>
        </fieldset>
    </body>
</html>
