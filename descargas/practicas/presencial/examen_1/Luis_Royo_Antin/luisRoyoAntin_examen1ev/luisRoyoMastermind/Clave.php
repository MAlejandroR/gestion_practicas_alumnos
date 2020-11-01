<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clave
 *
 * @author alumno6
 */
class Clave {

    private $clave = [];

    function __construct() {
        $colores = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marrón', 'Rosa'];
        $preClave = array_rand($colores, 4);
        $claveFinal [0] = $colores[$preClave[0]];
        $claveFinal [1] = $colores[$preClave[1]];
        $claveFinal [2] = $colores[$preClave[2]];
        $claveFinal [3] = $colores[$preClave[3]];
        $this->clave = $claveFinal;
    }

    function getClave() {
        return $this->clave;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    public function __toString() {
        $texto = "";
        foreach ($this->clave as $color)
            $texto .= "$color-";
        $texto = substr($texto, 0, strlen($texto) - 1);
        return $texto;
    }

}
