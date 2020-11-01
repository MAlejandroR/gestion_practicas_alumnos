<?php

abstract class Operacion {
    // Tipos de operación que se pueden realizar
    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = 0;

    // Atributos
    protected $operando1;
    protected $operador;
    protected $operando2;

    // Métodos
    // Constructor
    public function __construct($operacion) {
        $this->operador = $this->buscar_operador($operacion);
        $pos_operador = strpos($operacion, $this->operador);
        $this->operando1 = substr($operacion, 0, $pos_operador);
        $this->operando2 = substr($operacion, $pos_operador + 1);
    }
    // Determina el operador
    protected function buscar_operador($operacion) {
        if (strpos($operacion, "*") !== FALSE) {
            return "*";
        }
        if (strpos($operacion, ":") !== FALSE) {
            return ":";
        }
        if (strpos($operacion, "+") !== FALSE) {
            return "+";
        }
        if (strpos($operacion, "-") !== FALSE) {
            return "-";
        }
        if (strpos($operacion, "/") !== FALSE) {
            return "/";
        }
    }
    // Determina si la operación es real o racional
    static public function validaOperacion($operacion) {
        $ent = "(\+|\-)?[1-9][0-9]*";
        $real = "$ent(\.[0-9]+)?";
        $racional = ("$ent\/$ent");
        $operador_racional = "[\+|\-|\*|\:]";
        $operador_real = "[\+|\-|\*|\/]";
        $operacion_real = "/^$real$operador_real$real$/";
        $operacion_racional1 = "/^$racional$operador_racional$racional$/";
        $operacion_racional2 = "/^$ent$operador_racional$racional$/";
        $operacion_racional3 = "/^$racional$operador_racional$ent$/";

        if (preg_match($operacion_real, $operacion)) {
            return self::REAL;
        }
        if (preg_match($operacion_racional1, $operacion)||
                preg_match($operacion_racional2, $operacion)||
                preg_match($operacion_racional3, $operacion)) {
            return self::RACIONAL;
        }else {
            return self::ERROR;
        }
    }
    // Métodos abstractos
    abstract public function resolver();
    abstract public function mostrar();

    

}
