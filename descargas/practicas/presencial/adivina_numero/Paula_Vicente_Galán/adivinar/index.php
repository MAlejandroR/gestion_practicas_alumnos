<?php
if(isset($_POST['empezar'])){
    header("jugar.php");
}

switch ('intentos') {

    case 10:
        $intentos=10;
        break;

    case 15:
        $intentos=15;
        break;

    case 20:
        $intentos=20;
        break;
}

?>




<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              <title>Adivina número</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h1>Juego adivina número</h1></legend>
            <h2>    Debes de adivinar un número que yo genero</h2>
            <fieldset>
                <legend><h3>Establece intervalo</h3></legend>
                <form action="jugar.php" method="POST">
                <input type="radio" name="num_intentos" value=10 checked>1-1.024(2<sup>10</sup>). 10 intentos <br/>

                <input type="radio" name="num_intentos" value= 15 > 1-65.536(2<sup>15</sup>). 15 intentos<br/>
                <input type="radio" name="num_intentos" value= 20 > 1-1.048.536(2<sup>20</sup>). 20 intentos<br/>
                
                    <input type="submit" value="empezar" name="empezar">
                </form>
            </fieldset>
            <h2>    Piensa un número de ese intervalo</h2>
            <h2>    La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>


        </fieldset>

    </body>
</html>