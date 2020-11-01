<?php

class Jugada {

//  Variables
    private $mi_jugada = [];
    private $totalJugadas = [];

    public function __construct($jugada) {
        $this->mi_jugada = $jugada;
    }

    //Si agrega la jugada devuelve verdadero, sino es que se le acabaron los turnos
    public static function agregarJugada($jugada) {
        if (count($this->totalJugadas) < 14) {
            $this->totalJugadas = $jugada;
            return true;
        } else {
            return false;
        }
    }

    // Para ver todas las jugadas
    public static function mostrarJugadas() {
        foreach ($this->totalJugadas as $num => $valores) {
            echo "Jugada $num fué " . $valores[0] . " " . $valores[1] . " " . $valores[2] . " " . $valores[3];
        }
    }

    public function borrarJugadas() {
        unset($this->totalJugadas);
    }

    //Getters and Setters
    function getMi_jugada() {
        return $this->mi_jugada;
    }

    function getTotalJugadas() {
        return $this->totalJugadas;
    }

    function setMi_jugada($mi_jugada) {
        $this->mi_jugada = $mi_jugada;
    }

    function setTotalJugadas($totalJugadas) {
        $this->totalJugadas = $totalJugadas;
    }

}
