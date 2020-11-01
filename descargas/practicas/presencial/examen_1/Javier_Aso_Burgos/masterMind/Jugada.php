<?php

class Jugada {

    private $coloresAcertados = ["fallo", "fallo", "fallo", "fallo"];
    private $posicionesAcertadas = ["fallo", "fallo", "fallo", "fallo"];

    function __construct($seleccionUsuario, $claveGanadora) {

        for ($i = 0; $i < count($claveGanadora); $i++) {

            if ($claveGanadora[$i] == $seleccionUsuario[$i]) {
                $this->posicionesAcertadas[$i] = $claveGanadora[$i];
            }
            for ($j = 0; $j < count($seleccionUsuario); $j++) {
                if ($claveGanadora[$i] == $seleccionUsuario[$j]) {
                    $this->coloresAcertados[$i] = $seleccionUsuario[$j];
                }
            }
        }
    }

    function getColoresAcertados() {
        return $this->coloresAcertados;
    }

    function getPosicionesAcertadas() {
        return $this->posicionesAcertadas;
    }

}

?>