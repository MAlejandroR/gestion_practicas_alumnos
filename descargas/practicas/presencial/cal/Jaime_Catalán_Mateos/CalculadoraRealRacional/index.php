<?php

include_once 'Operacion.php';
include_once 'OperacionReal.php';
include_once 'OperacionRacional.php';

function procesarOperacion($operacion)
{
    $entero = '[0-9]+';
    $racional = '[0-9]+\/[1-9][0-9]*';
    $operandos_racional = '[+:*-]';
    $real = '[0-9]+(\.[0-9]+)?';
    $operandos_real = '[+\/\*-]';
    $operadorToOperacion = array(
        '+' => 'sumar',
        '-' => 'restar',
        '*' => 'multiplicar',
        ':' => 'dividir',
        '/' => 'dividir',
    );

    if (preg_match("/^".$racional.$operandos_racional.$racional."$/", $operacion)) {//Si la expresion coincide con la ER es racional y..
        $operandos = preg_split('/'.$operandos_racional.'/', $operacion);//recupero el operador para saber que tipo de operacion es
        preg_match("/".$operandos_racional."/", $operacion, $operador);//recupero el operando
        $result = array(
            'ok' => true,
            'tipo' => 'racional',
            'operando1' => $operandos[0],
            'operando2' => $operandos[1],
            'operador' => $operador[0],
            'operacion' => $operadorToOperacion[$operador[0]]
        );
    } elseif (preg_match("/^".$entero.$operandos_racional.$racional."$/", $operacion)) {//si la expresion coincide con la ER es real y..
        $operandos = preg_split('/'.$operandos_racional.'/', $operacion);//recupero el operador para saber que tipo de operacion es
        preg_match("/".$operandos_racional."/", $operacion, $operador);//recupero el operando
        $result = array(
            'ok' => true,
            'tipo' => 'racional',
            'operando1' => $operandos[0] . '/1',//añadimos partido 1 para poder realizar la operacion correctamente
            'operando2' => $operandos[1],
            'operador' => $operador[0],
            'operacion' => $operadorToOperacion[$operador[0]]
        );
    } elseif (preg_match("/^".$racional.$operandos_racional.$entero."$/", $operacion)) {//si la expresion coincide con la ER es real y..
        $operandos = preg_split('/'.$operandos_racional.'/', $operacion);//recupero el operador para saber que tipo de operacion es
        preg_match("/".$operandos_racional."/", $operacion, $operador);//recupero el operando
        $result = array(
            'ok' => true,
            'tipo' => 'racional',
            'operando1' => $operandos[0],
            'operando2' => $operandos[1] . '/1',//añadimos partido 1 para poder realizar la operacion correctamente
            'operador' => $operador[0],
            'operacion' => $operadorToOperacion[$operador[0]]
        );
    } elseif (preg_match("/^".$real.$operandos_real.$real."$/", $operacion)) {//si la expresion coincide con la ER es real y..
        $operandos = preg_split('/'.$operandos_real.'/', $operacion);//recupero el operador para saber que tipo de operacion es
        preg_match("/".$operandos_real."/", $operacion, $operador);//recupero el operando
        $result = array(
            'ok' => true,
            'tipo' => 'real',
            'operando1' => $operandos[0],
            'operando2' => $operandos[1],
            'operador' => $operador[0],
            'operacion' => $operadorToOperacion[$operador[0]]
        );
    } else {
        $result = array(
            'ok' => false
        );
    }

    return $result;
}

if (!empty($_POST)) {
    $procesamiento = procesarOperacion($_POST['operacion']);

    if ($procesamiento['ok']) {
        if ($procesamiento['tipo'] == 'real') {
            $operacion = new OperacionReal($procesamiento['operando1'], $procesamiento['operando2']);
            $operando1_nice = $procesamiento['operando1'];
            $operando2_nice = $procesamiento['operando2'];
        } else {
            $operando1_array = explode('/', $procesamiento['operando1']);
            $operando2_array = explode('/', $procesamiento['operando2']);
            $operando1 = new Racional($operando1_array[0], $operando1_array[1]);
            $operando2 = new Racional($operando2_array[0], $operando2_array[1]);
            $operando1_nice = $operando1->toString();
            $operando2_nice = $operando2->toString();
            $operacion = new OperacionRacional($operando1, $operando2);
        }

        switch ($procesamiento['operacion']) {
            case 'sumar':
                $resultado = $operacion->sumar();
                break;
            case 'restar':
                $resultado = $operacion->restar();
                break;
            case 'multiplicar':
                $resultado = $operacion->multiplicar();
                break;
            case 'dividir':
                $resultado = $operacion->dividir();
                break;
        }
    }
}

require 'vista.phtml';