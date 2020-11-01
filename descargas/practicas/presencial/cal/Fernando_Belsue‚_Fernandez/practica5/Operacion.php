<?php

/**
 * Description of Operacion
 *
 * @author fernando
 */
abstract class  Operacion {
    //Atributos de la clase
    protected $operando1;
    protected $operando2;
    protected $operacion;
    
    //CONSTRUCTOR
    function __construct($operando1, $operando2, $operacion) {
        $this->operando1 = $operando1;
        $this->operando2 = $operando2;
        $this->operacion = $operacion;
    }
    
    function getOperando1() {
        return $this->operando1;
    }

    function getOperando2() {
        return $this->operando2;
    }

    function getOperacion() {
        return $this->operacion;
    }

        
    abstract function resolver();

    //MÉTODO PARA DEFINIR EL TIPO DE LA OPERACION
    public static function obtenerTipo($input){
        
        $coincide = preg_match("/^([\+\-]?\d+([\.\/]?)\d*)([\+\-\*\/:])([\+\-]?\d+([\.\/]?)\d*)$/", $input, $matches);
        if (! $coincide ) {
            return null;
        }
        
        $operacion = $matches[3];
        $operando1 = $matches[1];
        $operando2 = $matches[4];
        
        // ¿Es operacion válida?
        if ( ($operacion == '/' && ($matches[2] == '/' || $matches[5] == '/')) ||
             ($operacion == ':' && ($matches[2] == '.' || $matches[5] == '.')) ) {
            return null;
        }
           
        // ¿Es operacion racional?
        if ($matches[2] == '/' || $matches[5] == '/') {
            return new OperacionRacional($operando1, $operando2, $operacion);
        } else {
            return new OperacionReal($operando1, $operando2, $operacion);
        }
    }
}
