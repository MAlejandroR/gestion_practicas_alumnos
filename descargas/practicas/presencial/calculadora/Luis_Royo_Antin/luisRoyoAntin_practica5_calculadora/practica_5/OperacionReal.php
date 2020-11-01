<!--
PRÁCTICA 5 AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->

<?php

class OperacionReal extends Operacion {

    //El tipo no va a cambiar, así que será una variable constante: 
    protected const TIPO = "Real";

    //El constructor se hereda de "Operación", pero también será necesario añadir el resultado.
    public function __construct($operacionUsuario) {
        parent::__construct($operacionUsuario);
        $this->setResultado($this->resolver());
    }

    //En el método 'resolver()' explico en qué consiste este método:
    public function sacaOperador(&$op1, &$op2) {
        if (substr($op1, -1) == "/") {
            $op1 = substr($op1, 0, -1);
            $operador = "/";
            $this->setOperador($operador);
            $this->setOperando1($op1);
            $op2 = "-" . $op2;
            $this->setOperando2($op2);
        } else {
            $operador = $this->getOperador();
        }
        return $operador;
    }

    public function resolver() {
        $op1 = $this->getOperando1();
        $op2 = $this->getOperando2();
        //Se puede dar el caso de que el denominador sea negativo.
        //Para evitar problemas de cálculo o de muestreo en pantalla, introduzco las siguientes
        //modificaciones:
        $operador = $this->sacaOperador($op1, $op2);
        switch (true) {
            case $operador == "+":
                $resultado = $op1 + $op2;
                break;
            case $operador == "-":
                $resultado = $op1 - $op2;
                break;
            case $operador == "*":
                $resultado = $op1 * $op2;
                break;
            case $operador == "/":
                //Si la división de los dos operandos es cero, el programa mostrará un cero.
                //Considero que esta opción es más estética que mostrar 0/0:
                if ($op1 / $op2 == 0) {
                    $resultado = 0;
                } else {
                    $resultado = $op1 / $op2;
                }
                break;
        }
        return $resultado;
    }

    //El siguiente método sacará la tabla con todos los valores que se espefican en el enunciado:
    public function mostrarTabla() {
        return "<table border=1 style='text-align:center'>"
                . "<tr><td>CONCEPTO</td><td>VALORES</td></tr>"
                . "<tr><td>Operando 1</td><td>" . $this->getOperando1() . "</td></tr>"
                . "<tr><td>Operando 2</td><td>" . $this->getOperando2() . "</td></tr>"
                . "<tr><td>Operación</td><td>" . $this->getOperador() . "</td></tr>"
                . "<tr><td>Tipo de operación</td><td>" . self::TIPO . "</td></tr>"
                . "<tr><td>Resultado</td><td>" . $this->getResultado() . "</td></tr>"
                . "</table>";
    }

}
