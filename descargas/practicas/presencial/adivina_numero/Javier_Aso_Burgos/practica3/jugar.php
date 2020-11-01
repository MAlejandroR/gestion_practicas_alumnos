<?php
//Declaro las variables necesarias:
$numIntentos;
$intentosPermitidos;
$min;
$max;
$valorMedio;
$posicion;


//Guardamos en la variable acceso el valor submit. Así sabremos desde donde se ha llegado a esta página
//y podemos actuar en consecuencia.
$acceso = filter_input(0, "submit");

switch (true) {

    case $acceso == "empezar":
    case $acceso == "reiniciar":
        iniciaVariables($numIntentos, $intentosPermitidos, $min, $max, $valorMedio, $posicion); //Si venimos del index o reseteamos partida

        break;

    case $acceso == "jugar"://Si estamos en medio del juego
        if (juega($numIntentos, $intentosPermitidos, $min, $max, $valorMedio, $posicion)) {//Si juega() devuelve true es que el usuario ha acertado y será redirigido al fin.php
            header("Location:fin.php?resultado=$numIntentos&dificultad=$intentosPermitidos"); //Meto por get el numero de jugadas y la dificultad
            exit(); //Asi que pongo un exit para que deje de ejecutarse el código en el servidor.
        }
        break;

    case $acceso == "volver":
        $dificultad = filter_input(0, "dificultad");
        echo $dificultad;
        header("Location:index.php?dificultad=$dificultad");
        exit();
        break;

    default:

        header("Location:index.php"); //Si se accede a nuestra página sin pasar por el Index.html
        exit();
        break;
}

function iniciaVariables(&$numIntentos, &$intentosPermitidos, &$min, &$max, &$valorMedio, &$posicion) {//Tengo que pasar los valores por referencia,
    //porque los voy a necesitar más tarde con los valores que les asigna esta función.
    $numIntentos = 1;
    $intentosPermitidos = filter_input(0, "dificultad");
    $min = 1;
    $max = pow(2, $intentosPermitidos);
    $valorMedio = floor(($max + $min) / 2);
    $posicion = "igual";
}

function juega(&$numIntentos, &$intentosPermitidos, &$min, &$max, &$valorMedio, &$posicion) {//Tengo que pasar los valores por referencia,
    //porque los voy a necesitar más tarde con los valores que les asigna esta función.
    $intentosPermitidos = filter_input(0, "dificultad");
    $posicion = filter_input(0, "posicion");
    $valorMedio = filter_input(0, "medio");
    if ($posicion == "mayor") {//Si el usuario ha pulsado mayor
        $min = $valorMedio; //Ahora el mínimo será el antiguo valor medio
        $max = filter_input(0, "max"); //El maximo se mantiene
        $valorMedio = floor(($max + $min) / 2); //Calculo el nuevo valor medio
        if ($valorMedio == $min) {//Si el valormedio es igual al minimo, es que ya hemos acorralado el valor del usuario, pero está entre los dos
            //valores, tenemos que sacarlo manualmente. Cómo hemos utilizado la función floor, esto solo sucederá aquí, en el extremo superior.
            $valorMedio++;
        }
    } else {
        if ($posicion == "menor") {
            $max = $valorMedio;
            $min = filter_input(0, "min");
            $valorMedio = floor(($max + $min) / 2);
        } else {
            $numIntentos = filter_input(0, "numIntentos"); //Hemos acertado, recogemos el número de intentos y salimos de la función.

            return true;
        }
    }
    $numIntentos = filter_input(0, "numIntentos") + 1; //Miramos cuantos intentos lleva el usuario
    if ($numIntentos > $intentosPermitidos + 1) {//Si ya se ha pasado, devolvemos true.
        return true;
    }

    return false; //El usuario aun tiene intentos disponibles.
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <fieldset>
            <legend>Empieza el juego</legend>
            <h2>El número es: <?= $valorMedio ?></h2>

            Jugada <?= $numIntentos ?>

            <form action="jugar.php" method="post">

                <fieldset>
                    <legend>Indica cómo es el número que has pensado</legend>
                    <label><input type="radio" name="posicion" value="mayor" <?php if ($posicion == "mayor") echo 'checked' ?>>Mayor</label><br>
                    <label><input type="radio" name="posicion" value="menor" <?php if ($posicion == "menor") echo 'checked' ?>>Menor</label><br>
                    <label><input type="radio" name="posicion" value="igual" <?php if ($posicion == "igual") echo 'checked' ?>>Igual</label><br>

                </fieldset>
                <hr>
                <input type="submit" name="submit" value="jugar">
                <input type="submit" name="submit" value="reiniciar">
                <input type="submit" name="submit" value="volver">
                <input type="hidden" name="dificultad" value="<?= $intentosPermitidos ?>">
                <input type="hidden" name="max" value="<?= $max ?>">
                <input type="hidden" name="min" value="<?= $min ?>">
                <input type="hidden" name="medio" value="<?= $valorMedio ?>">
                <input type="hidden" name="numIntentos" value="<?= $numIntentos ?>">


                </fieldset>

            </form>


    </body>
</html>

