<!doctype html>
<?php
$tipo = $_POST["tipo"];
$maximo = pow(2, $tipo);
$intentos = $tipo;
$oportunidades = 0;
$f = fopen("log.txt", "a");
$maximo2 = $maximo / 2;


switch ($_POST['enviar']) {
    case 'Jugar':
        $maximo = filter_input(INPUT_POST, "maximo");
        $maximo2 = filter_input(INPUT_POST, "maximo2");
        $oportunidades = filter_input(INPUT_POST, "oportunidades");
        $intentos = filter_input(INPUT_POST, "intentos");
        $oportunidades++;
        $maximo = $maximo / 2;

        switch ($_POST['resultado']) {
            case 'mayor':
                if ($oportunidades > 10) {
                    header("Location:/AdivinarNumero/fin.php");
                    exit;
                } else {
                    $maximo2 = $maximo2 + intdiv($maximo, 2);
                    $fecha = date("d-m-Y H:I:S", time());
                    fwrite($f, "$fecha . El usuario ha dicho que el número es mayor. Lleva $oportunidades intentos");
                    fwrite($f, PHP_EOL);
                }
                break;

            case 'menor':
                if ($oportunidades > 10) {
                    header("Location:/AdivinarNumero/fin.php");
                    exit;
                } else {
                    $maximo2 = $maximo2 - intdiv($maximo, 2);
                    $fecha = date("d-m-Y H:I:S", time());
                    fwrite($f, "$fecha . El usuario ha dicho que el número es menor. Lleva $oportunidades intentos");
                    fwrite($f, PHP_EOL);
                }
                break;

            case 'igual':
                $oportunidades = filter_input(INPUT_POST, "oportunidades");
                $fecha = date("d-m-Y H:I:S", time());
                fwrite($f, "$fecha . El usuario ha dicho que el número es correcto. Lleva $oportunidades intentos");
                fwrite($f, PHP_EOL);
                header("Location:/AdivinarNumero/fin.php?oportunidades=$oportunidades");
                exit;
                break;
        }
        break;

    case 'Reiniciar':
        $tipo = filter_input(INPUT_POST, "tipo");
        $maximo = pow(2, $tipo);
        $intentos = $tipo;
        $oportunidades = 0;
        $f = fopen("log.txt", "a");
        $maximo2 = $maximo / 2;
        break;

    case 'Volver':
        $intentos2 = filter_input(INPUT_POST, "intentos2");
        header("Location:/AdivinarNumero/index.php?intentos=$intentos");
        exit;
        break;
}

fClose($f);
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        Empieza el juego <br/>
        <h3>¿El número es <?php echo $maximo2 ?>?</h3>
        <h5>Llevas <?php echo $oportunidades ?> oportunidades<br/></h5>
        Indica cómo es el número que has pensado<br/>
        <form action="juego.php" method="POST">
            <input type="radio" value="mayor" name="resultado">Mayor<br/>
            <input type="radio" value="menor" name="resultado">Menor<br/>
            <input type="radio" value="igual" name="resultado">Igual<br/>
            <input type="submit" name="enviar" value="Jugar">
            <input type="submit" name="enviar" value="Reiniciar">
            <input type="submit" name="enviar" value="Volver">
            <input type="hidden" value="<?php echo $maximo2 ?>" name="maximo2">
            <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
            <input type="hidden" value="<?php echo $maximo ?>" name="maximo">
            <input type="hidden" value="<?php echo $oportunidades ?>" name="oportunidades">
            <input type="hidden" value="<?php echo $tipo ?>" name="tipo">

        </form>
    </body>
</html>

