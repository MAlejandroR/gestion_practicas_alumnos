<!--
PRÁCTICA 5 AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->

<?php

class Racional {

    private $num;
    private $den;

    //El constructor tendrá en cuenta los valores que haya, o que no haya, en el numerador y en el denominador del objeto a construir .
    public function __construct($num1 = null, $num2 = null) {
        switch (true) {
            case $num1 == null AND $num2 == null:
                $this->setNum(0);
                $this->setDen(0);
                break;
            case is_numeric($num1) AND $num2 == null:
                $this->setNum($num1);
                $this->setDen(1);
                break;
            case is_string($num1) AND $num2 == null:
                $this->setNum(substr($num1, 0, strpos($num1, "/")));
                $this->setDen(substr($num1, strpos($num1, "/") + 1));
                break;
            default:
                $this->setNum($num1);
                $this->setDen($num2);
                break;
        }
    }

    public function getNum() {
        return $this->num;
    }

    public function getDen() {
        return $this->den;
    }

    public function setNum($num) {
        $this->num = $num;
    }

    public function setDen($den) {
        $this->den = $den;
    }

    //Los siguientes métodos aplican las reglas matemáticas de las operaciones con fracciones:
    public function suma(Racional $r2) {
        if ($this->getDen() == $r2->getDen()) {
            $num = $this->getNum() + $r2->getNum();
            $den = $this->getDen();
        } else {
            $num = $this->getNum() * $r2->getDen() + $this->getDen() * $r2->getNum();
            $den = $this->getDen() * $r2->getDen();
        }
        $r = new Racional($num, $den);
        return $r;
    }

    public function resta(Racional $r2) {
        if ($this->getDen() == $r2->getDen()) {
            $num = $this->getNum() - $r2->getNum();
            $den = $this->getDen();
        } else {
            $num = $this->getNum() * $r2->getDen() - $this->getDen() * $r2->getNum();
            $den = $this->getNum() * $r2->getDen();
        }
        $r = new Racional($num, $den);
        return $r;
    }

    public function multiplica(Racional $r2) {
        $num = $this->getNum() * $r2->getNum();
        $den = $this->getDen() * $r2->getDen();
        $r = new Racional($num, $den);
        return $r;
    }

    public function divide(Racional $r2) {
        $num = $this->getNum() * $r2->getDen();
        $den = $this->getDen() * $r2->getNum();
        $r = new Racional($num, $den);
        return $r;
    }

    //La siguiente función utiliza el método Euclides, tal y como se ha especificado en el enunciado del ejercicio:
    public function simplifica() {
        //Este método funcionará si el numerador es distinto de cero
        if ($this->getNum() != 0) {
            //Para cumplir con el método Euclides, es necesario calcular el resto entre dos números: el primero ($a)
            //debe ser mayor que el segundo ($b9
            if ($this->getNum() < $this->getDen()) {
                $a = $this->getDen();
                $b = $this->getNum();
            } else {
                $a = $this->getNum();
                $b = $this->getDen();
            }
            //Se calcula el resto:
            $resto = $a % $b;
            //Mientras el resto no sea cero, irá calculado restos.
            while ($resto > 0) {
                $a = $b;
                $b = $resto;
                $resto = $a % $b;
            }
            //No tomaremos como común el último resto, tomaremos como común el penúltimo,
            //que será igual a $b.
            //Tomaremos el penútlimo porque el método Euclides nos obliga a seleccionar el anterior al resto igual a cero: 
            $this->setNum($this->getNum() / $b);
            $this->setDen($this->getDen() / $b);
        }
    }

    public function __toString() {
        return $this->getNum() . "/" . $this->getDen();
    }

}
