<?php

class Jugada {

    //put your code here
    private $jugada = [];

    public function __construct($r1, $r2, $r3, $r4) {     
        $jugada = [$r1, $r2, $r3, $r4];
        $this->jugada = $jugada;
    }
    
     public function __toString() {
        foreach ($this->jugada as $color) {
            $txt .= "$color-";
        }
        $txt = substr($txt, 0, strlen($txt) - 1);
        return $txt;
    }
    
    public function getJugada() {
        return $this->jugada;
    }

}
