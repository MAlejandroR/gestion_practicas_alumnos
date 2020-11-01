<?php
$msj = true; //nos servira par aq nos redirija a la otra pagina
$f = fopen("log.txt", "a");
$fecha = "";
$numMa = 0;

//$aux;
switch ($_POST['submit']) {
    case 'empezar'://incializamos los valores
    case 'reiniciar':
        $intentos = $_POST['num_intentos']; //obtengo los intentos
        echo "$intentos";
        $max = pow(2, $intentos); //le asiganmos el número máximo  (2^10) /2 =512
        $min = 1; //
        $numMa = $max / 2;
        $jugadas = 0; //jugadas a 0

        break;
    case 'jugar'://obtengo los intentos


        $intentos = $_POST['num_intentos']; //obtenmos los intentos que lleva
        $jugadas = $_POST['jugada']; // obtenemos las jugadas que lleva
        $numMa = $_POST['num']; //obtenemos el numero de la maquina
        $max = $_POST['max']; //el maximo numero q tiene q adivinar
        $min = $_POST['min']; //el minimo numero q tiene q adivinar
        if (isset($_POST['rtdo'])) {//comprobamos q se haya inicializado los radios
            $jugadas++; //incrementamos las jugadas
            $datos = $_POST['rtdo']; //recibe < > o =

            if ($jugadas <= 10) {//si intentos es mayor a 0 seguira jugando hasta q sea 0
                if ($datos == "=") {//si es igual
                    header("location:fin.php?mensaje=$msj"); //nos lleva a esta página si es true le psamos el $msj
                } else if ($datos == "<") {//si le numero pensado es menor al de la maquina

                    $max = $numMa;//el maximo sera el numero pemsado de la maquina
                } else {

                    $min = $numMa;//si es minimo sera el numero pensado de lmaquina 
                }
                //primero preguntamos si es mayor, menor o igual y segun eso realizamo la operacion.
                //el nuevo numero de la máquina sera la suma entre el maximo y el minimo partido 2
                $numMa = ceil(($max + $min) / 2);
            } else {
                $msj = false;
                header("location:fin.php?mensaje=$msj"); //si no a esta xdd (es la misma ) salu2
            }

            $fecha = date("d-m-Y H:I:S", time());
            fwrite($f, "$fecha jugadas $jugadas, numero pensado de la máquina $numMa");
            fwrite($f, PHP_EOL);
        }
        break;

    case 'volver':
        header("Location:index.php"); //volvemos al index.php
        break;

    default:
        header("Location:index.php"); //volvemos al index.php
        break;
}
fclose($f);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Jugar</title>
    </head>
    <body style="width: 60%;float:left;margin-left: 20%; ">

        <h3></h3>
        <fieldset style="width:40%;background:#81F781 ">
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST" >
                <h2> <?php echo "El número es $numMa ?"; ?> </h2><!-- Imprimo el número de la máquina-->
                <h5> Jugada <?php echo "$jugadas"; ?> </h5><!-- las jugadas que lleva-->

                <!-- pasamos todos los datos que necesitamos por hidden para recibirlos en el php-->
                <input type="hidden" value="<?php echo "$intentos"; ?>" name="num_intentos">
                <input type="hidden" value="<?php echo "$numMa"; ?>" name="num">
                <input type="hidden" value="<?php echo "$max"; ?>" name="max">
                <input type="hidden" value="<?php echo "$min"; ?>" name="min">
                <input type="hidden" value="<?php echo "$jugadas"; ?>" name="jugada">
                <fieldset>
                    <legend>Indica como es el número que has pensado</legend>
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
