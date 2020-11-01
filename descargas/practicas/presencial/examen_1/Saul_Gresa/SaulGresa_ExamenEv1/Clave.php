<?php

class Clave {
     private $combinacion = [];

    public function __construct() {
        $colores = ["Azul","Rojo","Naranja","Verde","Violeta","Amarillo","Marron","Rosa"];
        $indices = array_rand($colores, 4);
        $this->combinacion[0] = $colores[$indices[0]];
        $this->combinacion[1] = $colores[$indices[1]];
        $this->combinacion[2] = $colores[$indices[2]];
        $this->combinacion[3] = $colores[$indices[3]];
    }
    
    function getCombinacion() {
        return $this->combinacion;
    }
    
    public function __toString() {
        foreach ($this->combinacion as $num) {
            $texto .= "$num-";
        }
        $texto = substr($texto, 0, strlen($texto) - 1);
        return $texto;
    }  
}
