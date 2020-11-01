<?php

/**
 * Description of OperacionRacional
 *
 * @author fernando
 */
class OperacionRacional extends Operacion{
    private $tipo  ="Racional";
    
    function getTipo(){
        return $this->tipo;
    }
    

    public function resolver() {
        $num1 = new Racional($this->operando1);
        $num2 = new Racional($this->operando2);
        
        switch($this->operacion) {
            case '+':
                $resultado = $num1->sumar($num2);
                break;
            case '-':
                $resultado = $num1->restar($num2);
                break;
            case '*':
                $resultado = $num1->multiplicar($num2);
                break;
            case ':':
                $resultado = $num1->dividir($num2);
                break;
            
        }
        return strval($resultado);
    }

}
