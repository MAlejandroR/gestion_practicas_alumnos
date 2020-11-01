<?php


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        
            <form action="juegoAkinator.php" method="POST">
                <h1><pre> Selecciona un intervalo del menú de abajo</pre></h1>
                <fieldset>
                    <legend>Establece el intervalo</legend>
                    <input type="radio" name="intervalo" value="10"> 1 - 1.024(2<sup>10</sup>)   10 intentos <br>
                    <input type="radio" name="intervalo" value="15"> 1 - 65.536(2<sup>15</sup>)   15 intentos <br>
                    <input type="radio" name="intervalo" value="20"> 1 - 1.048.536(2<sup>20</sup>)   20 intentos <br>
                    
                    <input type="submit" value="empezar" name="submit">
                    
                </fieldset>
                
                <h1><pre> Piensa en un número de ese intervalo</pre></h1>
                <h1><pre> La aplicación lo acertará en el número de intentos establecidos según el intervalo</pre></h1>

                <hr>
                
                <h1><pre> Cada vez que la aplicación te especifique un número deberás de indicar</pre></h1>
                <pre>                Si el número indicado es mayor
                Si el número indicado es menor
                Si la aplicación ha acertado el número</pre>

           

            </form>
          

    </body>
</html>