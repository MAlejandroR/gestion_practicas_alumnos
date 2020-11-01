<?php

class Racional
{
    private $numerador;
    private $denominador;


    public function __construct($numerador, $denominador)
    {
        $this->numerador = $numerador;
        $this->denominador = $denominador;
    }


    public function sumar($racional)
    {
        $this->numerador = $this->numerador * $racional->denominador + $racional->numerador * $this->denominador;
        $this->denominador *= $racional->denominador;
    }


    public function restar($racional)
    {
        $this->numerador = $this->numerador * $racional->denominador - $racional->numerador * $this->denominador;
        $this->denominador *= $racional->denominador;
    }


    public function multiplicar($racional)
    {
        $this->numerador *= $racional->numerador;
        $this->denominador *= $racional->denominador;
    }


    public function dividir($racional)
    {
        $this->numerador *= $racional->denominador;
        $this->denominador *= $racional->numerador;
    }


    public function toString()
    {
        return "$this->numerador/$this->denominador";
    }
    
}