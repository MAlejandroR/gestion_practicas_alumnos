<?php
$num_intentos = $_POST['num_intentos'];
$min = 0;
$max = pow(2, $num_intentos);
$jugada = 0;
$num = ($min + $max) / 2;
switch ($_POST['submit']) {
    case 'jugar':
        filter_input($num_intentos, 'num_intentos');
        filter_input($jugada, 'jugada');
        filter_input($num, 'num');
        filter_input($min, 'min');
        filter_input($max, 'max');
        $num = ($min + $max) / 2;
        switch ($_POST['rtdo']) {
            case '>':
                if ($jugada < $num_intentos) {
                    $num_au = $num / 2;
                    $num = $num + $num_au;
                    $jugada++;
                } else {
                    header("Location:fin.php");
                }
                break;
            case '<':
                if ($jugada < $num_intentos) {
                    $num_au = $num / 2;
                    $num = $num_au;
                    $jugada++;
                } else {
                    header("Location:fin.php");
                }
                break;
            case '=':
                header("Location:fin.php");
                break;
        }
        break;
    case 'reiniciar':
        $jugada = 0;
        $num = ($min + $max) / 2;
        break;
    case 'volver':
        header("Location:index.php");
        exit();
        break;
}
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body style="width: 60%;float:left;margin-left: 20%; ">
        <h3></h3>
        <fieldset style="width:40%;background:bisque ">
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST" >
                <h2> El n&uacutemero es <?php echo $num ?> ?</h2>
                <h5> Jugada <?php echo $jugada ?> </h5>
                <input type="hidden" value="<?php echo $num_intentos ?>" name="num_intentos">
                <input type="hidden" value="<?php echo $num ?>" name="num">
                <input type="hidden" value="<?php echo $max ?>" name="max">
                <input type="hidden" value="<?php echo $min ?>" name="min">
                <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
                <input type="hidden" value="<?php echo $num_au ?>" name="aux">
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
