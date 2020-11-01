<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fecha
 *
 * @author manuel
 */
class Racional {

    private $num;
    private $den;

    /**
     *
     * @param int $d dia de la fecha
     * @param int $m  mes de la fecha
     * @param int $a  año de la fecha
     */
    public function __construct($num=1, $den=1) {
        if (is_string($num)) {
        $numeros = explode("/", $num);
        $this->num=$numeros[0];
        if (sizeof($numeros)<2) {
            $this->den=1;
        }else{
            $this->den=$numeros[1];
        }
        }else{
            $this->num=$num;
            $this->den=$den;
        }
        
    }

    public function __toString() {
        return ("$this->num/$this->den");
    }
    public function sumar(Racional $r2):Racional{ //:Racional como el return en java
        $den = $this->den * $r2->den;
        $num = $this->den * $r2->num+$this->num*$r2->den;
        $r = new Racional($num,$den);
        return $r;
    }
    public function restar(Racional $r2):Racional{ //:Racional como el return en java
        $den = $this->den * $r2->den;
        $num = $this->num*$r2->den-$this->den * $r2->num;
        $r = new Racional($num,$den);
        return $r;
    }
    public function multiplicar(Racional $r2):Racional{ //:Racional como el return en java
        $den = $this->den * $r2->den;
        $num = $this->num * $r2->num;
        $r = new Racional($num,$den);
        return $r;
    }
    public function dividir(Racional $r2):Racional{ //:Racional como el return en java
        $den = $this->den * $r2->num;
        $num = $this->num * $r2->den;
        $r = new Racional($num,$den);
        return $r;
    }
    public static function sumarst(Racional $r1,Racional $r2):Racional{
        $den = $r1->den * $r2->den;
        $num = $r1->den * $r2->num+$r1->num*$r2->den;
        $r = new Racional($num,$den);
        return $r;
        
    }
    public static function simplificar($resultado){
        $resultado = explode("/", $resultado);
        $num=$resultado[0];
        $den=$resultado[1];
        for ($i = 9; $i >= 2; $i--) {
            if ($num%$i==0 && $den%$i==0){
                $num = $num/$i;
                $den = $den/$i;
                $i++;
            }
        }
        if ($num%$den==0) {
            return $num/$den;
        }else{
            return "$num/$den";
        }
    }
    
    public function __call($funciones, $parametros) { 
        //Se ejecuta cuando llamas a un metodo que no existe
        //
        switch ($funciones){
            case "asignar":
                $this->asignar($parametros);
                break;
            default:
                echo "<h2>El método $funciones no existe en la clase Racional</h2>";
                break;
        }
    }


}
