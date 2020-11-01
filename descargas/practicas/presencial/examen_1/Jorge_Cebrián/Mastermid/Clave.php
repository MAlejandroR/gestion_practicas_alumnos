<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clave
 *
 * @author alumno17
 */
class Clave {
    private $claveColores=[];
    private $colores =["Azul", "Rojo","Naranja","Verde","Violeta","Amarillo","Marrón","Rosa"];
    
    public function __construct() {
        $this->generaClave();
    }

    public function generaClave(){
        $array = array_rand($this->colores,4);
        $this->claveColores[0]=$this->colores[$array[0]];
        $this->claveColores[1]=$this->colores[$array[1]];
        $this->claveColores[2]=$this->colores[$array[2]];
                $this->claveColores[3]=$this->colores[$array[3]];
                return $array;

    }
    
    function getClaveColores() {
        return $this->claveColores;
    }

    function getColores() {
        return $this->colores;
    }

    function setClaveColores($claveColores) {
        $this->claveColores = $claveColores;
    }

    function setColores($colores) {
        $this->colores = $colores;
    }


}
