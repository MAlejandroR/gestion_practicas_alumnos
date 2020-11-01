<?php
spl_autoload_register(function($clase) {
    require "$clase.php";
});

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

echo Plantilla::colores();

switch ($_POST['submit']) {
    case 'Empezar':

        empezar();

        break;

    case 'Jugar':

        $jugadaUsuario = [];
        for ($index = 1; $index < count($_POST); $index++) {
            $jugadaUsuario[] = $_POST['color' . $index];
        }

        $clave = unserialize($_SESSION['clave']);
        $jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];
        $jugada = new Jugada($jugadaUsuario, $clave->getClaveGanadora());
        $jugadas[] = $jugada;
        echo Plantilla::muestraJugadas($jugadas);
        compruebaResultado($jugada, count($jugadas));
        $_SESSION['jugadas'] = serialize($jugadas);

        break;

    case 'Mostrar clave':

        if (!$_SESSION['mostrando']) {
            $clave = unserialize($_SESSION['clave']);
            echo $clave;
            $_SESSION['mostrando'] = true;
        } else {
            $_SESSION['mostrando'] = false;
        }

        $jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];

        echo Plantilla::muestraJugadas($jugadas);

        break;
    case 'Reset':

        empezar();


        break;
    default:

        header("Location:index.php");

        break;
}

function empezar() {

    session_destroy();
    session_start();
    $clave = new Clave();
    $_SESSION['clave'] = serialize($clave);
    $_SESSION['mostrando'] = false;
}

function compruebaResultado($jugada, $numJugadas) {

    if ($numJugadas == 5) {
        header("Location:fin.php?mensaje='No has conseguido acertar'");
        exit();
    } else {


        foreach ($jugada->getPosicionesAcertadas() as $value) {
            if ($value == "fallo") {
                return true;
            } else {
                header("Location:fin.php?mensaje=Has acertado en $numJugadas");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    </body>
</html>