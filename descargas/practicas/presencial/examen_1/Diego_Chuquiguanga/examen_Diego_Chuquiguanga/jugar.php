<?php
session_start();
spl_autoload(function($clase) {
    require "$clase.php";
});

$jugadas = unserialize($_SESSION['jugada'] ?? []);
//instancio un objeto de la clase clave


if (isset($_POST['boton'])) {
    $op = filter_input(INPUT_POST, "boton");
    switch ($op) {
        case "Generar":
            $partida = 0;
            $clave = new Clave();
            $clave->generaClave(); //generamos la clave
            $msj = "clave generada ¿JUGAMOS?";

        case "Jugar":
            $colores = [filter_input(INPUT_POST, 'color1'),
                filter_input(INPUT_POST, 'color2'),
                filter_input(INPUT_POST, 'color3'),
                filter_input(INPUT_POST, 'color4')];
            $jugada[] = $jugar = new Jugada($colores, $partida, $clave);
            $partida++;
            foreach ($jugada as $j)
                $jugar->dibujaClave();
            $html_clave .= $jugar;

            break;
        case "Reset":
            $_SESSION['jugada'] = null;
            echo 'has generado una reset';
            break;
    }
}
$_SESSION['jugada'] = serialize('jugada');
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <fieldset>
            <legend>Elige una opción</legend>

            <form action="jugar.php" method="POST">
                <label><br/>Generar la clave <br/>
                    <input type="submit" value="Generar" name="boton">
                </label>

                <label><br/>Resetear los valores<br/>
                    <input type="submit" value="Reset" name="boton">
                </label><!--desabilitar el boton, hasta qu no de a jugar-->
            </form>
        </fieldset>


        <fieldset><!--habilitamos la opcion de juajada-->
            <legend>Elige los colores</legend>
            <form action="jugar.php" method="POST">
                <select name="color1">
                    <option value="azul">Azul</option>
                    <option value="rojo">Rojo</option>
                    <option value="naranja">Naranja</option>
                    <option value="verde">Verde</option>
                    <option value="violeta">Violeta</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="marron">Marrón</option>
                    <option value="rosa">Rosa</option>
                </select>
                <select name="color2">
                    <option value="azul">Azul</option>
                    <option value="rojo">Rojo</option>
                    <option value="naranja">Naranja</option>
                    <option value="verde">Verde</option>
                    <option value="violeta">Violeta</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="marron">Marrón</option>
                    <option value="rosa">Rosa</option>
                </select>
                <select name="color3">
                    <option value="azul">Azul</option>
                    <option value="rojo">Rojo</option>
                    <option value="naranja">Naranja</option>
                    <option value="verde">Verde</option>
                    <option value="violeta">Violeta</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="marron">Marrón</option>
                    <option value="rosa">Rosa</option>
                </select>
                <select name="color4">
                    <option value="azul">Azul</option>
                    <option value="rojo">Rojo</option>
                    <option value="naranja">Naranja</option>
                    <option value="verde">Verde</option>
                    <option value="violeta">Violeta</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="marron">Marrón</option>
                    <option value="rosa">Rosa</option>
                </select>

                <input type="submit" name="boton" value="Jugar">
                <?php
                ?>
            </form>
        </fieldset>
        <fieldset><!--desplegaremos la clave-->
            <legend>Clave Generada</legend>
            <?= $html_clave ?>
        </fieldset>


        <?= $msj ?>
    </body>
</html>
