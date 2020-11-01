<?php

function __autoload($class) {
    require_once( $class . ".php");
}

$c = new Clave();
$colores = ["marron", "verde", "rojo", "violeta"];
$j = new Jugada($c, $colores);

var_dump($j);
