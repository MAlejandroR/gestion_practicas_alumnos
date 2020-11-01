<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego adivina número</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>
    <body>

        <?php
        $cont = 0;
        ?>
        <fieldset>
            <legend>Juego adivina número</legend>
            <center>
                <div align='center'>
                    <h1>Juego adivina número</h1> 
                    <h2>Selecciona un intervalo de munú de abajo</h2>
                    <fieldset>
                        <legend>Establece intervalo</legend>
                        <form name = "jugar" action = "jugar.php" method="POST" >
                            <input type="radio" name="maximo" value=1024 /> 1-1024 (10 intentos) <br />
                            <input type="radio" name="maximo" value=65536 /> 1-65.536 (16 intentos) <br>
                            <input type="radio" name="maximo" value=1048576 /> 1-1.048.576 (20 intentos) <br>
                            <input type="hidden" name="contador" value= <?php echo $cont ?> />
                            <input type="submit" value="Empezar" name="btnEmpezar"  />
                            <br><br><br>
                        </form>
                    </fieldset>
                </div>      
            </center>

            <h2>Piensa un número de ese intervalo</h2>
            <h2>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
            <h2>Cada vez que la aplicación te especifique un número deberas de indicar:</h2>
            <h4>-Si el número que piensas es mayor</h4>
            <h4>-Si el número que piensas es menor</h4>
            <h4>-Si has acertado el número</h4>
        </fieldset>               
    </body>
</html>
