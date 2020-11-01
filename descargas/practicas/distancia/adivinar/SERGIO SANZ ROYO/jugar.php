<?php
    // Establece las variables
    $jugada = $_POST['jugada'] ?? 1;
    $intentos = $_POST['intentos'] ?? $_POST['intervalo'];
    $numero = $_POST['numero'] ?? 1023;//rand(1, pow(2, $intentos));
    $rango_min = $_POST['rango_min'] ?? 1;
    $rango_max = $_POST['rango_max'] ?? pow(2, $intentos);

    // Genera un nuevo número
    if ($jugada < $intentos) {
        if (isset($_POST['comparacion'])) {
            if ($_POST['comparacion'] == 'igual') {
                // Ha acertado el número
                header("Location: fin.php?jugada=$jugada&numero=$numero");
                die();
            } else {
                // Sigue jugando
                if ($_POST['comparacion'] == 'mayor') $rango_min = $numero + 1;
                if ($_POST['comparacion'] == 'menor') $rango_max = $numero - 1;
                $numero = floor(($rango_min + $rango_max) / 2);
                $jugada++;
            }
        }
    } else {
        // Ha superado el número de intentos
        header("Location: fin.php?jugada=$jugada&numero=$numero");
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina el número</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>¿El número es <?php echo $numero ?>?</h1>
    <form action="jugar.php" method="POST">
        <fieldset>
            <legend>Indica cómo es el número que has pensado</legend>
            <div>
                <label><input type="radio" name="comparacion" value="mayor"> Mayor</label>
                <label><input type="radio" name="comparacion" value="menor" checked> Menor</label>
                <label><input type="radio" name="comparacion" value="igual"> Igual</label>
            </div>
            <div class="buttons">
                <input class="button" type="submit" value="Siguiente">
            </div>
        </fieldset>
        <input type="hidden" name="numero" value="<?php echo $numero ?>">
        <input type="hidden" name="jugada" value="<?php echo $jugada ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
        <input type="hidden" name="rango_min" value="<?php echo $rango_min ?>">
        <input type="hidden" name="rango_max" value="<?php echo $rango_max ?>">
    </form>
</body>
</html>
