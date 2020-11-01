<?php
    // Si el número y la jugada no están definidos se redirecciona a la página principal 
    if (!isset($_GET['numero']) && !isset($_GET['jugada'])) {
        header('Location: index.php');
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
    <h1>¡El número es <?php echo $_GET['numero'] ?>!</h1>
    <h2>Acertado en <?php echo $_GET['jugada'] ?> jugada<?php if ($_GET['jugada'] > 1) echo 's' ?>.</h2>
    <a href="index.php">¡Volver a jugar!</a>
</body>
</html>
