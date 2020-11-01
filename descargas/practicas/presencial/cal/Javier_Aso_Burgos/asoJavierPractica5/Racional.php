<?php

class Racional {

    //-----------MÉTODOS DE LA CLASE-------------//

    private $numerador;
    private $denominador;

    //------------CONSTRUCTOR-------------------//

    public function __construct($numerador = 1, $denominador = 1) {
        if ($denominador == 1) {//Se ha pasado uno o ninguno
            $this->setNumerador($numerador);
        } else {//Se han pasado dos parámetros
            $this->numerador = $numerador;
            $this->denominador = $denominador;
        }
    }

    //----------------- GETTER Y SETTER---------------------//

    function getNumerador() {
        return $this->numerador;
    }

    function getDenominador() {
        return $this->denominador;
    }

    function setNumerador($numerador): void {

        if (is_string($numerador)) {//Se ha pasado una cadena
            $corte = strpos($numerador, "/", 1); //Busco si hay denominador
            if ($corte) {//separo operandos
                $this->numerador = substr($numerador, 0, $corte);
                $this->denominador = substr($numerador, $corte + 1);
            } else {//No hay denominador
                $this->numerador = $numerador;
                $this->denominador = 1;
            }
        } else {//Se ha pasado un número
            $this->numerador = $numerador;
            $this->denominador = 1;
        }
    }

    function setDenominador($denominador): void {
        $this->denominador = $denominador;
    }

    function __toString() {
        return $this->numerador . "/" . $this->denominador;
    }

    //----------------FUNCIONES PARA OPERAR------------------//

    public function suma($r) {

        return new Racional($r->getNumerador() * $this->denominador + $r->getDenominador() * $this->numerador, $r->getDenominador() * $this->getDenominador());
    }

    public function resta($r) {

        return $this->suma(new Racional($r->getNumerador() * -1, $r->getDenominador()));
    }

    public function multiplica($r) {
        return new Racional($this->numerador * $r->getNumerador(), $this->denominador * $r->getDenominador());
    }

    public function divide($r) {

        return new Racional($this->numerador * $r->getDenominador(), $this->denominador * $r->getNumerador());
    }

    public function simplifica() {//Método euclídeo para sacar el mcd
        $divisor = $this->numerador;
        $dividendo = $this->denominador;

        if ($dividendo != 0) {
            do {
                $resto = $divisor % $dividendo;
                $divisor = $dividendo;
                $dividendo = $resto;
            } while ($resto != 0);
            $this->numerador /= $divisor;
            $this->denominador /= $divisor;
            return $divisor;
        }
        return 1;
    }

}

?>