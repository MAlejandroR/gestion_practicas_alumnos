<?php
include_once 'Racional.php';

class OperacionRacional extends Operacion
{

    public function sumar()
    {
        $this->operando1->sumar($this->operando2);
        return $this->operando1->toString();
    }


    public function restar()
    {
        $this->operando1->restar($this->operando2);
        return $this->operando1->toString();
    }


    public function multiplicar()
    {
        $this->operando1->multiplicar($this->operando2);
        return $this->operando1->toString();
    }


    public function dividir()
    {
        $this->operando1->dividir($this->operando2);
        return $this->operando1->toString();
    }

}