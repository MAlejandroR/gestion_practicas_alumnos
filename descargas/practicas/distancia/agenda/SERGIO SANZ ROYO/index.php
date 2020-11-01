<?php
    // Declara el array teléfonos
    $contactos = isset($_POST['telefonos']) ? json_decode($_POST['telefonos'], true) : [];


    // Si existen los campos nombre y teléfono, se procesa el formulario
    if (isset($_POST['nombre']) && isset($_POST['telefono'])) {

        // Comprueba que no haya errores
        if (empty($_POST['nombre'])) $error = 'Tienes que indicar el nombre del contacto.';
        if (!empty($_POST['telefono']) && !is_numeric($_POST['telefono'])) $error = 'El teléfono solo puede contener números.';

        // Si no hay errores continua la ejecución
        if (!isset($error)) {
            // Si existe el nombre pero no el teléfono, el contacto asociado al nombre se borra de la agenda
            if (!empty($_POST['nombre']) && empty($_POST['telefono'])) {
                if (!array_key_exists($_POST['nombre'], $contactos)) $error = 'Rellena el número de teléfono.';
                if (!isset($error)) unset($contactos[$_POST['nombre']]);
            }

            // Si no hay errores se actualiza el array de contactos
            if (!isset($error) && !empty($_POST['telefono'])) $contactos[$_POST['nombre']] = $_POST['telefono'];
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Agenda</h1>
    <?php if (sizeof($contactos) > 0): ?>
        <fieldset>
            <legend>Contactos guardados</legend>
            <ul>
                <?php foreach ($contactos as $nombre => $telefono): ?>
                    <li><?php echo $nombre . ' (' . $telefono . ')' ?></li>
                <?php endforeach; ?>
            </ul>
            <form action="index.php" method="POST">
                <div class="buttons">
                    <button class="button">Borrar contactos</button>
                </div>
            </form>
        </fieldset>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="error"><?php echo 'Error: ' . $error ?></div>
    <?php endif; ?>
    <form action="index.php" method="POST">
        <fieldset>
            <legend>Añadir contacto</legend>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="telefono" placeholder="Teléfono">
            <input type="submit" value="Añadir contacto">
            <input type="hidden" name="telefonos" value='<?php echo json_encode($contactos) ?>'>
        </fieldset>
    </form>
</body>
</html>
