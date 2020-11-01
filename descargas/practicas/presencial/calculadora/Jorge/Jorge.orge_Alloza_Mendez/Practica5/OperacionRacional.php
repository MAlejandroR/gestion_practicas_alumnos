<?php
//función que detecta automáticamente las clases
spl_autoload_register(function($class) {
    require "$class.php";
});
//clase OperacionRacional
class OperacionRacional extends Operacion {
    //Variable 
    private $tipo = "Racional";
    //Getter    
    function getTipo() {
        return $this->tipo;
    }
    //Función que devuelve el resultado de la operación según el operador
    function operar() {
        //creo dos variables para los números de las operaciones
        $num1 = new Racional($this->num1);
        $num2 = new Racional($this->num2);
        //switch para evaluar el operador
        switch ($this->operador) {
            case "+":              
                $resultado = $num1->suma($num2);
                break;
            case "-":
                $resultado = $num1->resta($num2);
                break;
            case "*":
                $resultado = $num1->multiplicacion($num2);
                break;
            case ":":
                $resultado = $num1->division($num2);
                break;
        }
        //devuelvo el resultado
        return $resultado;
    }

}

?>