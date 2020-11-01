<?php

class Clave {

    private $colores = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marron', 'Rosa'];
    private $clave = [];

    public function generarClave() {
        for ($i = 0; $i < 4; $i++) {
            $posi = rand(0, 4);
            $this->clave[$i] = $this->colores[$posi];
        }
        return $this->clave;
    }

    function getColores() {
        return $this->colores;
    }

    function getClave() {
        return $this->clave;
    }

    function setColores($colores) {
        $this->colores = $colores;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

}
