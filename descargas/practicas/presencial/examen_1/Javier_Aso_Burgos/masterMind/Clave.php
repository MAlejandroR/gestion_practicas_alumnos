<?php

class Clave {

    private $arrayColores = ["azul", "rojo", "naranja", "verde", "violeta", "amarillo", "marron", "rosa"];
    private $claveGanadora = [];

    function __construct() {


        $this->generaClave();
    }

    function generaClave() {


        $indices = array_rand($this->arrayColores, 4);

        for ($index = 0; $index < 4; $index++) {
            $this->claveGanadora[] = $this->arrayColores[$indices[$index]];
        }
    }

    function __toString() {
        $cadena = "";

        foreach ($this->claveGanadora as $color) {
            $cadena .= $color . " ";
        }
        return $cadena;
    }

    function getClaveGanadora() {
        return $this->claveGanadora;
    }

}

?>