<?php
//inicializo las variables enviadas desde el index
$evento = $_POST['submit'];
$modo = filter_input(INPUT_POST, 'modo');
$error = null;

/**
 * Función jugar que calcula el número a adivinar, recibiendo el tramo 
 * en el que debe buscarlo
 * 
 * @param type $intentos
 * @param type $intentosRealizados
 * @param type $numeroMinimo
 * @param type $numeroMaximo
 * @return type
 */
function jugar($numeroMinimo, $numeroMaximo) {
    //calculo el tramo en el que buscar restando el máximo y el mínimo
    //y después lo divido entre dos para generar el número a sumar al mínimo del tramo
    $diferencia = ($numeroMaximo - $numeroMinimo) / 2;
    //genero el mensaje que muestra el número sugerido y lo devuelvo
    $msj = $numeroMinimo + round($diferencia);
    return $msj;
}

//con un switch controlo la entrada al juego, asignando una acción según el submit que me llega
if (isset($evento)) {
    switch ($evento) {
        case "Empezar":
            if (!$modo) {//si no seleccionan modo muestro un error en la misma página
                header("Location:index.php?error=No has seleccionado el modo de juego");
                exit();
            } else {//inicializo las variables de cada modo de juego
                $numeroMinimo = 0;
                $intentosRealizados = 1; //inicializo los intentos a 1, 
                //porque ya voy a mostrar una opción de número pensado, por lo que ya he realizado un intento
                switch ($modo) {
                    case pow(2, 10):
                        $intentos = 11;
                        $numeroMaximo = $modo;
                        $numGenerado = ($modo / 2); //el primer número generado siempre es el modo de juego 
                        //(máximo valor posible del tramo) dividido entre 2
                        break;
                    case pow(2, 15):
                        $intentos = 16;
                        $numeroMaximo = $modo;
                        $numGenerado = ($modo / 2);
                        break;
                    case pow(2, 20):
                        $intentos = 21;
                        $numeroMaximo = $modo;
                        $numGenerado = ($modo / 2);
                        break;
                }
            }
            break;
        case "Jugar":
            //recojo los valores enviados en los campos hidden del formulario y los asigno a las variables
            $numeroMinimo = filter_input(INPUT_POST, 'minimo');
            $numeroMaximo = filter_input(INPUT_POST, 'maximo');
            $numeroCorrecto = filter_input(INPUT_POST, 'igual');
            $modo = filter_input(INPUT_POST, 'modo');
            $intentos = filter_input(INPUT_POST, 'intentos');
            $intentosRealizados = filter_input(INPUT_POST, 'intentosRealizados');
            $intentosRealizados++;
            if ($intentosRealizados > $intentos) {//si supera los intentos permitidos lo envío a la página de fin,
                //con un mensaje de final de oportunidades y del juego
                header("Location:fin.php?mensaje=¿No he acertado?<br />No me habrás hecho trampas..."
                        . "<br />&gracias=Gracias por jugar conmigo un rato.");
                exit();
            }
            $numGenerado = filter_input(INPUT_POST, 'numeroGenerado');
            //recojo el valor del radio button y con un switch cambio el valor enviado por la acción a relizar
            $intervalo = filter_input(INPUT_POST, 'intervalo');
            switch ($intervalo) {
                case 'mayor'://si el número que hay que adivinar es mayor que el generado, 
                    //el número generado será el valor mínimo del tramo
                    $numeroMinimo = $numGenerado;
                    break;
                case 'menor'://si el número que hay que adivinar es menor que el generado, 
                    //el número generado será el valor máximo del tramo
                    $numeroMaximo = $numGenerado;
                    break;
                case 'igual'://se ha acertado y lo envío a la página fin con el mensaje de fin de juego 
                    $numeroCorrecto = $numGenerado;
                    header("Location:fin.php?mensaje=Sin ningún atisbo de duda "
                            . "puedo afirmar que tu número era el&numero=$numeroCorrecto.<br />&gracias=Gracias por jugar conmigo un rato.");
                    exit();
                    break;
                default :
                    //si no se selecciona intervalo para la búsqueda del número, 
                    //genero un error que muestro y resto un intento para mantener los intentos realizados de manera correcta
                    $error = "No has seleccionado intervalo";
                    $intentosRealizados--;
                    break;
            }
            $numGenerado = jugar($numeroMinimo, $numeroMaximo); //genero el número con los valores asignados
            break;
        case "Reiniciar":
            //en caso de reiniciar el juego, inicializo las variables pertinentes y mantengo las que no cambian.
            $modo = filter_input(INPUT_POST, 'modo');
            $intentos = filter_input(INPUT_POST, 'intentos');
            $intentosRealizados = 1;
            $numeroMinimo = 0;
            $numeroMaximo = $modo;
            $numGenerado = ($modo / 2);
            break;
        case "Volver"://vuelvo al index
            header("Location:index.php");
            exit();
    }
} else {
    //si intentan entrar al jugar.php mediante la url los redirecciono al index
    header("Location:index.php?error2=Hazme el favor de usar el formulario que me he currado, no me entres directamente con la Url.");
    exit();
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>        
    </head>
    <body>        
        <fieldset style="width:40%; background: lemonchiffon; margin:0 auto; padding: 10px;">
            <legend><h2>Has elegido el modo de <?= $modo ?> y <?= $intentos ?> oportunidades</h2></legend>            
            <h3>¿El número es <span style="color: blue;"><?= $numGenerado ?></span>?</h3>
            <h2>Intento <span style="color:red"><?= $intentosRealizados ?></span> de <span style="color: blue">
                    <?= $intentos ?></span></h2>
            <!--Utilizo el formulario con campos ocultos para pasar las variables que necesito usar en el html, ya sean
                como algo simplemente ornamental (cabecera con el modo de juego e intentos totales) o como funcionalidad
                del juego (intentos realizados, número mínimo, máximo, mensaje de error...) y para devolverlas después.-->
        <form action="jugar.php" method="POST"/>                                
            <input type="radio" value="mayor" name="intervalo"/>Mayor<br />
            <input type="radio" value="menor" name="intervalo"/>Menor<br />
            <input type="radio" value="igual" name="intervalo"/>Correcto<br /><br /> 
            <input type="submit" value="Jugar" name="submit"/>
            <input type="submit" value="Reiniciar" name="submit"/>    
            <input type="submit" value="Volver" name="submit"/>                  
            <input type="hidden" value="<?= $intentosRealizados ?>" name="intentosRealizados"/>
            <input type="hidden" value="<?= $numeroMinimo ?>" name="minimo"/>
            <input type="hidden" value="<?= $numeroMaximo ?>" name="maximo"/>
            <input type="hidden" value="<?= $numeroCorrecto ?>" name="igual"/>
            <input type="hidden" value="<?= $numGenerado ?>" name="numeroGenerado"/>            
            <input type="hidden" value="<?= $modo ?>" name="modo"/>
            <input type="hidden" value="<?= $intentos ?>" name="intentos"/><br />
            <input type="hidden" value="<?= $error ?>" name="error"/><br />
        </form>  
        <?=
        "<h1 style='color: red;'>" . $error . "</h1>";
        ?>
    </fieldset>
</html>

