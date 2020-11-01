<?php

class Jugada {

    private $coloresIndex;
    private $partida;
    private $valoresClave;
    private $html1;
    private $html2;

    function __construct($colores, $partida, Clave $clave) {
        $this->coloresIndex = $colores;
        $this->partida = $partida;
        $this->valoresClave = $clave->getClave();
        $this->dibujaClave();
    }

    function jugada() {

    }

    public function dibujaClave() {

        $clave = <<<FIND
                <input type='button' value='$this->clave[1]'>
                <input type='button' value='$this->clave[2]'>
                <input type='button' value='$this->clave[3]'>
                <input type='button' value='$this->clave[4]'>
                FIND;
        $this->html1 = $clave;
    }

    public function __toString() {
        return $this->html1;
    }

}
