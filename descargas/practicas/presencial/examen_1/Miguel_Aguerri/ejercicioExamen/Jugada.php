<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugada
 *
 * @author alumno
 */
class Jugada {
    //put your code here
    protected $claveMaquina;
    protected $claveNuestra;
    function __construct($claveMaquina, $claveNuestra) {
        $this->claveMaquina = $claveMaquina;
        $this->claveNuestra = $claveNuestra;
    }
    public function comprobarJugada(){
        $matchesPos = 0;
        //COMPARAMOS POSICIONES NUESTRAS CON LAS DE LA MAQUINA PARA INFORMAR AL USUARIO
        foreach ($this->claveMaquina as $posicion => $pos) {
            if($this->claveMaquina[$posicion] == $this->claveNuestra[$posicion]){
                $matchesPos++;
            }
        }
        //CREAMOS ARRAY CON LOS COLORES QUE HAY EN NUESTRA CLAVE
        
        foreach ($this->claveNuestra as $color) {
            if (array_key_exists($color, $nuestrosColores))
                $nuestrosColores[$color]++;
            else 
                $nuestrosColores[$color]=1;
            
        }
        //CREAMOS ARRAY CON LOS COLORES QUE HAY EN LA CLAVE DE LA MAQUINA
        
        foreach ($this->claveMaquina as $color) {
            if (array_key_exists($color, $coloresMaquina))
                $coloresMaquina[$color]++;
            else 
                $coloresMaquina[$color]=1;
            
        }
        $matchCol=0;
        
        $coloresSalidos;
        foreach ($nuestrosColores as $color => $cantidad) {
            if(array_key_exists($color, $coloresMaquina) && !array_key_exists($color, $coloresSalidos)){
                    $coloresSalidos = $color;
                    $matchCol++;
            }
        }
        //AÑADIMOS DOBLE CONDICION POR SI EL COLOR COINCIDE EN 2 POSICIONES
        if (($matchCol==4 && $matchesPos==4)||($matchCol==3 && $matchesPos==4)){
           return true; 
        }else{
        return "Has acertado $matchCol y $matchesPos posiciones en el lugar correcto.";
        }
}
}
