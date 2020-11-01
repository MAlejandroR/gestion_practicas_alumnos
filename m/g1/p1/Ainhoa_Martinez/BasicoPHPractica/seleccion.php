<?php

$edad = rand(0, 150);
switch (true) {
    case ($edad >= 0 && $edad <= 11):
        $cadena = " eres un niño";
        break;
    case ($edad >= 12 && $edad <= 17):
        $cadena = " eres un adolescente";
        break;
    case ($edad >= 18 && $edad <= 35):
        $cadena = " eres joven";
        break;
    case ($edad >= 36 && $edad <= 65):
        $cadena = " eres un adulto";
        break;
    case ($edad >= 66 && $edad <= 110):
        $cadena = " eres un jubilado";
        break;
    case ($edad > 110):
        $cadena = " tú edad no está contemplada en nuestra encuesta.";
}

header("Refresh:2;url=http://localhost/BasicoPHPractica/index.php");
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Selección</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <div id="enunciado">
            <div class="titulo"><h3>Iteraciones tipo switch</h3></div>
            <div class="parrafo"><strong>switch(true)</strong> Puedo hacerlo gracias a la expresividad de las instrucciones en php</div>
        </div>
        <div id="seleccion">
            <h1>Selecciones en PHP</h1>
            <div class="parrafo">Tienes <?php echo $edad?> y <?php echo $cadena ?></div>

            <div class="parrafo"><strong><a href="seleccion.php">Probar otra edad</a></strong></div>
        </div>
        <div id="volver">
            <form action="index.php" method="POST">
                <input type="submit" value="Volver" name="submit">
            </form>
        </div>
    </body>
</html>