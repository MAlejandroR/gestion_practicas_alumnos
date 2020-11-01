<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacionReal
 *
 * @author alumno
 */
class OperacionReal extends Operacion{
    //put your code here
    public function __construct($operacion) {
        parent::__construct($operacion);
        $this->operar();
    }
    public function operar(){
        $this->operadores("Real");
        switch ( $this->operador) {
            case '+':
                $this->resultado = $this->sumar();
                break;
            case '-':
                $this->resultado = $this->restar();
                break;
            case '*':
                $this->resultado = $this->multiplicar();
                break;
            case '/':
                $this->resultado = $this->dividir();
                break;
        }
        $this->__toString();
    }
    public static function comprobar($cadena) {
        parent::comprobar($cadena);
    }

    public function setop1($op1) {
        parent::setop1($op1);
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
                            <th> Real</th>
                        </tr>
                        <tr>
                            <th>Resultado </th>
                            <th>$this->resultado</th>
                        </tr>
                    </table>
                    </label>
                   </fieldset>";
    }

    public function dividir() {
        return $this->op1/$this->op2;
    }

    public function multiplicar() {
        return $this->op1*$this->op2;
    }

    public function restar() {
        return $this->op1-$this->op2;
    }

    public function sumar() {
        return $this->op1+$this->op2;
    }


}
