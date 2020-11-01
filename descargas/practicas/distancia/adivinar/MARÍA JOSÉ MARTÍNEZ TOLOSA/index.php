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
        
    <h1>Juego adivina número</h1>
    <h2>Selecciona un intérvalo del menú de abajo</h2>
    <fieldset>
    <legend>Establece intervalo</legend>
    <form action="jugar.php" method="post">
        <label>    <input type="radio" name='intervalo' <?php
    if (isset($intervalo) && $intervalo == "1024") {
        echo "checked";
    }
    ?> value="1024"> 1-1.024. (2<sup>10</sup>). 10 intentos<br></label>
        <label> <input type="radio" name='intervalo' <?php
        if (isset($intervalo) && $intervalo == "65536") {
            echo "checked";
        }
    ?> value="65536"> 1-65.536. (2<sup>16</sup>). 16 intentos<br></label>
        <label> <input type="radio" name='intervalo' <?php
        if (isset($intervalo) && $intervalo == "1048576") {
            echo "checked";
        }
    ?> value="1048576" > 1-1.048.576. (2<sup>20</sup>). 20 intentos<br></label><br>

        <input type="submit" name='empezar' value="Empezar">
    </form>
    </fieldset>
    <h2>Piensa un número de ese intervalo</h2>
    <h2>La aplicación lo acertará en el número de intentos establecido según el intervalo</h2>
    <h2>Cada vez que la aplicación te especifique un número deberás indicar</h2>
    <p>Si el número buscado es mayor</p>
    <p>Si el número buscado es mayor</p>
    <p>Si has acertado el número</p>
</body>
</html>