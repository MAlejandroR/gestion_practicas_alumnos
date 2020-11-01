<?php

// clase que contiene la clave a adivinar
class Clave {

    private $clave = [];

    public function __construct() {

        // guardo 4 índices distintos para generar la clave
        $indices = array_rand(COLORES, 4);
        foreach ($indices as $indice) {
            $this->clave[] = COLORES[$indice];
        }
    }

    public function __toString() {

        return "$this->clave[0] - $this->clave[1] - $this->clave[2] -$this->clave[3] ";
    }

    public function getClave() {
        return $this->clave;
    }

}
