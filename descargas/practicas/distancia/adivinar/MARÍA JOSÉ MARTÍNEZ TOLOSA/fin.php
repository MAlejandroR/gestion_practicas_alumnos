<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego</title>
        <style type="text/css">
            body {
                color: purple;
                background-color: #FFD033; 
                border: 1px solid #000000;
                padding: 40px 40px 40px 40px;
            }
        </style>
    </head>
    <body>
         <?php
         if (!is_null(filter_input(INPUT_POST, 'jugar'))) {
         $jugada = filter_input(INPUT_POST, 'jugada');
         }
         if (!is_null(filter_input(INPUT_POST, 'reiniciar'))) {
         $jugada = filter_input(INPUT_POST, 'jugada');
         }
         if (!is_null(filter_input(INPUT_POST, 'volver'))) {
         $jugada = filter_input(INPUT_POST, 'jugada');
         }
        ?>
        
        <h2>He acertado!!!!!!! en <?php echo $jugada; ?> jugadas</h2>
        <h2>o</h2>
        <h2>No has sido sincero</h2>
        
        <form action="index.php" method="post">
            <input type="submit" name= "inicio" value="Reiniciar">
        </form>
    </body>
</html>
            
