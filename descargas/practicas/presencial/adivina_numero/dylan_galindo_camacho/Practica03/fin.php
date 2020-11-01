<?php
    // Obtenemos los parametros enviados en header(...);
    $intentos = filter_input(INPUT_GET, 'intent'); //$_GET['intent'];
    $num = filter_input(INPUT_GET, 'num');
    $info = "";
    
    if ($intentos > 10) { //>=
        // Si ha superado los 10 intentos que no rediriga a una pagina...        
        $info = "HAS TERMINADO TUS INTENTOS.<br /><b>El número generado fue $num,"
                . " NO has sido sincera/o, debería de haberlo acertado ya!!!!."
                . "</b><br>Buena suerte para la próxima vez...";
    } else {
        // Si a hacertado en menos de los 10 intentos...        
        $info = "FELICIDADES!!!!, ($num) es el número buscado... <br /> "
            . "Lo he acertado en $intentos intentos.";
    }
    
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Juego finalizado</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div>
            <fieldset>
                <legend>El juego a finalizado</legend>
                <p><?php echo $info ?></p>
            
                <form action="index.php" method="POST">
                    <input type="submit" value="Reiniciar">
                </form>
            </fieldset>        
        </div>
    </body>
</html>
