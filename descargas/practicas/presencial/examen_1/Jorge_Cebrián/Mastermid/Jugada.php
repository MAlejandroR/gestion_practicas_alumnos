<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugada
 *
 * @author alumno17
 */
class Jugada {

    private $arrayJugada;
    private $pos = 0;
    private $col = 0;

    function __construct($color1, $color2, $color3, $color4) {
        $this->arrayJugada = [$color1, $color2, $color3, $color4];
    }

    function getArrayJugada() {
        return $this->arrayJugada;
    }

    function setArrayJugada($arrayJugada) {
        $this->arrayJugada = $arrayJugada;
    }

    public function comprobarAciertos(Clave $clave) {

        if ($clave->getClaveColores()[0] == $this->arrayJugada[0]) {
            $this->pos++;
            $this->col += 1;
        } else {
            for ($i = 0; $i < 4; $i++) {
                if ($clave->getClaveColores()[0] == $this->arrayJugada[$i]) {
                    $this->col += 1;
                }
            }
        }
        if ($clave->getClaveColores()[1] == $this->arrayJugada[1]) {
            $this->pos++;
            $this->col += 1;
        } else {
            for ($i = 0; $i < 4; $i++) {
                if ($clave->getClaveColores()[1] == $this->arrayJugada[$i]) {
                    $this->col += 1;
                }
            }
        }
        if ($clave->getClaveColores()[2] == $this->arrayJugada[2]) {
            $this->pos++;
            $this->col += 1;
        } else {
            for ($i = 0; $i < 4; $i++) {
                if ($clave->getClaveColores()[2] == $this->arrayJugada[$i]) {
                    $this->col += 1;
                }
            }
        }
        if ($clave->getClaveColores()[3] == $this->arrayJugada[3]) {
            $this->pos++;
            $this->col += 1;
        } else {
            for ($i = 0; $i < 4; $i++) {
                if ($clave->getClaveColores()[3] == $this->arrayJugada[$i]) {
                    $this->col += 1;
                }
            }
        }
    }

    function getPos() {
        return $this->pos;
    }

    function getCol() {
        return $this->col;
    }

    function setPos($pos) {
        $this->pos = $pos;
    }

    function setCol($col) {
        $this->col = $col;
    }

}
