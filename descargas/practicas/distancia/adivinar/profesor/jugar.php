
<?php
//Asigno estos valores pasa saber si ya he pasado de las 10 jugadas
//En todos los casos leer� en n�mero de intentos
//O bien viene del index, o del hidden en este mismo script
$num_intentos = filter_input(INPUT_POST, "num_intentos");
//O es la primera jugada o la leo de este script
$jugada = $_POST['jugada']  ?? 0;
$jugada =(isset($_POST['jugada']))? $_POST['jugada']: 0;
//Si esta es la jugada 11 no sigo

if ($jugada > $num_intentos) {//Si ya llevamos mas jugadas de las permitidas terminamos
    header("Location:fin.php?jugada=$jugada");
    exit();
}

//Evaluamos las posibles acciones
//Tenemos códigos de error identificados en el fichero error.php
//Al final se muestran al usuario, solo para desarrollo, quitar en producción
$error  = 5;
switch ($_POST['submit']) {
    case 'reiniciar':
        $jugada = 0;
    case 'empezar':
        $num_intentos = filter_input(INPUT_POST, "num_intentos");
        $min = 1;
        $max = pow(2, $num_intentos);
        $num = intdiv($max, 2);
        break;
    case 'jugar':
        $num = filter_input(INPUT_POST, 'num');
        $max = filter_input(INPUT_POST, 'max');
        $min = filter_input(INPUT_POST, 'min');
        $rtdo = filter_input(INPUT_POST, 'rtdo');
        switch ($rtdo) {
            case '>':
                $min = $num;
                break;
            case '<':
                $max = $num;
                break;
            case '=':

                header("Location:fin.php?jugada=$jugada");
                exit();
                break;
        }
        $num = intdiv(($max - $min), 2) + $min;
        $jugada++;
        //Tb funcionar�a ($max+$min)/2

        break;
    case 'volver':
        header("Location:index.php?intentos=$num_intentos");
        exit();
    default: //vengo del index
}
?>


<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body style="width: 60%;float:left;margin-left: 20%; ">

        <h3><?php echo $msj ?></h3>
        <fieldset style="width:40%;background:bisque ">
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST" >
                <h2> El n&uacutemero es <?php echo $num ?> ?</h2>
                <h5> Jugadas realizadas <span style=" color:darkred"><?php echo ($jugada ) ?></span> Jugadas restantes <span style=" color:darkred"><?php echo ($num_intentos-$jugada ) ?> </h5>

                <input type="hidden" value="<?php echo $num_intentos ?>" name="num_intentos">
                <input type="hidden" value="<?php echo $num ?>" name="num">
                <input type="hidden" value="<?php echo $max ?>" name="max">
                <input type="hidden" value="<?php echo $min ?>" name="min">
                <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
                <fieldset>
                    <legend>Indica c&oacutemo es el n&uacutemero qu&eacute has pensado</legend>
                    <input type="radio" name="rtdo" value=' >' checked> Mayor<br />
                    <input type="radio" name="rtdo" value='<'> Menor<br />
                    <input type="radio" name="rtdo" value='='> Igual<br />
                </fieldset>
                <hr />
                <input type="submit" value="jugar" name="submit" >
                <input type="submit" value="reiniciar" name="submit" <?php echo $reiniciar ?> >
                <input type="submit" value="volver" name="submit"  >

            </form>
        </fieldset>

    </body>
</html>
