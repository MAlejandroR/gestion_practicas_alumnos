<!--
PRÁCTICA 5 AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->

<?php

class OperacionRacional extends Operacion {

    protected const TIPO = "Racional";

    protected $resultadoSimplificado;

    //El constructor utiliza el de la superclase, pero también añade el resultado y el resultado simplificado, que no está
    //presente en la clase 'OperaciónReal'
    public function __construct($operacionUsuario) {
        parent::__construct($operacionUsuario);
        $this->setResultado($this->resolver());
        $this->setResultadoSimplificado($this->simplificar());
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getResultadoSimplificado() {
        return $this->resultadoSimplificado;
    }

    public function setResultadoSimplificado($resultadoSimplificado) {
        $this->resultadoSimplificado = $resultadoSimplificado;
    }

    //Dentro de este método, el programa crea dos objetos de clase 'Racional', pueso que el programa en este punto
    //operará con dos números racionales.
    public function resolver() {
        $op1 = new Racional($this->getOperando1());
        $op2 = new Racional($this->getOperando2());
        $operador = $this->getOperador();
        //En función del operador se ejecutará una operación u otra con los operados.
        //Para ello, el programa llamará a los métodos de la clase "Racional":
        switch (true) {
            case $operador == "+":
                $resultado = $op1->suma($op2);
                break;
            case $operador == "-":
                $resultado = $op1->resta($op2);
                break;
            case $operador == "*":
                $resultado = $op1->multiplica($op2);
                break;
            case $operador == ":":
                $resultado = $op1->divide($op2);
                break;
            default:
                $resultado = "error";
                break;
        }
        return $resultado;
    }

    //Sencillo método que devuelve el resultado simplifiado, tras ejecutar el método de la clase 'Racional'
    public function simplificar() {
        $resultado = $this->resolver();
        $resultado->simplifica();
        return $resultado;
    }

    //Se pueden mostrar dos tablas: una en caso de que se pueda simplificar el resultado de la fracción y otra en caso de que
    //no sea posible dicha simplificación:
    public function mostrarTabla() {
        if ($this->getResultado() == $this->getResultadoSimplificado()) {
            return "<table border=1 style='text-align:center'>"
                    . "<tr><td>CONCEPTO</td><td>VALORES</td></tr>"
                    . "<tr><td>Operando 1</td><td>" . $this->getOperando1() . "</td></tr>"
                    . "<tr><td>Operando 2</td><td>" . $this->getOperando2() . "</td></tr>"
                    . "<tr><td>Operación</td><td>" . $this->getOperador() . "</td></tr>"
                    . "<tr><td>Tipo de operación</td><td>" . self::TIPO . "</td></tr>"
                    . "<tr><td>Resultado</td><td>" . $this->getResultado() . "</td></tr>"
                    . "</table>";
        } else {
            return "<table border=1 style='text-align:center'>"
                    . "<tr><td>CONCEPTO</td><td>VALORES</td></tr>"
                    . "<tr><td>Operando 1</td><td>" . $this->getOperando1() . "</td></tr>"
                    . "<tr><td>Operando 2</td><td>" . $this->getOperando2() . "</td></tr>"
                    . "<tr><td>Operación</td><td>" . $this->getOperador() . "</td></tr>"
                    . "<tr><td>Tipo de operación</td><td>" . self::TIPO . "</td></tr>"
                    . "<tr><td>Resultado</td><td>" . $this->getResultado() . "</td></tr>"
                    . "<tr><td>Resultado simplificado</td><td>" . $this->getResultadoSimplificado() . "</td></tr>"
                    . "</table>";
        }
    }

}
