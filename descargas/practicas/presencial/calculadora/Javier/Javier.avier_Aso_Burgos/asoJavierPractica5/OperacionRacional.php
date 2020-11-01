<?php

class OperacionRacional extends Operacion {

    //------------------ATRIBUTOS DE LA CLASE-------------------//

    private $resultadoSimplificado;
    private $mcd;

    //-----------------CONSTRUCTOR--------------------------//


    function __construct($operando1, $operando2, $operacion) {
        parent::__construct($operando1, $operando2, $operacion);
        $this->resuelve();
        $this->setresultadoSimplificado();
    }

    //----------------- GETTER Y SETTER---------------------//


    function getMcd() {
        return $this->mcd;
    }

    function setMcd($mcd): void {
        $this->mcd = $mcd;
    }

    function setResultadoSimplificado(): void {//Este método instancia un nuevo racional a partir del resultado y lo simplifica.
        $resultado = parent::getResultado();
        $this->resultadoSimplificado = new Racional($resultado->getNumerador() . "/" . $resultado->getDenominador());
        $this->setMcd($this->resultadoSimplificado->simplifica());
    }

    //-------------------MÉTODOS IMPLEMENTADOS---------------//

    protected function resuelve() {//Resuelve la Operación
        $op1 = parent::getOperando1();
        $op2 = parent::getOperando2();
        $operacion = parent::getOperacion();

        switch ($operacion) {
            case '+':

                parent::setResultado($op1->suma($op2));
                break;

            case '-':

                parent::setResultado($op1->resta($op2));
                break;

            case '*':

                parent::setResultado($op1->multiplica($op2));
                break;

            case ':':

                parent::setResultado($op1->divide($op2));
                break;
        }
        parent::setCadenaResultado($op1 . $operacion . $op2 . "=" . parent::getResultado()); //También guardo el resultado como una cadena.
    }

    public function __toString() {//Genero el fieldset que mostraré como resultado
        $resultado = parent::getResultado();
        $resultadoSimplificado = $this->resultadoSimplificado;

        $cadena = "<fieldset id=rtdo>
                  <legend>Resultado</legend>
                  <label>
                  <table border=1>
                  <tr>
                  <th>Concepto</th>
                  <th>Valores</th>
                  </tr>
                  <tr>
                  <th>Operando 1 </th>
                  <th>" . parent::getOperando1() . "</th>
                  </tr>
                  <tr>
                  <th>Operando 2 </th>
                  <th>" . parent::getOperando2() . "</th>
                  </tr>
                  <tr>
                  <th>Operación </th>
                  <th>" . parent::getOperacion() . "</th>
                  </tr>
                  <tr>
                  <th>Tipo de operacion  </th>
                  <th> Racional </th>
                  </tr>
                  <tr>
                  <th>Resultado </th>
                  <th>" . $resultado . "</th>
                  </tr>";


        if ($this->mcd != 1) {//Si se ha tenido que simplificar
            $cadena .= "<tr>
                  <th>Resultado simplificado</th>
                  <th>" . "$resultadoSimplificado" . "</th>
                  </tr>
                  </table>
                  </label>
                  </fieldset>";
            return $cadena;
        }


        $cadena .= "</table>
                  </label>
                  </fieldset>";
        return $cadena;
    }

}
