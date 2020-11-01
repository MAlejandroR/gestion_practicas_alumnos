<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clave
 *
 * @author alumno
 */
class Clave {

    protected $clave = [];
    protected $array_colores = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Marron', 'Rosa'];

    public function __construct() {
        $this->clave = $this->generarClave();
    }

    public function __toString() {
        foreach ($this->clave as $color) {

            $texto .= "$color-";
        }
        $texto = substr($texto, 0, strlen($texto) - 1);
        return $texto;
    }

    private function generarClave() {
        $v = array_fill(0, 7, 1); //genero un array para generar el número aletario
        $indices = array_rand($v, 3);

        foreach ($indices as $clave => $valor) {//asigno el número al color
            $this->clave[] = $this->array_colores[$valor];
        }return $this->clave;
    }

}
