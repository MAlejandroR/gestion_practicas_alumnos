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
    //put your code here
    protected $clave;
    protected $repetidos;
    function __construct() {
        
    }
    public function __toString() {
        $pos1=$this->clave[0];
        $pos2=$this->clave[1];
        $pos3=$this->clave[2];
        $pos4=$this->clave[3];
        $msj= "La clave esta formada por:$pos1,$pos2,$pos3,$pos4";
        return $msj;
    }

    public function generarClave($colores){
        for ($i=0; $i<4; $i++){
                $aleatorio = rand(0, sizeof($colores)-1);
                $this->clave[$i]=$colores[$aleatorio];
                $repetidos[$i]=$colores[$aleatorio];
                
            
    }
    
    return $this->clave;
}
    public function toArray(){
        for ($i=0; $i<4; $i++){
                $clave2[$i]=$this->clave[$i];
                
            
    }
    return $clave2;
    }
}
