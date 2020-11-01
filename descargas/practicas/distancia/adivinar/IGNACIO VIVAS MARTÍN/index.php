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
                       
<!--                            <input type="text" name="maximo" value= 2048  />
                            <input type="text" name="minimo" value= 1 />
                            <input type="text" name="contador" value= 0 />-->
                            
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
            <h2>Cada vez que la aplicación te especifique un número deberas de indicar</h2>
            <h4>Si el número buscado es mayor</h4>
            <h4>Si el número buscado es menor</h4>
            <h4>Si has acertado el número</h4>

        </fieldset>









        <!--        <fieldset style="background-color: #ffe4c4;">
                    <legend>Juego adivina número</legend>
                    <form action="jugar.php" method="POST" >
                        <h3>¿El número es el <?php echo $numero; ?>? </h3>
                        <h4>Jugadas realizadas: <i style="color:red;"><?php echo $jugada; ?></i> - Jugadas restantes <i style="color:red;"><?php echo $intentos; ?></h4>
                        <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
                        <input type="hidden" value="<?php echo $sup ?>" name="sup">
                        <input type="hidden" value="<?php echo $inf ?>" name="inf">
                        <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
                        <input type="hidden" value="<?php echo $numero ?>" name="numero">
                        <input type="hidden" value="<?php echo $resultado ?>" name="resultado">
                        <input type="hidden" value="<?php echo $num_intentos ?>" name="num_intentos">
                        <fieldset>
                            <legend>Indica como es el número que has pensado</legend>
                            <input type="radio" name="resultado" value="mayor" checked>Mayor<br />
                            <input type="radio" name="resultado" value="menor">Menor<br />
                            <input type="radio" name="resultado" value="igual">Igual<br />
                        </fieldset>
                        <hr>
                        <input type="submit" name="jugar" value="jugar" >
                        <input type="reset" name="submit" value="reset" >
                        <input type="reset" name="volver" value="volver" onclick="location.replace('index.php');" >
                    </form>-->
<!--</fieldset>-->


    </body>
</html>
