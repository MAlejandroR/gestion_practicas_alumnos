<?php

class Racional {

    private $numerador;
    private $denominador;

    public function __construct() {

        $this->numerador = 1;
        $this->denominador = 1;
    }

    public function sumar(Racional $r) {
        $numerador = ($this->numerador * $r->denominador) + ($this->denominador * $r->numerador);
        $denominador = ($this->denominador * $r->denominador);
        $result = new Racional();
        $result->valor($numerador,$denominador);
        return $result;
    }

    public function restar(Racional $r) {
        $numerador = ($this->numerador * $r->denominador) - ($this->denominador * $r->numerador);
        $denominador = ($this->denominador * $r->denominador);
       $result = new Racional();
        $result->valor($numerador,$denominador);
        return $result;
    }

    public function multiplicar(Racional $r) {
        $numerador = ($this->numerador * $r->numerador);
        $denominador = ($this->denominador * $r->denominador);
        $result = new Racional();
        $result->valor($numerador,$denominador);
        return $result;
    }

    public function dividir(Racional $r) {
        $numerador = ($this->numerador * $r->denominador);
        $denominador = ($this->denominador * $r->numerador);
        $result = new Racional();
        $result->valor($numerador,$denominador);
        return $result;
    }

    

    
    public function racionalVacio(){
        
        $this->numerador==1;
        $this->denominador=1;
    }
    
    public function racionalNum($num){
        $this->numerador=$num;
        $this->denominador=1;
        
    }
    public function racionalCadena($cadena){
        $arr= explode("/", $cadena);
        
        $this->numerador=$arr[0];
        $this->denominador=$arr[1];
    }
    public function racionalNumDen($num,$den){
        $this->numerador=$num;
        $this->denominador=$den;
        
    }
    public function __toString() {
        return("$this->numerador/$this->denominador");
    }


    public function __call($name, $arguments) {
        if($name== "valor"){
            
            switch (count($arguments)){
                case 0:
                   // $this->racionalVacio();
                    break;
                case 1:
                    
                    if(is_numeric($arguments[0]))
                        $this->racionalNum($arguments[0]);
                    else {
                    $this->racionalCadena($arguments[0]);    
                    }
                    break;
                case 2:
                    $this->racionalNumDen($arguments[0],$arguments[1]);
            }
            
        }
    }
    
    
}
