<?php

class OperacionReal extends Operacion {
     private $resultado;
    private $claseOp="Real";
    
    function __construct($n,$operacion) {
        parent::__construct($n,$operacion);
        $this->calcular();
    }
    public function __toString() {
        return "$this->OP1 $this->operando $this->OP2";
    }
    
     public function calcular(){
        
       if($this->operando=='+'){
           
           $this->resultado=$this->OP1 + $this->OP2;

          
           
       }elseif($this->operando=='-'){
           $this->resultado=$this->OP1 - $this->OP2;
        
           
           
       }elseif($this->operando=='*'){
          $this->resultado=($this->OP1 * $this->OP2);
        
           
           
       }elseif($this->operando=='/'){
          $this->resultado=($this->OP1 / $this->OP2);
        
           
           
       }
        
        
    }
    function getResultado() {
        return $this->resultado;
    }

    function getClaseOp() {
        return $this->claseOp;
    }

    function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    function setClaseOp($claseOp) {
        $this->claseOp = $claseOp;
    }


    
}


