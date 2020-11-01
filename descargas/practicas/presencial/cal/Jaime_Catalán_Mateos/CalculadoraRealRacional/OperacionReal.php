<?php

class OperacionReal extends Operacion
{

    public function sumar()
    {
        return $this->operando1 + $this->operando2;
    }


    public function restar()
    {
        return $this->operando1 - $this->operando2;
    }


    public function multiplicar()
    {
        return $this->operando1 * $this->operando2;
    }


    public function dividir()
    {
        return $this->operando1 / $this->operando2;
    }

}