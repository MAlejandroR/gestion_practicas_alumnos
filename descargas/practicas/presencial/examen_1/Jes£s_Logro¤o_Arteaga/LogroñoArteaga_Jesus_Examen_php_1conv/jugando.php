<?php

function __autoload($class) {
    require_once( $class . ".php");
}

//<div class="botones">
//         <form   action="jugando.php" method="POST">
//           <input type="hidden" name="mostrar" value="si">
//         <input type="submit" value="mostrar">
//   </form>
// <form   action="jugando.php" method="POST">
//   <input type="hidden" name="mostrar" value="no">
// <input type="submit" value="ocultar">
//</form>
//</div>
//<select name = "">
//<option value = "">Ingles</option>
$c = new Clave();



$colores[0] = $_POST['color1'];
$colores[1] = $_POST['color2'];
$colores[2] = $_POST['color3'];
$colores[3] = $_POST['color4'];

$clave = new Clave();
$juego = new Jugada($clave, $colores);
var_dump($juego);
?>


<html>
    <head>
        <title>Jugar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">

            .clave{
                float: right;
                border: solid;
                width: 200px;
                height: 200px;

            }

            .botones{
                float: left;
                border: solid;
                width: 200px;
                height: 200px;

            }

        </style>
    </head>
    <body>
        <fieldset>
            <legend>
                Bienvenido al juego Mastermind
            </legend>


        </fieldset>


        <div id="elige">
            <form action="jugando.php" method="POST">

                <select name = "color1">
                    <option value = "azul" >azul</option>
                    <option value = "rojo">rojo</option>
                    <option value = "marron">marron</option>
                    <option value = "amarillo">amarillo</option>
                    <option value = "rosa">rosa</option>
                    <option value = "naranja">naranja</option>
                    <option value = "verde">verde</option>
                    <option value = "violeta">violeta</option>
                </select>
                <select name = "color2">
                    <option value = "azul">azul</option>
                    <option value = "rojo">rojo</option>
                    <option value = "marron">marron</option>
                    <option value = "amarillo">amarillo</option>
                    <option value = "rosa">rosa</option>
                    <option value = "naranja">naranja</option>
                    <option value = "verde">verde</option>
                    <option value = "violeta">violeta</option>
                </select>
                <select name = "color3">
                    <option value = "azul">azul</option>
                    <option value = "rojo">rojo</option>
                    <option value = "marron">marron</option>
                    <option value = "amarillo">amarillo</option>
                    <option value = "rosa">rosa</option>
                    <option value = "naranja">naranja</option>
                    <option value = "verde">verde</option>
                    <option value = "violeta">violeta</option>
                </select>
                <select name = "color4">
                    <option value = "azul">azul</option>
                    <option value = "rojo">rojo</option>
                    <option value = "marron">marron</option>
                    <option value = "amarillo">amarillo</option>
                    <option value = "rosa">rosa</option>
                    <option value = "naranja">naranja</option>
                    <option value = "verde">verde</option>
                    <option value = "violeta">violeta</option>
                </select>
                <input type="submit" value="jugar">
            </form>
        </div>
        <div>
            <?php
            echo $juego->getC1(), "<br>";
            echo $juego->getC2(), "<br>";
            echo $juego->getC3(), "<br>";
            echo $juego->getC4(), "<br>";
            ?>

        </div>
        <br><br>

        <div class="clave" style=<?php echo $mostrar ?> >
            Codigo<br>
            <?=
            $c;
            ?>
        </div>
    </body>
</html>


