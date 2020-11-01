<?php
 spl_autoload_register(function ($clase) {
            include $clase . '.php';
        });

class Operacion_Racional extends Operacion {
    private $resultado;
    private $claseOp="Racional";
    function __construct($n,$operacion) {
        parent::__construct($n,$operacion);
        $this->calcular();
    }
    public function __toString() {
        return "$this->OP1 $this->operando $this->OP2";
    }
    
    public function calcular(){
        
       if($this->operando=='+'){
           
           $this->resultado=$this->OP1->sumar($this->OP2);

           
           
       }elseif($this->operando=='-'){
           $this->resultado=$this->OP1->resta($this->OP2);
       
           
           
       }elseif($this->operando=='*'){
          $this->resultado=($this->OP1->multiplicar($this->OP2));
        
           
           
       }elseif($this->operando==':'){
          $this->resultado=($this->OP1->dividir($this->OP2));
        
           
           
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

