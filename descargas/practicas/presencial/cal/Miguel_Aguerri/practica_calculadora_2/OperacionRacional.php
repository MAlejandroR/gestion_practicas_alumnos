<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacionRacional
 *
 * @author alumno
 */
class OperacionRacional extends Operacion{
    protected $simplificado;
    //put your code here
    public function __construct($operacion) {
        parent::__construct($operacion);
        $this->operar();
    }
    public function operar(){
        $this->operadores("Racional");
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);
        switch ( $this->operador) {
            case '+':
                $this->resultado = $this->op1->sumar($this->op2);
                break;
            case '-':
                $this->resultado = $this->op1->restar($this->op2);
                break;
            case '*':
                $this->resultado = $this->op1->multiplicar($this->op2);
                break;
            case ':':
                $this->resultado = $this->op1->dividir($this->op2);
                break;
        }
        $this->simplificado = Racional::simplificar($this->resultado);
        $this->__toString();
    }
    public static function comprobar($cadena) {
        parent::comprobar($cadena);
    }

    public function __toString() {
        return "<legend>Resultado</legend>
                    <label>
                    <table border=1>
                        <tr>
                            <th>Cocepto</th> 
                            <th>Valores</th>
                        </tr>
                        <tr>
                            <th>Operando 1 </th> 
                            <th> $this->op1</th>
                        </tr>
                        <tr>
                            <th>Operando 2 </th> 
                            <th> $this->op2</th>
                        </tr>
                        <tr>
                            <th>Operación </th> 
                            <th> $this->operador</th>
                        </tr>
                        <tr>
                            <th>Tipo de operacion  </th> 
                            <th> Racional</th>
                        </tr>
                        <tr>
                            <th>Resultado </th>
                            <th>$this->resultado</th>
                        </tr>
                        <tr>
                            <th>Simplificación </th>
                            <th>$this->simplificado</th>
                        </tr>
                    </table>
                    </label>
                   </fieldset>";
    }

    public function dividir() {
        
    }

    public function multiplicar() {
        
    }

    public function restar() {
        
    }

    public function sumar() {
        
    }

}
