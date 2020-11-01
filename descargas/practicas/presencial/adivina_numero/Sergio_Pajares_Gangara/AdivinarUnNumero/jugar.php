<?php
//Creamos el fichero 
$f = fopen("log.txt", "a");
//Recogemos la variable num_intentos con los valores pasados desde el index
$num_intentos = $_GET['num_intentos'];
switch ($_POST['submit']) {
    case "jugar":
        //Guardamos las variables en las que su valor va a camibiaar
        $numero_intentos_total = filter_input(INPUT_POST, "numero_intentos_total");
        $num_inicial = filter_input(INPUT_POST, "num_inicial");
        $jugadas = filter_input(INPUT_POST, "jugadas");
        $numMitad = filter_input(INPUT_POST, "numMitad");
        $num_intentos = filter_input(INPUT_POST, "num_intentos");
        $jugadas++;
        //Variable creada para hacer el algoritmo del numero
        $numMitad = ($numMitad / 2);
        //Escribimos en el fichero
        $fecha = date("d:m:y h:i:s", time());
        fwrite($f, "$fecha número es $num_inicial y llevas tantos intentos $jugadas");
        fwrite($f, PHP_EOL);
       //Miramos que los intentos no superen al numero de jugadas, en ese caso ya no se puede seguir jugando
        if ($jugadas < $numero_intentos_total) {
             //Guardamos la opcion elegida para saber si el numero tiene que ser mayor,menor o igual
            switch ($_POST['rtdo']) {
                case '>':
                    //llamamos ala funcion qe hara la validacion del numero
                    $num_inicial = validaMayor($num_inicial, $numero_intentos_total, $jugadas, $numMitad);
                    break;
                case '<':
                    $num_inicial = validaMenor($num_inicial, $numero_intentos_total, $jugadas, $numMitad);
                    break;
                case '=':
                    header("Location:sitio.php");
                    exit();
                    break;
            }
        }else{
            //Si pasan las jugadas salimos al archivo sitio
            header("Location:sitio.php");
            exit();
        exit();
        }
        
        break;
    case "volver":
        //volver a la pagina de inicio
        $fecha = date("d:m:y h:i:s", time());
        fwrite($f, "$fecha ha vuelto a la página principal");
        fwrite($f, PHP_EOL);
        header("Location:index.php");
        exit();
        break;
    case "reiniciar":
        //Volvemos a cargar todos los valores 
        $jugadas = 0;
        $min = 0;
        $num_intentos = filter_input(INPUT_POST, "num_intentos");
        $fecha = date("d:m:y h:i:s");
        fwrite($f, "$fecha ha reiniciado el juego");
        fwrite($f, PHP_EOL);
        switch ($num_intentos) {
            //segun el valor eledigo cargaremos un numero de intentos u otro
            case 1:
                $numero_intentos_total = 10;
                $max = pow(2, $numero_intentos_total);
                $num_inicial = ($min + $max) / 2;
                $numMitad = ($min + $max) / 2;
                break;
            case 2:
                $numero_intentos_total = 15;
                $max = pow(2, $numero_intentos_total);
                $num_inicial = ($min + $max) / 2;
                $numMitad = ($min + $max) / 2;
                break;
            case 3:
                $numero_intentos_total = 20;
                $max = pow(2, $numero_intentos_total);
                $num_inicial = ($min + $max) / 2;
                $numMitad = ($min + $max) / 2;
                break;
        }
        
        break;
    default:
        //Cargamos la pagina con todos los valores directamente
        $numero_intentos_total = $_GET['numero_intentos'];
        $jugadas = 0;
        $min = 0;
        $max = pow(2, $numero_intentos_total);
        $num_inicial = ($min + $max) / 2;
        $numMitad = ($min + $max) / 2;
        $fecha = date("d:m:y h:i:s");
        fwrite($f, "$fecha intento de acceso directo");
        fwrite($f, PHP_EOL);
        break;
}
//cerramos el fichero
fclose($f);
function validaMayor($num, $numero_intentos_total, $jugadas, $numMitad) {
    //Miramos que las jugadas no superen los intentos
    if ($jugadas < $numero_intentos_total) {
        //Hacemos la algoritmia del numero a adivinar cuando seleccione la opcion de mayor
        $num = $num + $numMitad;
        return $num;
    } else {
        //si supera los intentos va al sitio
        header("Location:sitio.php");
        exit();
    }
}

function validaMenor($num, $numero_intentos_total, $jugadas, $numMitad) {
     //Miramos que las jugadas no superen los intentos
    if ($jugadas < $numero_intentos_total) {
        //Hacemos la algoritmia del numero a adivinar cuando seleccione la opcion de menor
        $num = $num - $numMitad;
        return $num;
    } else {
        //si supera los intentos va al sitio
        header("Location:sitio.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <fieldset>
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST" >
                <h2> El numero es <?php echo $num_inicial; ?> ?</h2>
                <h5> Jugada <?php echo $jugadas ?> </h2>
                    <input type="hidden" value="<?php echo $jugadas; ?>" name="jugadas">
                    <input type="hidden" value="<?php echo $num_inicial; ?>" name="num_inicial">
                    <input type="hidden" value="<?php echo $numMitad; ?>" name="numMitad">
                    <input type="hidden" value="<?php echo $numero_intentos_total; ?>" name="numero_intentos_total">
                    <input type="hidden" value="<?php echo $num_intentos; ?>" name="num_intentos">
                    <fieldset>
                        <legend>Indica c&oacutemo es el n&uacutemero qu&eacute has pensado</legend>
                        <input type="radio" name="rtdo" value='>'> Mayor<br />
                        <input type="radio" name="rtdo" value='<'> Menor<br />
                        <input type="radio" name="rtdo" value='='> Igual<br />
                    </fieldset>
                    <hr />
                    <input type="submit" value="jugar" name="submit" >
                    <input type="submit" value="reiniciar" name="submit"  >
                    <input type="submit" value="volver" name="submit"  >
            </form>
        </fieldset>
    </body>
</html>