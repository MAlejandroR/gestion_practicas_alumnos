<?php

class Racional {

    //variables
    private $numerador;
    private $denominador;

    //cosntructor
    function __construct($numerador = null, $denominador = null) {
        switch (true) {
            //caso que ambos operadores sean nulos
            case $numerador == null && $denominador == null:
                $this->setDenominador(1);
                $this->setNumerador(1);
                break;
            //caso en el que el primer digitos sea numérico y el segundo no
            case is_numeric($numerador) && $denominador == null:
                $this->setNumerador($numerador);
                $this->setDenominador(1);
                break;
            //caso en el que ambos son numericos
            case is_numeric($numerador) && is_numeric($denominador):
                $this->setNumerador($numerador);
                $this->setDenominador($denominador);
                break;
            //caso en el que el primero es un string y el segundo nulo
            case!is_numeric($numerador) && !is_null($numerador) && is_null($denominador);
                $num = explode("/", $numerador);
                if (sizeof($num) != 1) {
                    $this->setNumerador($num[0]);
                    $this->setDenominador($num[1]);
                } else {
                    $this->setNumerador($num[0]);
                    $this->setDenominador(1);
                }
                break;
        }
    }

    //GETTERS Y SETTERS
    function getNumerador() {
        return $this->numerador;
    }

    function getDenominador() {
        return $this->denominador;
    }

    function setNumerador($numerador) {
        $this->numerador = $numerador;
    }

    function setDenominador($denominador) {
        $this->denominador = $denominador;
    }

    //OPERACIONES
    private function simplifica() {
        //si el denominador es 0 la solución es infinito
        if ($this->denominador == 0) {
            return "Infinito";
        } else {
            switch (true) {
                //si el numerador es 0 devuelves 0 como resultado
                case $this->numerador == 0:
                    return 0;
                    break;
                //si el de nomerdador es multiplo del denominador los divide y
                //lo devuelve
                case $this->numerador % $this->denominador == 0:
                    return $this->numerador / $this->denominador;
                    break;
                //sino hace el método de euclides
                default:
                    if ($this->getDenominador() != 0 && $this->getNumerador() != 0) {
                        if ($this->numerador >= $this->denominador) {
                            $max = $this->numerador;
                            $min = $this->denominador;
                            $resto = $max % $min;
                            while ($resto > 0) {
                                $max = $min;
                                $min = $resto;
                                $resto = $a % $b;
                            }
                        } else {
                            $min = $this->numerador;
                            $max = $this->denominador;
                            $resto = $max % $min;
                            while ($resto > 0) {
                                $max = $min;
                                $min = $reso;
                                $resto = $max % $min;
                            }
                        }
                        $this->SetDenominador($this->denominador / $min);
                        $this->setNumerador($this->numerador / $min);
                    }
                    $rac = $this->getNumerador() . "/" . $this->getDenominador();
                    return $rac;
                    break;
            }
        }
    }
    //aplica la suma de racionales
    public function suma(Racional $rac) {
        $num1 = $this->numerador * $rac->getDenominador();
        $den = $this->denominador * $rac->getDenominador();
        $num2 = $rac->getNumerador() * $this->getDenominador();
        $this->setNumerador($num1 + $num2);
        $this->setDenominador($den);
        return $this->simplifica();   
    }
    //aplica la resta de racionales
    public function resta(Racional $rac) {
        $num1 = $this->numerador * $rac->getDenominador();
        $den = $this->denominador * $rac->getDenominador();
        $num2 = $rac->getNumerador() * $this->getDenominador();
        $this->setNumerador($num1 - $num2);
        $this->setDenominador($den);
        return $this->simplifica();      
    }
    //aplica la multiplicación de racionales
    public function multiplicacion(Racional $rac) {
        $num = $this->numerador * $rac->getNumerador();
        $den = $this->denominador * $rac->getDenominador();
        $this->setNumerador($num);
        $this->setDenominador($den);
        return $this->simplifica();
    }
    //aplica la división entre racionales
    public function division(Racional $rac) {
        $num = $this->numerador * $rac->getDenominador();
        $den = $this->denominador * $rac->getNumerador();
        $this->setNumerador($num);
        $this->setDenominador($den);
        return $this->simplifica();    
    }
    //__toString
    public function __toString() {
        return "$this->numerador/$this->denominador";
    }

}

?>