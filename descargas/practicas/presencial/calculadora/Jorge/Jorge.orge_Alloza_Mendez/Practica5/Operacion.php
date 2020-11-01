<?php
//Clase abstracta por que va ha ser padre de las clases OperacionRacional 
//y OperaciónReal 
abstract class Operacion {
//Variables protected para que solo las puevan ver los hijos
    protected $num1;
    protected $num2;
    protected $operador;
//Constructor    
    function __construct($num1, $operador, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operador = $operador;
    }
    //getters
    function getNum1() {
        return $this->num1;
    }
    function getNum2() {
        return $this->num2;
    }
    function getOperador() {
        return $this->operador;
    }
    //setters
    function setNum1($num1) {
        $this->num1 = $num1;
    }
    function setNum2($num2) {
        $this->num2 = $num2;
    }
    function setOperador($operador) {
        $this->operador = $operador;
    }
    //función que valida el contenido de la caja de texto del formulario
    public static function valida($operacion) {
        //En el caso de que sea true el resultado de la validadción me devuelve 
        //un array el cual lo guardo en un array
        $validacion = preg_match("/^([\+\-]?\d+([\.\/]?)\d*)([\+\-\*\/:])([\+\-]?\d+([\.\/]?)\d*)$/", $operacion, $elementos);
        //en el caso de que no sea true, hago un retun null para que acabe la
        //funcion
        if (!$validacion) {
            return null;
        }
        // asigno los valores según las posiciones del array
        $n1 = $elementos[1];
        $n2 = $elementos[4];
        $operador = $elementos[3];
        //función que comprueba que las operaciones racionales no puedan tener
        //como divisor "/" y que las operaciones reales no puedan tener como
        //divisor ":"
        if (($operador == '/' && ($elementos[2] == '/' || $elementos[5] == '/')) ||
                ($operador == ':' && ($elementos[2] == '.' || $elementos[5] == '.'))) {
            return null;
        }
        //aquí sí hay un "/" en las posiciones 2 o 5 del array indicando que es
        //una operación racional, y si no es una operación real
        if ($elementos[2] == '/' || $elementos[5] == '/') {        
            //creo un objeto de la clase OperacionRacional y lo devuelvo
            return new OperacionRacional($n1, $operador, $n2);
        } else {         
            //creo un objeto de la clase OperacionReal y lo devuelvo
            return new OperacionReal($n1, $operador, $n2);
        }
    }    
}

?>