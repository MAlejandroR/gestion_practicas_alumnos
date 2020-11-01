<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego adivina un número</title>
        <link rel="stylesheet" href="css/estilo_Index.css" type="text/css">
    </head>
    <body>
        <fieldset id="limites">
            <legend><h1>Juego adivina un número</h1></legend>
            <fieldset>
                <legend><h2>Intrucciones del juego</h2></legend>
                <ol>
                    <li>Piensa en un número del intervalo elegido en el menú.</li>
                    <li>La aplicación acertara el número elegido en el número de intentos establecido según el intervalo.</li>
                    <li>La aplicación te mostrara un número en pantalla y deberas de indicar si el número elegido es mayor, menor o si ha acertado.</li>
                </ol>
            </fieldset>
            
            <fieldset>
                <legend><h2>Selecciona un intervalo</h2></legend>
                    <form action="jugar.php" method="POST">
                        <p><input type="radio" name="intentos" id="intentos" value="10" checked="yes">1 - 1.024 (2<sup>10</sup>). 10 intentos</p>
                        <p><input type="radio" name="intentos" id="intentos" value="16">1 - 65.536 (2<sup>16</sup>). 16 intentos</p>
                        <p><input type="radio" name="intentos" id="intentos" value="20">1 - 1.048.576 (2<sup>20</sup>). 20 intentos</p>
                        <input type="submit" name="empezar" id="empezar" value="Empezar">
                    </form>
            </fieldset>
        </fieldset>
        
    </body>
</html>
