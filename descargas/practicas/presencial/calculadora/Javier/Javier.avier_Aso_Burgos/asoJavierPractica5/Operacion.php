<?php

abstract class Operacion {

    //------------------ATRIBUTOS DE LA CLASE-------------------//

    private $operando1;
    private $operando2;
    private $operacion;
    private $resultado;
    private $cadenaResultado;

    //-----------------CONSTRUCTOR--------------------------//

    function __construct($operando1, $operando2, $operacion) {
        $this->operando1 = $operando1;
        $this->operando2 = $operando2;
        $this->operacion = $operacion;
    }

    //----------------- GETTER Y SETTER---------------------//

    function getOperando1() {
        return $this->operando1;
    }

    function getOperando2() {
        return $this->operando2;
    }

    function getOperacion() {
        return $this->operacion;
    }

    function getResultado() {
        return $this->resultado;
    }

    function getCadenaResultado() {
        return $this->cadenaResultado;
    }

    function setResultado($resultado): void {
        $this->resultado = $resultado;
    }

    function setCadenaResultado($cadenaResultado): void {
        $this->cadenaResultado = $cadenaResultado;
    }

    //---------------MÉTODOS ABSTRACTOS---------------//

    protected abstract function resuelve();

    public abstract function __toString();

    //---------------MÉTODOS ESTÁTICOS ---------------//


    private static function chequeaOperandos($cadena) { //Esta función recibe un operando y devuelve el tipo de este o false si no coincide.
        switch (true) {


            case (preg_match("/^([0-9]+)\/[\d]+$/", $cadena) == true):


                return "fraccion";

            case (preg_match("/^([0-9]+)$/", $cadena) == true):


                return "entero";


            case (preg_match("/^([\d]+)\.(\d)+$/", $cadena) == true):


                return "real";

            default:
                return false;
        }
    }

    private static function posicionCorte($operacion) {//Recibe la operación y devuelve la posición para realizar el corte de la cadena.
        $mult = strpos($operacion, "*");
        if ($mult) {
            return $mult;
        }
        $divi = strpos($operacion, ":");
        if ($divi) {
            return $divi;
        }
        $suma = strpos($operacion, "+");
        if ($suma) {
            return $suma;
        }
        $resta = strpos($operacion, "-");
        if ($resta) {
            return $resta;
        }
        $fracc = strpos($operacion, "/");
        if ($fracc) {
            return $fracc;
        }
        return 0;
    }

    private static function separaOperandos($operacion) {//Recibe la operación y la corta, devolviendo los operandos y la operación en un array.
        $corte = self::posicionCorte($operacion);

        $array = [];
        $array['operacion'] = substr($operacion, $corte, 1);
        $array['operando 1'] = substr($operacion, 0, $corte);
        $array['operando 2'] = substr($operacion, $corte + 1);
        return $array;
    }

    public static function generaOperacion($operacion) {//Analiza los dos operandos e instacia un objeto de la clase OperacionRacional n
        //o OperacioReal según sea el caso.
        $array = self::separaOperandos($operacion);

        switch (true) {

            case (self::chequeaOperandos($array["operando 1"]) == "fraccion" && self::chequeaOperandos($array["operando 2"]) == "fraccion"):
            case (self::chequeaOperandos($array["operando 1"]) == "fraccion" && self::chequeaOperandos($array["operando 2"]) == "entero"):
            case (self::chequeaOperandos($array["operando 1"]) == "entero" && self::chequeaOperandos($array["operando 2"]) == "fraccion"):

                $opRacional = new OperacionRacional(new Racional($array["operando 1"]), new Racional($array["operando 2"]), $array["operacion"]);

                return $opRacional;

            case (self::chequeaOperandos($array["operando 1"]) == "real" && self::chequeaOperandos($array["operando 2"]) == "real"):
            case (self::chequeaOperandos($array["operando 1"]) == "real" && self::chequeaOperandos($array["operando 2"]) == "entero"):
            case (self::chequeaOperandos($array["operando 1"]) == "entero" && self::chequeaOperandos($array["operando 2"]) == "real"):
            case (self::chequeaOperandos($array["operando 1"]) == "entero" && self::chequeaOperandos($array["operando 2"]) == "entero"):
                $opReal = new OperacionReal($array["operando 1"], $array["operando 2"], $array["operacion"]);

                return $opReal;
            default://Si la operación no es válida se devuelve el siguiente código html:

                return "<fieldset id=rtdo>"
                        . "<legend>Resultado</legend>"
                        . "<label> La operación <br /><strong>$operacion</strong><br /> No es una operación válida</label>"
                        . "</fieldset>";
        }
    }

}

?>
