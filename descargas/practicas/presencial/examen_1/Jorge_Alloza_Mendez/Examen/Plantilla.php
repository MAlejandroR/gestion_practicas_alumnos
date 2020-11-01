<?php


class Plantilla {
    private $formMostrarOcultar;
    private $formJugadas;
    private $formClave;
    private $formColores;
    
    function __construct() {
        $this->setFormClave();
        $this->setFormColores();
        $this->setFormJugadas();
        $this->setFormMostrarOcultar();
    }
    function setFormMostrarOcultar() {
        $this->formMostrarOcultar = "<fieldset>"
                ."<legend><h2> Mostrar, Ocultar, o Resetear</h2></legend>"
                . "<form action='main.php' method='POST'>"
                . "<input type='submit' value='mostrar clave' name='mos'>"
                . "<input type='submit' value='ocultar clave' name='ocu'>"
                . "<input type='submit' value='reset' name ='reset'>"
                . "</form>"
                . "</fieldset>";
        
    }

    function setFormJugadas() {
        $this->formJugadas =  "<fieldset>"
                ."<legend><h2> Jugadas</h2></legend>"
                . "</fieldset>";
    }

    function setFormClave() {
        $this->formClave =  "<fieldset>"
                ."<legend><h2> La Clave</h2></legend>"               
                . "</fieldset>";
    }

    function setFormColores() {
        $this->formColores =  "<fieldset> "
            ."<legend><h2> Elige los colores</h2></legend>"
                . "<form action='main.php' method='POST'>"
                ."<select name='colores1'>"
                    ."<option azul='Azul'> Azul </option>"
                    ."<option value='Rojo'> Rojo </option>"
                    ."<option value='Naranja'> Naranja</option>"
                    ."<option value='Verde'> Verde </option>"
                    ."<option value='Violeta'> Violeta</option>"
                    ."<option value='Amarillo'> Amarillo</option>"
                    ."<option value='Marron'> Marron</option>"
                    ."<option value='Rosa'> Rosa </option>"
                . "</select>"
                ."<select name='colores2'>"
                    ."<option azul='Azul'> Azul </option>"
                    ."<option value='Rojo'> Rojo </option>"
                    ."<option value='Naranja'> Naranja</option>"
                    ."<option value='Verde'> Verde </option>"
                    ."<option value='Violeta'> Violeta</option>"
                    ."<option value='Amarillo'> Amarillo</option>"
                    ."<option value='Marron'> Marron</option>"
                    ."<option value='Rosa'> Rosa </option>"
                . "</select>"
                ."<select name='colores3'>"
                   ."<option azul='Azul'> Azul </option>"
                    ."<option value='Rojo'> Rojo </option>"
                    ."<option value='Naranja'> Naranja</option>"
                    ."<option value='Verde'> Verde </option>"
                    ."<option value='Violeta'> Violeta</option>"
                    ."<option value='Amarillo'> Amarillo</option>"
                    ."<option value='Marron'> Marron</option>"
                    ."<option value='Rosa'> Rosa </option>"
                . "</select>"
                ."<select name='colores4'>"
                   ."<option azul='Azul'> Azul </option>"
                    ."<option value='Rojo'> Rojo </option>"
                    ."<option value='Naranja'> Naranja</option>"
                    ."<option value='Verde'> Verde </option>"
                    ."<option value='Violeta'> Violeta</option>"
                    ."<option value='Amarillo'> Amarillo</option>"
                    ."<option value='Marron'> Marron</option>"
                    ."<option value='Rosa'> Rosa </option>"
                . "</select>"
                ."<input type='submit' value='coloresJugador' name='coloresJug'> "
                . "</form></fieldset>";
    }
    function getFormMostrarOcultar() {
        return $this->formMostrarOcultar;
    }

    function getFormJugadas() {
        return $this->formJugadas;
    }

    function getFormClave() {
        return $this->formClave;
    }

    function getFormColores() {
        return $this->formColores;
    }

    public function __toString() {
        return $this->getFormClave() . $this->getFormColores() . $this->getFormJugadas() . $this->getFormMostrarOcultar();
    }
}


?>