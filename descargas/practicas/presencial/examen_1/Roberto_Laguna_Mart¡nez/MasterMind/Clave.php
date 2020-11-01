<?php


class Clave {

    
    private $clave = [];

    public function __construct() {  
        $colores = ['azul', 'rojo', 'naranja', 'verde', 'violeta', 'amarillo', 'marrón', 'rosa'];
        $posiciones = array_rand($colores,4);//genero un array con los índices del array colores
        for ($i = 0; $i < 4; $i++) {//con un for lo recorro y asigno al array de la clave sus valores
            $clave[$i] = $colores[$posiciones[$i]];
        }        
        $this->clave = $clave;
    }

    public function __toString() {
        foreach ($this->clave as $color) {
            $txt .= "$color-";
        }
        $txt = substr($txt, 0, strlen($txt) - 1);
        return $txt;
    }

}
