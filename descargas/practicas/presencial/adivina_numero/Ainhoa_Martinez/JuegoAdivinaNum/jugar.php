<?php
$fi = fopen("log.txt", "a");
$fecha = "";
$num = 0;
$msj = true;
switch ($_POST['submit']) {
    case 'Reiniciar':
    case 'Empezar':
        $intentos = $_POST['intentos'];
        $min = 1;
        $max = pow(2, $intentos);
        $num = $max / 2;
        $jugadas = 0;
        break;

    case 'Jugar':
        $intentos = $_POST['intentos'];
        echo "$intentos";
        $jugadas = $_POST['jugadas'];
        $num = $_POST['num'];
        $max = $_POST['max'];
        $min = $_POST['min'];

        if (isset($_POST['valor'])) {
            $jugadas++;
            $seleccion = $_POST['valor'];

            if ($jugadas <= $intentos) {
                if ($seleccion == "igual") {
                    header("Location:fin.php?mensaje=$msj");
                } else if ($seleccion == "menor") {
                    $max = $num;
                } else {
                    $min = $num;
                }
                $num = ceil(($max + $min) / 2);
            } else {
                $msj = false;
                header("Location:fin.php?mensaje=$msj");
            }
            
            $fecha = date("d-m-Y H:I:S", time());
            fwrite($fi, "$fecha jugadas $jugadas, número $num");
            fwrite($fi, PHP_EOL);
        }
        break;
    case 'Volver':
        $intentos = $_POST['intentos'];
        header("Location:index.php?mensaje=$intentos");
        break;
    default:
        header("Location:index.php");
        break;
}
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Jugar</title>
        <style>
            fieldset#principal {
                background: #aeedd6;
                width: 450px;
                margin: 0 auto;
            }

            fieldset#inter {
                width: 80%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <fieldset id="principal">
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST">
                <h2>El número es <?php echo $num ?></h2>
                <p><strong>Jugada <?php echo $jugadas ?> </strong></p>
                <br/>
                <input type="hidden" name="intentos" value="<?php echo "$intentos"; ?>">
                <input type="hidden" name="num" value="<?php echo "$num"; ?>">
                <input type="hidden" name="max" value="<?php echo "$max"; ?>">
                <input type="hidden" name="min" value="<?php echo "$min"; ?>">
                <input type="hidden" name="jugadas" value="<?php echo "$jugadas"; ?>">

                <fieldset id="inter">
                    <legend>Indica cómo es el número que has pensado</legend>
                    <input type="radio" name="valor" value="mayor">Mayor<br/>
                    <input type="radio" name="valor" value="menor">Menor<br/>
                    <input type="radio" name="valor" value="igual">Igual<br/>
                </fieldset>
                <hr/>
                <form action="jugar.php" method="POST">
                    <input type="submit" value="Jugar" name="submit">
                    <input type="submit" value="Reiniciar" name="submit">
                    <input type="submit" value="Volver" name="submit">
                </form>

        </fieldset>
    </body>
</html>