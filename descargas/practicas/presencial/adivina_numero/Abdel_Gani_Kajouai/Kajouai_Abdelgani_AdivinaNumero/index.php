<html>
    <head>
        <style>
            body{
                background-color:#FFA07A;
            }
        </style>
    </head>
    <body>
 
        <form action="jugar.php" method="post">
            <fieldset>
                <legend><h1>Juego adivina número</h1></legend>
                <h2>Selecciona un intervalo del menú de abajo</h2>
                <fieldset>
                    <legend>Establece intervalo</legend>
                <input type="radio" name="juego" value="10" checked>1-1.024(2^10). 10 intentos<br/>
            <input type="radio" name="juego" value="15">1-32768(2^15). 15 intentos<br/>
            <input type="radio" name="juego" value="20">1-1.048.576(2^20). 20 intentos<br/><br/>
            <input type="hidden" name="desdeindex" value="si">
            <input type="submit" value="Aceptar">
                </fieldset>
                <h2>Piensa un número de ese intervalo</h2>
                <h2>La aplicacion lo acertará en el número de intentos establecidos segun el intervalo</h2>
                <hr>
                <h2>Cada vez que la aplicacion te especifique un número deberás de indicar</h2>
                Si el numero buscado es mayor<br/>
                Si el numero buscado es menor<br/>
                Si has acertado el numero
            </fieldset>
        </form>
    </body>
</html>
