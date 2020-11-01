<?php

class Plantilla {

    static function colores() {


        return "            <form action='jugar.php' method='post'>


              <select name='color1'>
                <option value='azul'>Azul</option>
                <option value='rojo'>Rojo</option>
                <option value='naranja'>Naranja</option>
                <option value='verde'>Verde</option>
                <option value='violeta'>Violeta</option>
                <option value='amarillo'>Amarillo</option>
                <option value='marron'>Marrón</option>
                <option value='rosa'>Rosa</option>
              </select>
              <select name='color2'>
                <option value='azul'>Azul</option>
                <option value='rojo'>Rojo</option>
                <option value='naranja'>Naranja</option>
                <option value='verde'>Verde</option>
                <option value='violeta'>Violeta</option>
                <option value='amarillo'>Amarillo</option>
                <option value='marron'>Marrón</option>
                <option value='rosa'>Rosa</option>
              </select>
              <select name='color3'>
                <option value='azul'>Azul</option>
                <option value='rojo'>Rojo</option>
                <option value='naranja'>Naranja</option>
                <option value='verde'>Verde</option>
                <option value='violeta'>Violeta</option>
                <option value='amarillo'>Amarillo</option>
                <option value='marron'>Marrón</option>
                <option value='rosa'>Rosa</option>
              </select>
              <select name='color4'>
                <option value='azul'>Azul</option>
                <option value='rojo'>Rojo</option>
                <option value='naranja'>Naranja</option>
                <option value='verde'>Verde</option>
                <option value='violeta'>Violeta</option>
                <option value='amarillo'>Amarillo</option>
                <option value='marron'>Marrón</option>
                <option value='rosa'>Rosa</option>
              </select>
<br>
            <input type='submit' value='Jugar' name='submit'>
            <input type='submit' value='Mostrar clave' name='submit'>
            <input type='submit' value='Reset' name='submit'>


            </form>";
    }

    static function muestraJugadas($jugadas) {

        $cadena = "<div> ";



        foreach ($jugadas as $index => $jugada) {

            $cadena .= "<h1>Jugada número " . $index . "</h1><div> <h1>Colores acertados</h1>";

            foreach ($jugada->getColoresAcertados() as $value) {


                $cadena .= $value . " ";
            }

            $cadena .= "</div>";
            $cadena .= "<div> <h1>Posiciones acertadas</h1>";

            foreach ($jugada->getPosicionesAcertadas() as $value) {


                $cadena .= $value . " ";
            }
            $cadena .= "</div>";
        }
        $cadena .= "</div>";
        return $cadena;
    }

}

?>