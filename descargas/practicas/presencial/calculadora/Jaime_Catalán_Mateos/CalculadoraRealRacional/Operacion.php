<?php

abstract class Operacion
{
    protected $operando1;
    protected $operando2;

    public function __construct($operando1, $operando2)
    {
        $this->operando1 = $operando1;
        $this->operando2 = $operando2;
    }

    abstract protected function sumar();
    abstract protected function restar();
    abstract protected function multiplicar();
    abstract protected function dividir();
}