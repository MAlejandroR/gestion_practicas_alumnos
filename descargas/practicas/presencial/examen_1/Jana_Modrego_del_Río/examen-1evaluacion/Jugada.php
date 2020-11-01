<?php

// Clase que contiene la jugada con los aciertos que la jugada tiene respecto
// a la clave
class Jugada {

    private $aciertos;
    private $colores = [];

    public function __construct($color1, $color2, $color3, $color4) {
        $this->colores = [$color1, $color2, $color3, $color4];
    }

    public function __toString() {

        return "$this->colores";
    }

    public function getJugada() {
        return $this->colores;
    }

}
