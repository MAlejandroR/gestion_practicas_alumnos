<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operacion+
 *
 * @author alumno
 */
abstract class Operacion {
    //put your code here
    protected $op1;
    protected $op2;
    protected $operacion;
    protected $operador;
    
    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = 0;
    
    function __construct($operacion) {
        
        $this->operacion = $operacion;
    }
    function getop1() {
        return $this->op1;
    }

    function getop2() {
        return $this->op2;
    }

    function setop1($op1) {
        $this->op1 = $op1;
    }

    function setop2($op2) {
        $this->op2 = $op2;
    }
    static function comprobar($cadena){
        
        $num = "[0-9][0-9]*";
        $real = "$num(\.[0-9]+)?";
        $racional = "$num\/$num";
        $op_racional = "[\+|\-|\*|\:]";
        $op_real ="[\+|\-|\*|\/]";
        
        $operacion_real = "/^$real$op_real$real$/";
        $operacion_racional1 = "/^$num$op_racional$racional$/";
        $operacion_racional2 = "/^$racional$op_racional$racional$/";
        $operacion_racional3 = "/^$racional$op_racional$num$/";
        if (preg_match($operacion_real, $cadena)){
            return self::REAL;
        }else if(preg_match($operacion_racional1, $cadena)){
            return self::RACIONAL;
        }else if(preg_match($operacion_racional2, $cadena)){
            return self::RACIONAL;
        } else if(preg_match($operacion_racional3, $cadena)){
            return self::RACIONAL;
        }  else
            return self::ERROR;
    }
    protected function operadores($tipo){
        if (strpos($this->operacion, "+")) {
            $operadores = explode('+', $this->operacion);
            $this->operador = "+";
        } else if (strpos($this->operacion, "-")) {
            $this->operador = "-";
            $operadores = explode('-', $this->operacion);
        } else if (strpos($this->operacion, "*")) {
            $this->operador = "*";
            $operadores = explode('*', $this->operacion);
        } else {
            if ($tipo == "Racional") {
                $this->operador = ":";
                $operadores = explode(':', $this->operacion);
            } else {
                $this->operador = "/";
                $operadores = explode('/', $this->operacion);
            }
        }
        
        $this->op1 = $operadores[0];
        $this->op2 = $operadores[1];
    }
    abstract function sumar();
    abstract function restar();
    abstract function multiplicar();
    abstract function dividir();
    abstract function __toString();
}
