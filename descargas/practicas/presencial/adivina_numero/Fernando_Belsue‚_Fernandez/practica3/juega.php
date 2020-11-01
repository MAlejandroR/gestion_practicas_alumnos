<?php

//Recojo con un filtro el "value" del botón llamado 'submit' de index.php. 
//Como ésta variable la pasaré a un switch, no es necesario utilizar la función "isset", ya que el default del switch
//hará lo necesario en caso de no existir. 
$accion = filter_input(INPUT_POST, 'submit');
//Recojo con un fitro el intervalo seleccionado por el usuario en el index.php.
//Como ésta variable la pasaré a un switch, no es necesario utilizar la función "isset", ya que el default del switch
//hará lo necesario en caso de no existir.
$intervalo = filter_input(INPUT_POST, 'intervalo');

//Paso la variable $accion (valor submit) al switch. La lógica se basa en asignar los valores necesarios en 
//las variables a utilizar en el programa según el intervalo seleccionado.
//Cuando el usuario le da a 'Empezar' en el index, entra en el switch con el case 'Empezar'.
switch ($accion) {
    //El caso de 'Reiniciar'haré lo mismo que en empezar.  
    case 'Reiniciar':    
    case 'Empezar':
        //Inicializo las variables $minIntervalo y $numIntentos a cero. Además inicializo la variable $numPensado
        //a 'null'.
        $minIntervalo = 0;
        $numIntentos = 0;
        $numPensado = null;
        //Ahora para poder definir el valor máximo del intervalo ($maxIntervalo) y el número de intentos permitido
        //($maxIntentos), necesito conocer el intervalo seleccionado por el usuario
        switch ($intervalo) {
            case 'intervalo1':
                //Almaceno los valores máximos de intervalo e intentos para intervalo1.
                $maxIntervalo = 1024;
                $maxIntentos = 11;
                break;
            case 'intervalo2':
                //Almaceno los valores máximos de intervalo e intentos para intervalo2.
                $maxIntervalo = 32768;
                $maxIntentos = 16;
                break;
            case 'intervalo3':
                //Almaceno los valores máximos de intervalo e intentos para intervalo3.
                $maxIntervalo = 1048576;
                $maxIntentos = 21;
                break;
            default :
                //Si no ha marcado intervalo le muestro mensaje y lo redirecciono al index.
                header("Location:index.php?err=Selecciona una opción");
                exit();
                break;
        }
        break;
    case 'Jugar':
        //Cuando el usuario pinche en jugar, actualizo los valores de las variables.
        $minIntervalo = filter_input(INPUT_POST, 'min_intervalo');
        $maxIntervalo = filter_input(INPUT_POST, 'max_intervalo');
        $numIntentos = filter_input(INPUT_POST, 'num_intentos');
        $maxIntentos = filter_input(INPUT_POST, 'max_intentos');
        $numPensado = filter_input(INPUT_POST, 'num_pensado');
        break;
    default :
        //Si el usuario pincha en volver, lo redirecciono al index.
        header("Location:index.php");
        exit();
        break;
}

//SI el número pensado o generado no es null
if ($numPensado != null) {
    //Recojo el número
    $numPensadoEs = filter_input(INPUT_POST, 'num_pensado_es');
    switch ($numPensadoEs) {
        case 'mayor':
            //En el caso de que el número a adivinar sea mayor, el mínimo intervalo pasa a ser el número pensado
            $minIntervalo = $numPensado;
            break;
        case 'menor':
            //En el caso de que el número a adivinar sea menor, el máximo intervalo pasa a ser el número pensado
            $maxIntervalo = $numPensado;
            break;
        case 'igual':
            //Si es igual he adivinado el número y redirecciono a fin.php con las variables que quiero mostrar
            header("Location:fin.php?num_intentos=$numIntentos&max_intentos=$maxIntentos&num=$numPensado");
            exit();
            break;
        default :
            //Si no ha marcado intervalo le muestro mensaje de error y recargo la página
            $error2 = "Selecciona una opción";
            $numIntentos--;
            break;
    }
    //Calculo el nuevo número.
    $nuevoNumPensado = $minIntervalo + round(($maxIntervalo - $minIntervalo) / 2);
} else {
    //Si el número pensado es null, lo genero por primera vez.
    $nuevoNumPensado = round(($maxIntervalo - $minIntervalo) / 2);
}
$numIntentos++;

//Si el número de intentos es mayor al máximo número de intentos permitido en la partida, redirecciono a fin.php
//llevándome las variables $numIntentos, $maxIntentos y $numPensado, para poder mostrar toda la información.
if ($numIntentos > $maxIntentos) {
    header("Location:fin.php?num_intentos=$numIntentos&max_intentos=$maxIntentos&num=$numPensado");
    exit();
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Juega</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h3>Empieza el juego</h3></legend>
            <h2>El número es <?php echo $nuevoNumPensado ?> ?</h2>
            <h4>Jugada <?php echo $numIntentos ?></h4>
            <form action="juega.php" method="POST">
                <fieldset>
                    <legend>Indica cómo es el número que has pensado</legend>
                    <input type="radio" name="num_pensado_es" value="mayor">Mayor<br />
                    <input type="radio" name="num_pensado_es" value="menor">Menor<br />
                    <input type="radio" name="num_pensado_es" value="igual">Igual<br />

                    <!--Inputs ocultos.-->
                    <input type="hidden" name="min_intervalo" value="<?php echo $minIntervalo ?>" />
                    <input type="hidden" name="max_intervalo" value="<?php echo $maxIntervalo ?>" />
                    <input type="hidden" name="num_pensado" value="<?php echo $nuevoNumPensado ?>" />
                    <input type="hidden" name="max_intentos" value="<?php echo $maxIntentos ?>" />
                    <input type="hidden" name="num_intentos" value="<?php echo $numIntentos ?>" />

                    <!-- Intervalo -->
                    <input type="hidden" name="intervalo" value="<?php echo $intervalo ?>" />

                    <!--Botones-->
                    <input type="submit" value="Jugar" name="submit">
                    <input type="submit" value="Reiniciar" name="submit">
                    <input type="submit" value="Volver" name="submit">
                </fieldset>
            </form>
            <?php
            echo "<h1 style='color:red;'>" . $error2 . "</h1>";
            ?>
    </body>
</html>