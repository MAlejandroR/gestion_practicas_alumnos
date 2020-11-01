<?php
//Compruebo que se ha dado al botón de empezar, y le asigno el valor a una variable
if (isset($_POST['empezar'])) {
    $empezar = filter_input(INPUT_POST, 'empezar');
}
//Compruebo que se ha elegido una dificultad, y le asigno el valor a una variable
if (isset($_POST['dificultad'])) {
    $dificultad = filter_input(INPUT_POST, 'dificultad');
}
//Switch que depende de si se le ha dado a empezar, jugar, o reiniciar hará
//una cosa u otra
switch ($empezar) {
    //En caso de reiniciar y empezar hace lo mismo, por que al fin y al cabo es 
    //empezar desde cero el juego con la dificultad ya establecida
    case 'reiniciar':
    case 'empezar':
        //inicializao a 0 los intentos y el minimo para todas las dificultades
        $intentos = 0;
        $min = 0;
        //según la dificultad, se establece el valor máximo del número
        //y el número máximo de intentos
        $max = pow(2, $dificultad);
        $maxInt = $dificultad + 1;
        //muestro aquí el número que piensa la maquina por primera vez
        $numPersonaN = $max/2;
        if ($dificultad != 10 && $dificultad != 15 && $dificultad != 20) {
            //en el caso de que no se eligiese dificultad volvería al index 
            //con el mensaje de error
            header("Location:index.php?err=Selecciona una difcultad");
            exit();
        }
        break;
    //en el caso de que se le de a jugar, recibirá los datos mínimo posible del
    //número, máximo, el número de intentos, y la cantidad máxima de intentos  
    case 'jugar':
        $min = filter_input(INPUT_POST, 'minimo');
        $max = filter_input(INPUT_POST, 'maximo');
        $intentos = filter_input(INPUT_POST, 'intentos');
        $maxInt = filter_input(INPUT_POST, 'maxInt');
        // cuando recibe si es mayor, menor o igual el numero que ha pensado la persona
        // modifica los valores según corresponda,
        // compronando previamente que se ha marcado una opción si no vuelve a a cargar
        // la página sin modificar nada
        if (isset($_POST['numPersona'])) {           
            $numPersona = filter_input(INPUT_POST, 'numPersona');
            switch ($_POST['numAdivinar']) {
                case "mayor":
                    $min = $numPersona;
                    $intentos++;
                    break;
                case "menor":
                    $max = $numPersona;
                    $intentos++;
                    break;
                case "acertado":
                    $intentos++;
                    header("Location:acabar.php?intentos=$intentos&max_int=$maxInt&numJugador=$numPersona");
                    exit();
                    break;
            }
            //algoritmo para cuando el num es mayor
            $numPersonaN = $min + round(($max - $min) / 2);
        } else {
            //algoritmo para cuando el num es menor
            $numPersonaN = round(($max - $min) / 2);
        }
        break;
    case 'salir':
        header("Location:index.php");
        exit();
        break;
        break;
    default :
        //si no se le da a ninguno de esos casos, te envía
        //al index con el error
        header("Location:index.php?err=Selecciona una difcultad");
        exit();
        break;
}   
//if que comprueba que no juegue más veces que el número 
//máximo de intentos posibles
if ($intentos > $maxInt) {
    header("Location:acabar.php?intentos=$intentos&max_int=$maxInt&numJugador=$numPersona");
    exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: powderblue">
            <legend><h2>Empieza el juego</h2></legend>
            <form action="jugar.php" method="POST">
                <h2>El número es: <?php echo $numPersonaN ?></h2>
                <!-- Los botones para averiguar si el número es mayor, igual o menor-->
                <input type="radio" value="mayor" name="numAdivinar">mayor<br>     
                <input type="radio" value="menor" name="numAdivinar">menor<br> 
                <input type="radio" value="acertado" name="numAdivinar">igual<br> 
                <!-- Valores hidden  que se reciben por POST-->
                <input type="hidden" value="<?php echo $min ?>" name="minimo">
                <input type="hidden" value="<?php echo $max ?>" name="maximo">
                <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
                <input type="hidden" value="<?php echo $maxInt ?>" name="maxInt">
                <input type="hidden" value="<?php echo $numPersonaN ?>" name="numPersona">
                <input type="hidden" value="<?php echo $dificultad ?>" name="dificultad">
                <!-- Botones para salir, jugar o reiniciar -->
                <input type="submit" value="jugar" name="empezar">       
                <input type="submit" value="reiniciar" name="empezar">
                <input type="submit" value="salir" name="empezar">
            </form>
        </fieldset>
<?php ?>
    </body>
</html>