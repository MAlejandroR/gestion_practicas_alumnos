<?php
    
    class Racional{
        private $num;
        private $den;
       
        public function __construct($n, $d) {
            if (is_string($n)){
                $numeros = explode("/", $n);
                $this->num=$numeros[0];
                $this->den=$numeros[1];
            } else {
                $this->num=$n;
                $this->den=$d;
            }
        }
        
        public function __toString() {
            return ($this->num);
        }
        
        public static function sumar_static(Racional $r1, Racional $r2):Racional{
            $num = $r1->num * $r2->den + $r1->den * $r2->num;
            $den = $r1->den * $r2->den;      
            $r = new Racional($num,$den);
            return $r;
        }

        public function sumar(Racional $r2){
            $den = $this->den * $r2->den;
            $num = $this->den * $r2->num+$this->num*$r2->den;
            $r = new Racional($num,$den);
            return $r;
        }
        
        public function restar(Racional $r2){
            $den = $this->den * $r2->den;
            $num = $this->den * $r2->num-$this->num*$r2->den;
            $r = new Racional($num,$den);
            return $r;
        }
        
        public function multi(Racional $r2){
            $den = $this->den * $r2->den;
            $num = $r2->num * $this->num;
            $r = new Racional($num,$den);
            return $r;
        }
        
        public function div(Racional $r2){
            $den = $this->den * $r2->num;
            $num = $this->num*$r2->den;
            $r = new Racional($num,$den);
            return $r;
        }
        
    }
?>
