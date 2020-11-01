<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

spl_autoload_register(function ($clase){
    require ("$clase.php");
});
$msj="";
$tabla="hidden";

function mostrar_errores(){
    error_reporting(E_ALL);
    ini_set("display_errors",1);
}
mostrar_errores();


if (isset($_POST['enviar'])) {
   $op = filter_input(INPUT_POST, 'operacion');
   $tabla = "";
   switch (Operacion::comprobar($op)){
       case Operacion::ERROR:
           $msj = "<h1>Operacion no valida<h1>";
           break;
       case Operacion::REAL:
           $msj = new OperacionReal($op);
           break;
       case Operacion::RACIONAL:
           $msj = new OperacionRacional($op);
           break;
   }
}
   
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>
    <body>
        <fieldset id="ayuda">
            <legend>Reglas de uso de la calculadora</legend>
            <div id=texhelp> La calculadora se usa escribiendo la operación.</div>
            <div id=texhelp> La  operación será <strong>Operando_1 operación Operando_2</strong>.</div>
            <div id=texhelp> Cada operando puede ser número <strong>real  o racional.</strong></div>
            <div id=texhelp> Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></div>
            <div id=texhelp> Los operadores reales permitidos son <strong><font size='5' color='red'> +  -  *  /</font></strong></div>
            <div id=texhelp> Los operadores racionales permitidos son <strong><font size='5' color='red'> +  -  *  :</font> </strong></div>
            <div id=texhelp> No se deben de dejar espacios en blanco entre operandos y operación</div>
            <div id=texhelp> Si un operando es real y el otro racional se considerará operación racional</label></div>
            <div id=texhelp> Ejemplo (Real)<strong>5.1+4</strong>  (Racional)<strong>5/1:2</strong>  (Error)<strong>5.2+5/1</strong> (Error)<strong>52214+</strong> </label></div>
            

        </fieldset>
                
                    <fieldset id="rtdo" <?=$tabla?>><?=$msj?></fieldset>
                    <fieldset>
            <legend>Establece la operación</legend>
            <form action="." method="POST">
                <label for="operacion">Operacion</label>
                <input type="text" name="operacion">
                <input type="submit" name="enviar" value="Calcular">
            </form>
        </fieldset>
    </body>
</html>