<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clave
 *
 * @author fernando
 */
class Clave {
    
    //Creo un array de colores
    private $arrayColores = ['Amarillo', 'Verde', 'Azul', 'Marron', 'Violeta', 'Rojo', 'Gris'];
    private $clave = [];
    public function __construct() {
        $claveEstatica = ['Verde', 'Azul', 'Violeta', 'Rojo'];
        $this->clave = $claveEstatica;
    }
    
    public static function obtenerClave(){
        
        return $this->clave = $claveEstatica;
    }
    
    public function __toString() {
        foreach ($this->clave as $colores) {
            $texto .= "$colores-";
        }
        $texto = substr($texto, 0, strlen($texto) - 1);
        return $texto;
    }
}

