<!--
PRÁCTICA 5 AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->
<?php
spl_autoload_register(function($clase) {
    require "$clase.php";
});
//Para evitar warnings indeseados, declaro e inicializo la variable $msj
$msj = "";
//El programa recibe el botón calcular
$botonCalcular = filter_input(INPUT_POST, 'calcular');
//Sólo si el usuario activa el botón, el programa funcionará
if (isset($botonCalcular)) {
    //Si el usuario activa el botón, el programa ejecutará un método que, en función de lo que el usuario introduzca, realizará o no
    //una operación matemática. Ese mismo método mostrará un mensaje, en función de lo que el usuario escriba (en ocasiones será un mensaje
    //de error, en otras el resultado de una operación...)
    $msj = Operacion::calculaYMuestra(trim(filter_input(INPUT_POST, 'operacion')));
    //He añadido trim para sortear posibles espacios en blanco antes y al final de la operación
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            fieldset{
                border: 0.25em solid;
                align : center;
                position: absolute;
                left: 55%;
                top: 20%;
                margin-left: -115px;
                margin-top: -80px;
                padding:10px;
                background-color: #eee;
            }
            fieldset#rtdo{
                border: 0.25em solid;
                position: absolute;
                left: 55%;
                top: 70%;
                padding:10px;
                background-color: #eee;
            }
            fieldset#ayuda{
                width:40%;
                border: 0.25em solid;
                position: absolute;
                left: 10%;
                top: 20%;
                padding:10px;
                background-color: #eee;
            }

            legend{
                font-size: 2em;
                color: green;
                font-weight: bold;
            }
            input[type=submit] {
                padding:5px 15px 10px 10px;
                background:#ccc;
                cursor:pointer;
                -webkit-border-radius: 5px;
                border-radius: 5px;
                margin: 1em;
                font-size: 1em;
            }
            label{
                font-weight: bold;
                font-size : 1.5em;
                margin: 0.65em;

            }
            input[type=text]{
                font-weight: bold;
                font-size : 1.5em;
                padding: 1em 1em 1em 1em;
                margin: 1em 1em 1em 1em;
            }
            fieldset #texhelp{
                font-size : 1.2em;
            }
            span {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <fieldset id="ayuda">
            <legend>Reglas de uso</legend>
            <p id="texthelp">La calculadora se usa escribiendo la operación.
                La operación será <b>Operando_1 operación Operando_2.</b>
                Cada operando puede ser número <b>real o racional</b>.
                <br/>Real p.e. <b>5</b> o <b>5.12</b> Racional p.e <b>6/3</b> o <b>7/1</b>
                <br/>Los operadores reales permitidos son <span>+ - * /</span>
                <br/>Los operadores racionales permitidos son <span>+ - * :</span>
                <br/>No se deben de dejar espacios en blanco entre operandos y operación
                <br/>Si un operando es real y el otro racional se considerará operación racional
                <br/>No se admiten denominadores negativos en operaciones racionales
                <br/>Ejemplo (Real)<b>5.1+4</b> (Racional)<b>5/1:2</b> (Error)<b>5.2+5/1</b> (Error)<b>52214</b></p>
        </fieldset>
        <fieldset>
            <legend>Establece la operación</legend>
            <form action="." method="post">
                <label>Operacion</label><input type="text" name="operacion">
                <input type="submit" value="Calcular"  name="calcular"/>
            </form>
        </fieldset>
        <fieldset id="rtdo">
            <legend>Resultado</legend>
            <?= $msj ?>
        </fieldset>
        <p>Programa desarrollado por Luis Royo Antín 2ºDAW</p>
    </body>
</html>
