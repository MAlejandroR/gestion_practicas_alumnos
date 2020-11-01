<?php
spl_autoload_register(function($clase) {
    require "$clase.php";
});
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
session_start();
$submit = filter_input(INPUT_POST, "submit");
$msj = "";
$msj2 = "";
$contador = "";
if (isset($submit)) {
    switch ($submit) {
        case "Mostrar / Ocultar":
            if ($msj == "") {
                $clave = isset($_SESSION['clave']) ? $_SESSION['clave'] : new Clave();
                $_SESSION['clave'] = $clave;
                $msj = $clave;
            }
            break;
        case "Jugar":
            $jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];
            $clave = isset($_SESSION['clave']) ? $_SESSION['clave'] : new Clave();
            $contador = isset($_SESSION['contador']) ? $_SESSION['contador'] : 1;
            $_SESSION['clave'] = $clave;
            $_SESSION['contador'] ++;
            if ($contador != 14) {
                $arrayJugada = [];
                $arrayJugada[0] = $_POST['color1'];
                $arrayJugada[1] = $_POST['color2'];
                $arrayJugada[2] = $_POST['color3'];
                $arrayJugada[3] = $_POST['color4'];
                $jugada = new Jugada($clave, $arrayJugada);
                $jugadas[] = $jugada;
                $_SESSION['jugadas'] = serialize($jugadas);
                if ($jugada->compruebaVictoria($clave, $arrayJugada)) {
                    session_destroy();
                    session_start();
                    header("Location: fin.php?estado=victoria");
                } else {
                    krsort($jugadas);
                    foreach ($jugadas as $num => $jugada) {
                        $msj2 .= "La jugada " . ($num + 1) . " tiene el valor " . $jugada . "<br/>";
                    }
                }
            } else {
                session_destroy();
                session_start();
                header("Location: fin.php?estado=limite");
            }
            break;
        case "Reset":
            session_destroy();
            session_start();
            break;
        default:
            break;
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
        <form action="jugar.php" method="post">
            <input type="submit" value="Mostrar / Ocultar" name="submit"/>
            <input type="submit" value="Reset" name="submit"/>
            <input type="submit" value="Jugar" name="submit"/>
            <br/>
            <select name="color1" id="">
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Naranja">Naranja</option>
                <option value="Verde">Verde</option>
                <option value="Violeta">Violeta</option>
                <option value="Amarillo">Amarillo</option>
                <option value="Marrón">Marrón</option>
                <option value="Rosa">Rosa</option>
            </select>
            <select name="color2" id="">
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Naranja">Naranja</option>
                <option value="Verde">Verde</option>
                <option value="Violeta">Violeta</option>
                <option value="Amarillo">Amarillo</option>
                <option value="Marrón">Marrón</option>
                <option value="Rosa">Rosa</option>
            </select>
            <select name="color3" id="">
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Naranja">Naranja</option>
                <option value="Verde">Verde</option>
                <option value="Violeta">Violeta</option>
                <option value="Amarillo">Amarillo</option>
                <option value="Marrón">Marrón</option>
                <option value="Rosa">Rosa</option>
            </select>
            <select name="color4" id="">
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Naranja">Naranja</option>
                <option value="Verde">Verde</option>
                <option value="Violeta">Violeta</option>
                <option value="Amarillo">Amarillo</option>
                <option value="Marrón">Marrón</option>
                <option value="Rosa">Rosa</option>
            </select>
        </form>
        <?= $msj ?><br/>
        <?= $msj2 ?>
    </body>
</html>

