<?php

class Clave {

    private $colores;
    private $clave;

    public function __construct() {

    }

    public function generaClave() {
        $this->colores = ["azul", "rojo", "naranja", "verde", "violeta", "amarillo", "marron", "rosa"];
        $this->clave = [$colores[rand(1, 8)], $colores[rand(1, 8)], $colores[rand(1, 8)], $colores[rand(1, 8)]];
    }

    function getClave() {
        return $this->clave;
    }

}
