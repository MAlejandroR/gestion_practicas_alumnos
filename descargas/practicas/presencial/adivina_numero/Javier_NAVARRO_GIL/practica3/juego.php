<?php
$f = fopen('log.txt', 'a');

//en la varibale $rango recogemos la opción elegida en el index
$rango = $_POST['rango'];

//en este switch controlamos las acciones de los distintos botones
switch ($_POST['enviar']) {
    case "jugar":
        //recogemos los valores de la variables que en el html hemos guardado como hidden
        $numAd = $_POST['numero'];
        $numMitad = $_POST['mitad'];
        $cont = $_POST['contador'];
        $jugada = $_POST['jugada'];
        $jugada++;

        if ($jugada >= $cont) {
            //en el casod e entre es que se nos han acabado las jugadas
            //la variable se le asigna el valor de false y se le pasa como parametro a la funcion header
            //en el log.txt se graban los datos de fin de programa
            $fin = false;
            fwrite($f, "Fin del juego, no es ha acertado el numero, jugada $jugada");
            fwrite($f, PHP_EOL);
            header("Location:fin.php?fin=$fin");
            exit();
        }
        
        //actualizamos el valor de la variable para seguir calculando el siguiente numero
        $numMitad = ($numMitad / 2);

        //llamamos a la función comprobarNumero y recogemos el valor del nuevo numero generado
        $numAd = comprobarNumero($numAd, $numMitad, $opcion);

        //actualizamos los valores de las variables msj y msj1 con el nuevo valor del numero generado y la jugada en la que nos encontramos
        $msj = "¿El número es $numAd?";
        $msj1 = "Jugada $jugada";
        
        //grabamos los datos en el fichero log.txt con la fecha en la que se han producido
        $fecha = date("d-m-y h:i:s", time());
        fwrite($f, "$fecha numero generado $numAd, jugada $jugada");
        fwrite($f, PHP_EOL);
        fwrite($f, "$msj");
        fwrite($f, PHP_EOL);
        fwrite($f, "$msj1");
        fwrite($f, PHP_EOL);
        fwrite($f, PHP_EOL);
        break;
    case "volver":
        header("location:index.php?rango=$rango");
        exit();
        break;
    case "reiniciar":
    default:
        //tanto la opción reiniciar, como la default (que entra nada más cargar la pagina) hacen lo mismo
        //inicializamos la variables a su valor inicial dependiendo de en que rango (variable $rango) se haya seleccionado en el index
        $jugada = 0;
        switch ($rango) {
            case 1:
                $numAd = 512;
                $numMitad = 512;
                $cont = 10;
                $msj = "¿El número es $numAd?";
                break;
            case 2:
                $numAd = 32768;
                $numMitad = 32768;
                $cont = 15;
                $msj = "¿El número es $numAd?";
                break;
            case 3;
                $numAd = 524268;
                $numMitad = 524268;
                $cont = 20;
                $msj = "¿El número es $numAd?";
                break;
        }
        $msj1 = "Jugada $jugada";
        $fecha = date("d-m-y h:i:s", time());
        
        //grabamos los datos de inicio del juego en el fichero log.txt
        fwrite($f, "Inicio del juego");
        fwrite($f, "$fecha numero generado $numAd, jugada $jugada");
        fwrite($f, PHP_EOL);
        fwrite($f, PHP_EOL);
}

//esta funcion analiza la opcion dada por el usuario (mayor, menor o igual) y actualiza la variable $numAd que la devuelve y posteriormente se recoge
function comprobarNumero($numAd, $numMitad, $opcion) {
    $opcion = $_POST['opcion'];
    switch ($opcion) {
        case "mayor":
            $numAd = $numAd + $numMitad;
            break;
        case "menor":
            $numAd = $numAd - $numMitad;
            break;
        case "igual";
            //grabamos los datos de fin de juego en el fichero log.txt con los datos
            //se le asigna el valor a la variable $fin que se le pasa como parametro a header
            $fin = true;
            
            $fecha = date("d-m-y h:i:s", time());
            fwrite($f, "Fin del juego");
            fwrite($f, "$fecha se ha acertado el numero $numAd");
            fwrite($f, PHP_EOL);
            header("location:fin.php?fin=$fin&num=$numAd");
            exit();
            break;
    }
    return $numAd;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>


        <fieldset style="width: 40%">
            <legend>Empieza el juego</legend>
            <?php
            echo $msj . "<br>";
            echo $msj1 . "<br>";
            ?>
            <fieldset>
                <legend>Indica cómo es el número qué has pensado</legend>
                <form action="juego.php" method="POST" >
                    <input type="radio" name="opcion" value="mayor" id="">Mayor<br>
                    <input type="radio" name="opcion" value="menor" id="">Menor<br>
                    <input type="radio" name="opcion" value="igual" id="">Igual<br>
                    <hr />
                    <input type="submit" value="jugar" name="enviar" >
                    <input type="submit" value="reiniciar" name="enviar" >
                    <input type="submit" value="volver" name="enviar"  >
                    <!--los siguientes inputs recogemos las variables que vamos a ir utilizando y actualizando a lo largo del juego-->
                    <input type="hidden" value="<?php echo $cont ?>" name="contador">
                    <input type="hidden" value="<?php echo $numAd ?>" name="numero">
                    <input type="hidden" value="<?php echo $numMitad ?>" name="mitad">
                    <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
                    <input type="hidden" value="<?php echo $rango ?>" name="rango">
                </form>
            </fieldset>

        </fieldset>

    </body>
</html>