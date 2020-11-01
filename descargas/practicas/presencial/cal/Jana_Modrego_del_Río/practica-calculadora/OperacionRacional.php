<?php
class OperacionRacional extends Operacion {
    // Hereda los atributos de la clase Operador
    // Constructor
    public function __construct($operacion) {
        parent::__construct($operacion);
    }
    
    // Método abstracto para realizar la operación
    public function resolver() {
        $operando1 = new Racional($this->operando1);
        $operando2 = new Racional($this->operando2);
        $operador = $this->operador;
        switch ($operador) {
            case '+':
                $rtdo = $operando1->sumar($operando2);
                break;
            case '-':
                $rtdo = $operando1->restar($operando2);
                break;
            case '*':
                $rtdo = $operando1->multiplicar($operando2);
                break;
            case ':':
                $rtdo = $operando1->dividir($operando2);
                break;
        }
        return $rtdo;
    }
    
    // Método abstracto para mostrar la tabla con la información de la operación
    public function mostrar() {
        // Para poder mostrar el racional si tiene un solo parámetro
        $operando1 = new Racional ($this->operando1);
        $operando2 = new Racional($this->operando2);
        return "<fieldset>
            <legend>Resultado</legend>
            <label>
                <table border=1>
                    <tr>
                        <th>Concepto</th>
                        <th>Valores</th></tr>
                    <tr>
                        <th>Operando 1</th>
                        <th>$operando1</th>
                    </tr>
                    <tr>
                        <th>Operador</th>
                        <th>$this->operador</th>
                    </tr>
                    <tr>
                        <th>Operando 2 </th>
                        <th>$operando2</th>
                    </tr>
                    <tr>
                        <th>Tipo de operacion  </th>
                        <th>Racional</th>
                    </tr>
                    <tr>
                        <th>Resultado </th>
                        <th>".OperacionRacional::resolver()."</th>
                    </tr>
                    <tr>
                        <th>Resultado simplificado</th>
                        <th>" .OperacionRacional::simplifica() . "</th>
                    </tr>
                </table>
            </label>
        </fieldset>";
    }
    
    // Método para simplificar el resultado racional
    public function simplifica() {
        $numero = OperacionRacional::resolver();
        $num = $numero->getNum();
        $den= $numero->getDen();
        $dividendo = max($num, $den);
        $divisor = min($num,$den);
        // Obtengo el máximo común divisor
        $resto = $dividendo%$divisor;
        while($resto > 0){
            $dividendo = $divisor;
            $divisor = $resto;
            $resto = $dividendo%$divisor;
        }
        $num_simplificado=$num/$divisor;
        $den_simplificado=$den/$divisor;
        // Devuelvo la fracción simplificada por el mcd
        return new Racional($num_simplificado, $den_simplificado);  
    }
       
    public function __toString() {
        return $this->operando1 . $this->operador . $this->operando2 
                . "=" . OperacionRacional::resolver();
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
