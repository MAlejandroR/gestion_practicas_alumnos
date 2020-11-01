<?php
function checkrep($contactos, $nombre) {

    foreach ($contactos as $value) {

        if ($value == $nombre) {
            echo "esta";
            return true;
        }
        echo "no esta";
    }
    //return false;
}

//advertencia nombre o numero
function check($valor) {
    // empty($valor) ? true : false;//no funciona
    if (empty($valor)) { //empty solo me devuelve 1..si no es empty no me devuelve 0 //fuerzo en funcion
        return 1;
    }
    return 0; // valido
}

//advertencia numero no valido
function checknum($num) {
    //return is_numeric($num) ? true : false;//no funciona
    if (is_numeric($num)) {
        return 1; // valido
    }
    return 0;
}

//eliminar si no hay nombre
function eliminar($valor) {
    foreach ($contactos as $valor) {
        //eliminar sin nombre
        if ($valor == '') {
            unset($valor);
        }
    }
}

//eliminar todos
if ($_POST["del"]) {
    $datos = '';
    $visible = "disabled"; //estado boton eliminar
}
