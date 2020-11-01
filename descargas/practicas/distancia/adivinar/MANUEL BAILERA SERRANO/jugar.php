<?php
// Compruebo si se ha seleccionado una opción en el menú del inicio
if (isset($_POST['opcion'])) {
    // Si es así, asigno el valor de esa selección a la variable $opción
    $opcion = $_POST['opcion'];
} else {
    // Si no, devuelvo al usuario al inicio
    header("location:index.php");
}

// Compruebo si se ha pulsado un botón de acción (submit con name "menu")
if (isset($_POST['menu'])) {
    // Si es así, asigno el valor de esa acción a la variable $menu
    $menu = $_POST['menu'];
} else {
    // Si no, asigno el valor "Reiniciar" a la variable $menu
    // (lo llamo "Reiniciar", pero en este caso sirve también para iniciar por 1ª vez)
    $menu = "Reiniciar";
}

// En función del botón presionado por el usuario, se ejecuta una u otra acción
switch ($menu) {
    case 'Jugar':
        $jugada = $_POST['jugada']; // Número de jugada actual
        $intentos = $_POST['intentos']; // Intentos totales
        $limite = $_POST['limite']; // Número máximo del intervalo
        $num = $_POST['num']; // Número de la estimación actual
        $max = $_POST['max']; // Número máximo para la siguiente estimación
        $min = $_POST['min']; // Número mínimo para la siguiente estimación
        $resultado = $_POST['resultado']; // Resultado obtenido en la anterior jugada
        if ($intentos - $jugada == 0) {
            // Si el usuario a agotado los intentos sin que el programa haya acertado el número
            // Se le lleva a la página "fin.php", pasando por GET la variable "fin"
            header("location:fin.php?fin");
        } else {
            // En función del resultado obtenido se ejecuta una u otra acción
            switch ($resultado) {
                case '>':
                    $jugada++;
                    $min = $num; // Asigno a la variable $min el valor de la anterior estimación
                    $resto = ($min + $max) % 2; // Compruebo si la media de $min y $max es un número par
                    if (!$resto) {
                        // Si no hay resto ($resto = 0, es decir, false), la media es par
                        // Asigno a la variable $num la media de $min y $max
                        $num = ($min + $max) / 2;
                    } else {
                        // Si la media es impar, incremento en una unidad la estimación
                        $num++;
                    }
                    break;
                case '<':
                    $jugada++;
                    $max = $num; // Asigno a la variable $max el valor de la anterior estimación
                    $resto = ($min + $max) % 2; // Compruebo si la media de $min y $max es un número par
                    if (!$resto) {
                        // Si no hay resto ($resto = 0, es decir, false), la media es par
                        // Asigno a la variable $num la media de $min y $max
                        $num = ($min + $max) / 2;
                    } else if ($num == 1) {
                        // Si el número es inferior a 1 (cosa que no permite el programa)
                        // Se le lleva a la página "fin.php"
                        // pasando por GET la variable "aviso"
                        header("location:fin.php?aviso");
                    } else {
                        // Si el cociente es impar, decremento en una unidad la estimación
                        $num--;
                    }
                    break;
                case '=':
                    // A continuación se lleva al usuario a la página "fin.php",
                    // pasando por GET el número de jugada y el número obtenido
                    header("location:fin.php?jugada=$jugada&num=$num");
                    break;
                default:
                    break;
            }
        }
        break;

    case 'Reiniciar';
        echo "<h1>Hola</h1>";
        // Reinicio (o inicializo, según el caso) los valores de las variables
        $jugada = 0; // El primer número que sugiere el programa no cuenta, cuenta a partir de que se pulsa "Jugar"
        $intentos = $opcion; // 10, 16 o 20 según el caso
        $limite = 2 ** $intentos; // 2 elevado a 10, 16 o 20 según el caso
        $max = $limite;
        $min = 0;
        $num = $limite / 2;
        $resultado = null;
        break;

    case 'Volver';
        // Devuelvo al usuario al inicio
        header("location:index.php");
        break;

    default:
        break;
}

?>
<!DOCTYPE html>

<html lang="es">
<head>
    <title>Manuel Bailera - Adivina número</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/estilo.css"/>
</head>
<body>
<header>
    <h1><a href="./">Juego adivina número</a></h1>
</header>
<main>

    <fieldset>
        <legend>Empieza el juego</legend>
        <form action="jugar.php" method="POST">
            <h2>El número es el <span class="destacado"><?php echo $num ?></span> ?</h2>
            <p style="display: none;">(<?php echo $max ?> + <?php echo $min ?>) / 2</p>
            <p>Jugadas realizadas: <span class="destacado"><?php echo $jugada ?></span>, jugadas restantes: <span
                        class="destacado"><?php echo $intentos - $jugada ?></span></p>

            <input type="hidden" value="<?php echo $opcion ?>" name="opcion">
            <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
            <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
            <input type="hidden" value="<?php echo $limite ?>" name="limite">
            <input type="hidden" value="<?php echo $num ?>" name="num">
            <input type="hidden" value="<?php echo $max ?>" name="max">
            <input type="hidden" value="<?php echo $min ?>" name="min">

            <fieldset>
                <legend>Indica cómo es el número que has pensado</legend>
                <input type="radio" name="resultado" value=">" checked>
                Mayor<br>
                <input type="radio" name="resultado" value="<">
                Menor<br>
                <input type="radio" name="resultado" value="=">
                Igual<br>
            </fieldset>

            <input type="submit" value="Jugar" name="menu">
            <input type="submit" value="Reiniciar" name="menu">
            <input type="submit" value="Volver" name="menu">

        </form>
    </fieldset>

</main>
<footer>
    <p>Manuel Bailera Serrano</p>
</footer>
</body>
</html>