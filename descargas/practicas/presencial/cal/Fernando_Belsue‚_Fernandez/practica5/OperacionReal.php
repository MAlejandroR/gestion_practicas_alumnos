<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacionReal
 *
 * @author fernando
 */
class OperacionReal extends Operacion{

    private $tipo  ="Real";
    
    function getTipo(){
        return $this->tipo;
    }
    
    public function resolver() {
        $num1 = floatval($this->operando1);
        $num2 = floatval($this->operando2);
        switch($this->operacion) {
            case '+':
                $resultado = $num1 + $num2;
                break;
            case '-':
                $resultado = $num1 - $num2;
                break;
            case '*':
                $resultado = $num1 * $num2;
                break;
            case '/':
                $resultado = $num1 / $num2;
                break;
            
        }
        return strval($resultado);
    }
    
    public function __toString() {
        $this->operando1 = $num1;
        $this->operando2 = $num2;
        $msj = "Operando 1 = " . $num1 . " y operando 2 = " . $num2;
        return $msj;
    }

}
