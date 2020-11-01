<?php
class OperacionReal extends Operacion {
    //Hereda todos los atributos de la clase Operador
    // Constructor
    public function __construct($operacion) {
        parent::__construct($operacion);
    }
    
    // Método abstracto para realizar la operación
    public function resolver() {
        $operando1 = $this->operando1;
        $operando2 = $this->operando2;
        $operador = $this->operador;
        switch ($operador) {
            case '+':
                $rtdo = $operando1 + $operando2;
                break;
            case '-':
                $rtdo = $operando1 - $operando2;
                break;
            case '*':
                $rtdo = $operando1 * $operando2;
                break;
            case '/':
                $rtdo = $operando1 / $operando2;
                break;
        }
        return $rtdo;
    }
    
    // Método abstracto para mostrar la tabla con la información de la operación
    function mostrar() {
        return "<fieldset>
            <legend>Resultado</legend>
            <label>
                <table border=1>
                    <tr>
                        <th>Concepto</th>
                        <th>Valores</th></tr>
                    <tr>
                        <th>Operando 1</th>
                        <th>$this->operando1</th>
                    </tr>
                    <tr>
                        <th>Operador </th>
                        <th>$this->operador</th>
                    </tr>
                    <tr>
                        <th>Operando 2 </th>
                        <th>$this->operando2</th>
                    </tr>
                    <tr>
                        <th>Tipo de operacion  </th>
                        <th>Real</th>
                    </tr>
                    <tr>
                        <th>Resultado </th>
                        <th>".OperacionReal::resolver()."</th>
                    </tr>
                </table>
            </label>
        </fieldset>";
    }

    public function __toString() {
        return $this->operando1 . $this->operador . $this->operando2 . "=" . OperacionReal::resolver();
    }

    public function getOperando1() {
        return $this->operando1;
    }

    public function getOperando2() {
        return $this->operando2;
    }

    public function getOperador() {
        return $this->operador;
    }

}
