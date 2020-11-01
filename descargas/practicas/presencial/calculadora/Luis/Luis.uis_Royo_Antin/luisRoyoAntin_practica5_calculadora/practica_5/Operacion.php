<!--
PRÁCTICA 5 AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->

<?php

abstract class Operacion {

    protected $operando1;
    protected $operando2;
    protected $operador;
    protected $resultado;

    //El constructor construirá a partir de la cadena que el usuario introduzca en el input
    public function __construct($operacionUsuario) {
        //Para ello, el programa dará valor al operador y al operando, en función de tres grupos de expresiones regulares
        //que se corresponden con el primer operando, el segundo operando y el operador:
        $valores = [];
        $op1 = "([\+|\-]?\d+[\.\/]?\d*)";
        $operador = "([\+|\-|\*|\/|\:])";
        $op2 = "([\+|\-]?\d+[\.\/]?\d*)";
        //En este caso, 'preg_match' creará un array y en cada posición de ese array colocará un grupo de los anteriores.
        preg_match("/^$op1$operador$op2$/", $operacionUsuario, $valores);
        //De esta forma, los operandos ocuparán dos posiciones del array y el operador otra:
        $this->setOperando1($valores[1]);
        $this->setOperando2($valores[3]);
        $this->setOperador($valores[2]);
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

    public function getResultado() {
        return $this->resultado;
    }

    public function setOperando1($operando1) {
        $this->operando1 = $operando1;
    }

    public function setOperando2($operando2) {
        $this->operando2 = $operando2;
    }

    public function setOperador($operador) {
        $this->operador = $operador;
    }

    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    //El siguiente método es estático y es llamado desde el index
    //Se sirve de la cadena introducida por el usuario para obtener el tipo de operación:
    public static function sacaTipo($operacionUsuario) {
        $operacion = "";
        //Expresiones para números entero, racional y real:
        $entero = "[\+|\-]?\d+";
        $racional = "[\+|\-]?\d+[\/][1-9]+";
        $real = "[\+|\-]?\d+[\.][1-9]\d*";
        //Los operadores para las operaciones reales pueden ser los siguientes:
        $operadorReal = "[\+|\-|\/|\*]";
        //Las operaciones reales pueden ser de seis tipos, en función de los operandos:
        $operacionReal = "/^$entero$operadorReal$entero$/";
        $operacionReal2 = "/^$real$operadorReal$real$/";
        $operacionReal3 = "/^$entero$operadorReal$real$/";
        $operacionReal4 = "/^$real$operadorReal$entero$/";
        //Aquí recogo la posibilidad de que el denominador sea cero. En este caso, como se puede observar en el switch,
        //el programa devolverá un mensaje de error
        $operacionReal5 = "/^[\+|\-]?\d+[\/][0]$/";
        //Lo mismo sucederá si el usuario introduce por ejemplo "5.5/0". Tengo en cuenta, por tanto, los decimales:
        $operacionReal6 = "/^[\+|\-]?\d+[\.][1-9]\d*[\/][0]$/";
        $operadorRacional = "[\+|\-|\:|\*]";
        //Las operaciones reales podrán ser de tres tipos, en función de los operandos especificados en el enunciado de la práctica:
        $operacionRacional = "/^$racional$operadorRacional$racional$/";
        $operacionRacional2 = "/^$racional$operadorRacional$entero$/";
        $operacionRacional3 = "/^$entero$operadorRacional$racional$/";
        switch (true) {
            case preg_match($operacionReal5, $operacionUsuario):
            case preg_match($operacionReal6, $operacionUsuario):
                $operacion = "error";
                break;
            case preg_match($operacionReal, $operacionUsuario):
            case preg_match($operacionReal2, $operacionUsuario):
            case preg_match($operacionReal3, $operacionUsuario):
            case preg_match($operacionReal4, $operacionUsuario):
                $operacion = "real";
                break;
            case preg_match($operacionRacional, $operacionUsuario):
            case preg_match($operacionRacional2, $operacionUsuario):
            case preg_match($operacionRacional3, $operacionUsuario):
                $operacion = "racional";
                break;
            default:
                $operacion = "error";
                break;
        }
        return $operacion;
    }

    public static function calculaYMuestra($entrada) {
        $tipo = self::sacaTipo($entrada);
        switch (true) {
            //Si está vacío el campo, el programa se lo hará saber al usuario:
            case empty($entrada):
                $msj = "No hay valores para calcular";
                break;
            //Si el usuario introduce una operación con signos erróneos, con letras o con otro tipo de errores,
            //el programa le indicará que la operación no es válida
            case $tipo == "error":
                $msj = $entrada . "<br/>Es una operación no válida";
                break;
            //Si la operación es real, el programa creará un objeto de la clase "OperacionReal" y, con la ayuda del método
            //'mostrar tabla', mostrará la tabla con todos los datos que se especifican en el enunciado, incluido el resultado
            case $tipo == "real":
                $operacion = new OperacionReal($entrada);
                $msj = $operacion->mostrarTabla();
                break;
            //Si la operación es racional, el programa seguirá un esquema similar al anterior case:
            case $tipo == "racional":
                $operacion = new OperacionRacional($entrada);
                $msj = $operacion->mostrarTabla();
                break;
        }
        //Devolveré la tabla, que ejecutará el index
        return $msj;
    }

    //A continuación, figuran dos métodos abstractos que "rellenarán" las clases que heredan de esta:
    abstract public function resolver();

    abstract public function mostrarTabla();
}
