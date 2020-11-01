<?php

class Jugada {

    private $c1;
    private $c2;
    private $c3;
    private $c4;

    public function __construct($clave, $colores) {

        $this->c1 = ($colores[0] == $clave->getClave()[0]);
        $this->c2 = ($colores[1] == $clave->getClave()[1]);
        $this->c3 = ($colores[2] == $clave->getClave()[2]);
        $this->c4 = ($colores[3] == $clave->getClave()[3]);
    }

    public function __toString() {
        echo"$this->c1  $this->c2  $this->c3  $this->c4";
    }

    function getC1() {
        return $this->c1;
    }

    function getC2() {
        return $this->c2;
    }

    function getC3() {
        return $this->c3;
    }

    function getC4() {
        return $this->c4;
    }

    function setC1($c1) {
        $this->c1 = $c1;
    }

    function setC2($c2) {
        $this->c2 = $c2;
    }

    function setC3($c3) {
        $this->c3 = $c3;
    }

    function setC4($c4) {
        $this->c4 = $c4;
    }

}
