<?php

class Racional {

    private $num;
    private $den;

    public function __construct($n = 1, $d = 1) {
        
        if (is_string($n)) {
            $numeros = explode("/", $n);
            $this->num = $numeros[0];
            $this->den = $numeros[1];
        } else {
            $this->num = $n;
            $this->den = $d;
        }
    }

    function getNum() {
        return $this->num;
    }

    function getDen() {
        return $this->den;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setDen($den) {
        $this->den = $den;
    }

    public function simplifica() {
        $minComDiv = 0;
        if ($this->den != 0) {
            switch (true) {
                case $this->num == 0:

                    return 0;
                    break;
                case $this->num % $this->den == 0:
                    return $this->num / $this->den;
                    break;
                default:
                    if ($this->getDen() != 0 && $this->getNum() != 0) {
                        if ($this->num >= $this->den) {
                            $a = $this->num;
                            $b = $this->den;
                            $resto = $a % $b;
                            while ($resto > 0) {
                                $a = $b;
                                $b = $resto;
                                $resto = $a % $b;
                            }
                            $this->setDen($this->den / $b);
                            $this->setNum($this->num / $b);
                        } else {
                            $b = $this->num;
                            $a = $this->den;
                            $resto = $a % $b;
                            while ($resto > 0) {
                                $a = $b;
                                $b = $resto;
                                $resto = $a % $b;
                            }
                            $this->setDen($this->den / $b);
                            $this->setNum($this->num / $b);
                        }

                        if ($minComDiv != 0) {
                            $this->setNum($this->num / $minComDiv);
                            $this->setDen($this->den / $minComDiv);
                        }
                    }
                    $racional = $this->getNum() . "/" . $this->getDen();
                    return $racional;
                    break;
            }
        } else {
            return 'infinito';
        }
    }

    public function __toString() {
        return ("$this->num/$this->den");
    }


    public function sumar(Racional $r1) {
        $num1 = $this->num * $r1->getDen();
        $den = $this->den * $r1->getDen();
        $num2 = $r1->getNum() * $this->getDen();
        $this->setNum($num1 + $num2);
        $this->setDen($den);
        return $this->simplifica();
        //return $this->num . "/" . $this->den;
    }

    public function restar(Racional $r1) {
        $num1 = $this->num * $r1->getDen();
        $den = $this->den * $r1->getDen();
        $num2 = $r1->getNum() * $this->getDen();
        $this->setNum($num1 - $num2);
        $this->setDen($den);
        return $this->simplifica();
        //return $this->num . "/" . $this->den;
    }

    public function multiplicar(Racional $r1) {
        $num = $this->num * $r1->getNum();
        $den = $this->den * $r1->getDen();
        $this->setNum($num);
        $this->setDen($den);
        return $this->simplifica();
        //return $this->num . "/" . $this->den;
    }

    public function dividir(Racional $r1) {
        $num = $this->num * $r1->getDen();
        $den = $this->den * $r1->getNum();
        $this->setNum($num);
        $this->setDen($den);
        return $this->simplifica();
        //return $this->num . "/" . $this->den;
    }

    public function __call($funcion, $parametros) {
        switch ($function) {
            case 'asignar':
                $this->__construct($parametro[0], $parametro[1]);
                break;
            default:
                echo "<h2>El método $funcion no existe</h2>";
                break;
        }
    }

}
