<?php
//función que detecta automáticamente las clases
spl_autoload_register(function($class) {
    require "$class.php";
});
//clase OperacionReal
class OperacionReal extends Operacion{
    //Variable
    private $tipo = "Real";
    //Getter    
    function getTipo() {
        return $this->tipo;
    }
    //Función que devuelve el resultado de la operación según el operador
    function operar(){
        //creo dos variables para los números de las operaciones
        $this->num1 = floatval($this->num1);
        $this->num2 = floatval($this->num2);
        //switch para evaluar el operador
        switch ($this->operador){
            case "+":
                $resultado = $this->num1+$this->num2;
                break;
            case "-":
                $resultado = $this->num1-$this->num2;
                break;
            case "*":
                $resultado = $this->num1*$this->num2;
                break;
            case "/":
                $resultado = $this->num1/$this->num2;
                break;
        }
        //devuelvo el resultado
        return $resultado;
    }

}

?>