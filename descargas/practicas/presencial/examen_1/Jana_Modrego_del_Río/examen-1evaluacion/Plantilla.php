<?php

// Genera los select del formulario  y el html para mostrar las jugadas realizadas
class Plantilla {

    private $select;
    private $html;

    public function __construct() {
        $crea_select = "<select name='colores>"
                . "<option value='Azul'>Azul</option>"
                . "<option value='Rojo'>Rojo</option>"
                . "<option value='Naranja'>Naranja</option>"
                . "<option value='Verde'>Verde</option>"
                . "<option value='Violeta'>Violeta</option>"
                . "<option value='Amarillo'>Amarillo</option>"
                . "<option value='Marron'>Marrón</option>"
                . "<option value='Rosa'>Rosa</option>"
                . "</select>";

        $this->select = $crea_select;
    }

    public function __toString() {
        return $this->select;
    }

}
