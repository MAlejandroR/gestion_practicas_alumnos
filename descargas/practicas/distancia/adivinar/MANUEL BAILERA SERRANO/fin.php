<?php 
    //Compruebo si se ha establecido la variable "jugada"
    if (isset($_GET['jugada'])) {   
        // Si la jugada es igual a 1, asigno un valor a la variable $mensaje
        if ($_GET['jugada'] <= 1) {
            $mensaje = "He adivinado tu número: <span class='destacado'>" . $_GET['num'] . "</span><br>En el primer intento!!!";
        } else if ($_GET['jugada'] != 1) {
        // Si la jugada es distinta a 1, asigno otro valor a la variable $mensaje
            $mensaje = "He adivinado tu número: <span class='destacado'>" . $_GET['num'] . "</span><br>En  " . $_GET['jugada'] . " jugadas!!!";
        }
    // Si no se ha establecido "jugada", compruebo si se ha establecido "fin"
    } else if (isset($_GET['fin'])) {
        // Si se ha establecido, asigno un valor a la variable $mensaje
        $mensaje = "No has sido sincero, debería haberlo adivinado.";
    } else {
        // Si no se ha establecido "jugada" ni "fin", compruebo si se ha establecido "aviso"
        if (isset($_GET['aviso'])) {  
            // Si se ha establecido, asigno un valor a la variable $mensaje
            $mensaje = "El número no puede ser inferior a 1.<br>Revisa las reglas del juego.";
        } else {
            // En caso contrario, redirijo al usuario al menú inicial de la aplicación
            header("location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Manuel Bailera - Adivina número</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./css/estilo.css" />
    </head>
<body>
    <header>
    <h1><a href="./">Juego adivina número</a></h1>
    </header>
    <main>

    <fieldset>
        <legend>Fin del juego</legend>
        <h2><?php echo $mensaje ?></h2>
        <form action="index.php" method="POST">
            <input type="submit" value="Volver al inicio">
        </form>
    </fieldset>

</main>
<footer>
    <p>Manuel Bailera Serrano</p>
</footer>
</body>
</html>