<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugada
 *
 * @author alumno6
 */
class Jugada {

    private $jugadaUsuario = [];
    private $aciertos;

    function __construct(Clave $clave, $arrayJugada) {
        $contador = 0;
        $array = $clave->getClave();
        for ($i = 0; $i < 4; $i++) {
            if ($array[$i] == $arrayJugada[$i]) {
                $this->jugadaUsuario[$i] = $array[$i];
            } else {
                $this->jugadaUsuario[$i] = "fallo";
            }
        }
        for ($i = 0; $i < 4; $i++) {
            for ($u = 0; $u < 4; $u++) {
                if ($array[$u] == $arrayJugada[$i]) {
                    $contador++;
                } else {
                    $contador;
                }
            }
        }
        $this->aciertos = $contador;
    }

    function compruebaVictoria(Clave $clave, $arrayJugada) {
        $contador = 0;
        $array = $clave->getClave();
        for ($i = 0; $i < 4; $i++) {
            if ($array[$i] == $arrayJugada[$i]) {
                $this->jugadaUsuario[$i] = $array[$i];
                $contador++;
            } else {
                $this->jugadaUsuario[$i] = "fallo";
            }
        }
        if ($contador == 4) {
            return true;
        } else {
            return false;
        }
    }

    public function __toString() {
        $texto = "";
        foreach ($this->jugadaUsuario as $color)
            $texto .= "$color-";
        $texto = substr($texto, 0, strlen($texto) - 1) . " // Has acertado " . $this->aciertos . " colores.";
        return $texto;
    }

}
