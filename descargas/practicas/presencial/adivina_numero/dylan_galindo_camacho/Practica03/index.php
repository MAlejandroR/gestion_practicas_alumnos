<?php 
    // Variables...
    $info = "";
    $infoIntentos = "";
    
    // Al hacer clic en el BTN empezar juego...
    if (isset($_POST['enviar'])) {
        // Si ha seleccionado un valor en el radio, obtenemos su valor...
        if (isset($_POST['seleccionar'])){
            // Obtenemos el valor radio y ocultamos el form de radio (intervalos)...
            $radio = filter_input(INPUT_POST, 'seleccionar');
            header("Refresh:0; url=jugar.php?info=$radio");
            exit();
        } else {
            $info = 'Debes seleccionar una opción.';
        }        
    }
    
    // Si en jugar.php, hemos echo clic BTN volver que nos envie los intentos....
    $intentos = filter_input(INPUT_GET, 'intent');
    $check = 0; // Para mantener seleccionado el intervalo que estabamos jugando...
    // Segun el valor del rango que elegimos, al volver tendrea 'x' intentos...
    if ($intentos == 1024) {
        // Si el rango es 1024 tendra 10 intentosnar ...
        $infoIntentos = "Volvemos a jugar, antes teniamos <b>10 intentos</b> (intervalo 1)."
                . "<br> Elige un rango para adivinar el numeroº";
        $check = 1; // Le damos un valor, para realizar operacion si tiene este nº, check primero...
    } elseif ($intentos == 65536) {
        // Si el rango es 65536 tendra 15 intentos...
        $infoIntentos = "Volvemos a jugar, antes teniamos <b>15 intentos</b> (intervalo 2)."
                . "<br> Elige un rango para adivinar el numeroº";
        $check = 2;
    } elseif ($intentos == 1048576) {
        // Si el rango es 1048576 tendra 20 intentos...
        $infoIntentos = "Volvemos a jugar, antes teniamos <b>20 intentos</b> (intervalo 3)."
                . "<br> Elige un rango para adivinar el numero";
        $check = 3;
    }

    // Eliminar el log para volver a empezar...
    $file = "./log.txt";
    // Si existe que lo elimine
    if (file_exists($infoIntentos))
        unlink($file);
    else 
        unlink($file);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Información del juego</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <fieldset>
            <legend><h1>Juego adivina número</h1></legend>
            
            <h2>Debes de adivinar un número que yo genero</h2>
            <h2>El número está entre 0 y 1024</h2>
            <h2>Cada vez que verifiques yo te diré</h2>
            <ul>
                <ol>Si el número buscado es mayor</ol>
                <ol>Si el número buscado es menor</ol>
                <ol>Si has aceertado el número</ol>
            </ul>
            <h2>Tienes 10 intentos</h2>
            <h2>Se te indicará el número de intentos que llevas</h2>
                        
            <h3 style="color: red"><?php echo $info ?></h3>
            <fieldset>
                <legend>Selecciona intervalo para empezar</legend>   
                
                <form method="POST">
                    <div>
                        <input type="radio" name="seleccionar" value="1024" <?php if ($check == 1){echo 'checked="checked"';} ?>/>
                        <label for="title">1 - 1024 (2<sup>10</sup>) "10 intentos"</label>
                        <br />
                        <input type="radio" name="seleccionar" value="65536" <?php if ($check == 2){echo 'checked="checked"';} ?> />
                        <label for="title">1 - 65536 (2<sup>15</sup>) "15 intentos"</label>
                        <br /> 
                        <input type="radio" name="seleccionar" value="1048576" <?php if ($check == 3){echo 'checked="checked"';} ?>/>
                        <label for="title">1 - 1048576 (2<sup>20</sup>) "20 intentos"</label>
                    </div>
                    <br /><br />
                    <!-- BTN -->                
                    <input type="submit" name="enviar" value="Empezar">
                </form>
            </fieldset>
            
            <h3 style="color: red"><?php echo $infoIntentos ?></h3>
            
        </fieldset>
    </body>
</html>