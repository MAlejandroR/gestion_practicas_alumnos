<?php

class Racional {
    // Atributos
    private $num;
    private $den;

    // Constructor
    public function __construct($n = 1, $d = 1) {
        if ($d === null) {
            $this->num = $n;
            $this->den = 1;
            
        } else if(is_string($n)) {
            $pos= strpos($n, "/");
            $numeros = explode("/", $n);
            $this->num = $numeros[0];
            if($pos === false){
                $this->den = "1";
            }else {
                $this->den = $numeros[1]; 
            }
            
        }else{
            $this->num = $n;
            $this->den = $d;
        }
    }

    public function getNum() {
        return $this->num;
    }

    public function getDen() {
        return $this->den;
    }

    public function __toString() {
        return $this->getNum() . "/" . $this->getDen();
    }
    
    // Métodos sumar, restar, multiplicar y dividir
    
    public function sumar(Racional $r1): Racional {
        $num = $this->num * $r1->den + $this->den * $r1->num;
        $den = $this->den * $r1->den;
        $r = new Racional($num, $den);
        return $r;
    }

    public function restar(Racional $r1): Racional {
        $num = $this->num * $r1->den - $this->den * $r1->num;
        $den = $this->den * $r1->den;
        $r = new Racional($num, $den);
        return $r;
    }

    public function multiplicar(Racional $r1): Racional {
        $den = $this->den * $r1->den;
        $num = $this->num * $r1->num;
        $r = new Racional($num, $den);
        return $r;
    }

    public function dividir(Racional $r1): Racional {
        $num = $this->num * $r1->den;
        $den = $this->den * $r1->num;
        $r = new Racional($num, $den);
        return $r;
    }

}
