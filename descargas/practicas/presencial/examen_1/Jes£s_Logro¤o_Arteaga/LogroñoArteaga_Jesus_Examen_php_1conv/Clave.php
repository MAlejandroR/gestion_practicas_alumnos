<?php

class Clave {

    private $clave;

    public function __construct() {
        $colores = ['azul', 'rojo', 'naranja', 'verde', 'violeta', 'amarillo', 'marron', 'rosa'];
        $nums = $this->generarNums();
        $this->clave = array(
            $colores[$nums[0]],
            $colores[$nums[1]],
            $colores[$nums[2]],
            $colores[$nums[3]]
        );
    }

    public function generarNums() {
        $num = rand(0, 7);
        $num2 = rand(0, 7);
        while ($num == $num2) {
            $num2 = rand(0, 7);
        }
        $num3 = rand(0, 7);
        while ($num3 == $num2 || $num3 == $num) {
            $num3 = rand(0, 7);
        }
        $num4 = rand(0, 7);
        while ($num4 == $num3 || $num4 == $num2 || $num4 == $num) {
            $num4 = rand(0, 7);
        }
        $nums = [$num, $num2, $num3, $num4];
        return $nums;
    }

    function getClave() {
        return $this->clave;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    public function __toString() {
        foreach ($this->clave as $valor) {
            echo $valor . "<br>";
        }
    }

}
