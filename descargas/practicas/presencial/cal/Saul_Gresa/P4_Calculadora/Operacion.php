<?php

abstract class Operacion {
    protected $op1;
    protected $op2;
    protected $operacion;
    
    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = 0;
    
    public function __construct($operacion) {
        $operador = $operacion->getOperacion($operacion);
        $op1 =  $operacion->getOp1($operacion);
        $op2 =  $operacion->getOp2($operacion);
    }

    public static function valida($operador){
        $num = "[1-9][0-9]*";
        $real = "$num(\.[0-9]*)?";
        $racional = "$num\/$num";
        $op_rac = "[\+|\-|\*|\:]";
        $op_real = "[\+|\-|\*|\/]";
        
        $operacion_real = "/^$real$op_real$real$/";
        $operacion_racional = "/^$racional$op_rac$racional$/";
        
        if(preg_match($operacion_real, $operador))
            return self::REAL;
        else if((preg_match($operacion_racional, $operador)))
            return self::RACIONAL;
        else
            return self::ERROR;
    }
    
    function getOp1() {
        return $this->op1;
    }

    function getOp2() {
        return $this->op2;
    }

    function getOperacion() {
        return $this->operacion;
    }

    function setOp1($op1) {
        $this->op1 = $op1;
    }
    
    function setOp2($op2) {
        $this->op2 = $op2;
    }

    function setOperacion($operacion) {
        $this->operacion = $operacion;
    }

}
