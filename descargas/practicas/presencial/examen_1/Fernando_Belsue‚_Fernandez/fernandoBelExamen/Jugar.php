<?php
    
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugar
 *
 * @author fernando
 */
class Jugar {
    
    
    
    public function __construct() {
        $coloresUsuario = [];
        $color1 = filter_input(INPUT_POST, 'colorUnoElegido');
        $color2 = filter_input(INPUT_POST, 'colorDosElegido');
        $color3 = filter_input(INPUT_POST, 'colorTresElegido');
        $color4 = filter_input(INPUT_POST, 'colorCuatroElegido');
        
        $coloresUsuario = [$color1, $color2, $color3, $color4];
        return $coloresUsuario;
    }
    
    //header("Location:fin.php?num_intentos=$numIntentos&max_intentos=$maxIntentos&num=$numPensado");
    
    public static function obtenerSolucion(){
        
    }
    
    //header("Location:fin.php?num_intentos=$numIntentos&max_intentos=$maxIntentos&num=$numPensado");
 
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Juega</title>
    </head>
    <body>
        <fieldset>
            <legend><h3>Empieza el juego</h3></legend>
            <h4>Jugada <?php echo $numIntentos ?></h4>
            <form action="Jugar.php" method="POST">
                <fieldset>
                    <legend>Elige los colores que has pensado para la clave</legend>
                    <select type="text" name="colorUno" value="">
                        <option value="Verde">Verde</option>
                        <option value="Marron">Marron</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Gris">Gris</option>
                        <option value="Azul">Azul</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Violeta">Violeta</option>
                    </select>
                    <select type="text" name="colorDos" value="">
                        <option value="Verde">Verde</option>
                        <option value="Marron">Marron</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Gris">Gris</option>
                        <option value="Azul">Azul</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Violeta">Violeta</option>
                    </select>
                    <select type="text" name="colorTres" value="">
                        <option value="Verde">Verde</option>
                        <option value="Marron">Marron</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Gris">Gris</option>
                        <option value="Azul">Azul</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Violeta">Violeta</option>
                    </select>
                    <select type="text" name="colorCuatro" value="">
                        <option value="Verde">Verde</option>
                        <option value="Marron">Marron</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Gris">Gris</option>
                        <option value="Azul">Azul</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Violeta">Violeta</option>
                    </select>
                    
                    <!--OCULTOS.-->
                    <input type="hidden" name="colorUnoElegido" value="<?php echo "$color1" ?>" />
                    <input type="hidden" name="colorDosElegido" value="<?php echo "$color2" ?>" />
                    <input type="hidden" name="colorTresElegido" value="<?php echo "$color3" ?>" />
                    <input type="hidden" name="colorCuatroElegido" value="<?php echo "$color4" ?>" />

                    <!--Botones-->
                    <input type="submit" value="Jugar" name="submit">
                    <input type="submit" value="Ver jugada" name="verJugada">
                    <input type="submit" value="Volver" name="volver">
                </fieldset>
            </form>
            <?php
            echo "<h1 style='color:red;'>" . $error . "</h1>";
            var_dump($coloresUsuario);
            ?>
        </fieldset>
    </body>
</html>