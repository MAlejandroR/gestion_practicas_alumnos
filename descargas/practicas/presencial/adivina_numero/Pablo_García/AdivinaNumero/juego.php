<?php
//Obtengo la fecha y abro el fichero para escribirla en él.
$fecha = date("d-m-y h:i:s");
$f = fopen("log.txt", "a+");
$intentos = filter_input(INPUT_POST, 'intentos');
$numMaquina = filter_input(INPUT_POST, 'numMaquina');
//Con el swtich compruebo la opcion elegida.
    switch (filter_input(INPUT_POST, 'submit')) {
        case 'Jugar':
            //Recogemos los valores d.
            $jugadas = filter_input(INPUT_POST, 'jugadas');
            $min = filter_input(INPUT_POST, 'min');
            $max = filter_input(INPUT_POST, 'max');
            //Con la funcion hacemos que el numero de la maquina sea el calculo que hacemos en dicha funcion.
            $numMaquina = jugar();
            if ($jugadas === $intentos) {
                //Si ocurre, nos llevo a fin, donde nos mostrara el mensaje dicineod que hemos perdido.
                $fin = false;
                header("Location:fin.php?jugadas=$jugadas&fin=$fin");
            }
            //La jugada aumenta cada nivel que pase.
            $jugadas++;
            //Aquí reiniciar si que esta activado.
            $reiniciar = "";
            //Escribimos el numero de la maquina.
            fwrite($f, "$fecha La maquina ha introducido el número $numMaquina" . PHP_EOL);
            break;

        case 'Volver':
            fwrite($f, "$fecha La maquina ha vuelto a la página de inicio" . PHP_EOL);
            //Nos llevara al inicio, donde volveremos a alegir una opcion; por defecto nos saldra la elegida anteriormente
            header("Location:index.php?intentos=$intentos");
            exit();

        case 'Reiniciar':
            //Reinicia el juego, donde vuelve a desactivarse el boton reiniciar y donde escribrimos el reinicio.
            $numMaquina = filter_input(INPUT_POST, 'numMaquina');
            $reiniciar = "disabled";
            fwrite($f, "$fecha Se ha reiniciado el juego" . PHP_EOL);

        default:
            //Escribirmos la fecha del acceso.
            fwrite($f, "$fecha Acceso" . PHP_EOL);
            //Declaramos un mínimo y un máximo para hacer el calculo que deberá hacer la maquina para adivinar.
            $min = 0;
            $max = pow(2, $intentos);
            $numMaquina = ($max / 2) + $min;
            //Desactivamos reiniciar al empezar y declaramos las jugadas a 1.
            $reiniciar = "disabled";
            $jugadas = 1;
    }


function jugar() {
    //En esta funcion declaramos como globales las variables para que cambien siempre que operemos con ellas y no solo dentro de cada if.
    global $numMaquina, $min, $max, $jugadas;
    $infoNum = filter_input(INPUT_POST, 'info_num');
    //Recogemos el valor de la opcion elegida y operamos con la funcion que nos devolvera el numero que la maquina dirá.
    if ($infoNum === "mayor") {
        $min = $numMaquina;
    } elseif ($infoNum === "menor") {
        $max = $numMaquina;
    } elseif ($infoNum === "igual") {
          $fin = true;
          //Si acierta el numero nos lleva a fin, donde nos mostrara el mensaje de ganadores.
        header("Location:fin.php?jugadas=$jugadas&fin=$fin");
        
    }
    //El calculo sería los límites entre los que esta el numero divivido para dos.
    //Por ejemplo: Si estamos entre el 10 y el 20, se sumarían y dividiarian entre dos (15) para estar mas cerca de un resultado.
    $numMaquina = ($min + $max) / 2;
    return $numMaquina;
}

fclose($f);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Juego de adivinar número</title>
    </head>
    <!--Este es el HTML donde mostramos los radios, los mensajes, y donde guardamos las variables php en inputs de tipo hidden.-->
    <body style="width: 60%;float:left;margin-left: 20%; ">
        <fieldset style="width:30%;background:bisque">
            <legend>Empieza el juego</legend>
            <form action="juego.php" method="POST">
                <br/>
                <h2>Es el número <?php echo $numMaquina ?>?</h2>
                <strong>Jugada: <?php echo $jugadas ?></strong><br/>
                <fieldset>
                    <legend>Indica cómo es el número que has pensado</legend>
                    <input type="radio" name="info_num" value="mayor" checked> Mayor<br>
                    <input type="radio" name="info_num" value="menor"> Menor<br>
                    <input type="radio" name="info_num" value="igual"> Igual<br>
                </fieldset>
                <hr/>
                <input type="submit" value="Jugar" name="submit"/>
                <input type="submit" value="Reiniciar" name="submit" <?php echo $reiniciar ?>/>
                <input type="submit" value="Volver" name="submit"/>
                <input type="hidden" value="<?php echo $numMaquina ?>" name="numMaquina"/>
                <input type="hidden" value="<?php echo $jugadas ?>" name="jugadas"/>
                <input type="hidden" value="<?php echo $intentos ?>" name="intentos"/>
                <input type="hidden" value="<?php echo $max ?>" name="max"/>
                <input type="hidden" value="<?php echo $min ?>" name="min"/>
            </form>
        </fieldset>
    </body>
</html>

