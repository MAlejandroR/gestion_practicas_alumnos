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
    
    private $clave;
    
    function __construct() {
        $this->generoClave();
        
    }

    function getClave() {
        return $this->clave;
    }
    
    function setClave($clave) {
        $this->clave = $clave;
    }

    public function generoClave(){
        $colores = ["Azul","Rojo","Naranja","Verde","Violeta","Amarillo","Marron","Rosa"];
        $numerosAparecidos[]=-1;
        for ($i=0; $i<4; $i++){            
            do{
                $color = random_int(0, sizeof($colores)-1); 
            }while (array_search($color, $numerosAparecidos)); 
            $numerosAparecidos[] = $color;          
            $clave[] = $colores[$color];
            unset($colores[$color]);                     
        }       
        $this->setClave($clave);        
    }
    
    public function __toString() {
        return $this->clave[0]." - ".$this->clave[1]." - "
                .$this->clave[2]." - ".$this->clave[3];
    }

}
?>