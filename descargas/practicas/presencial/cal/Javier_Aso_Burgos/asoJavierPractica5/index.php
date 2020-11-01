<?php
spl_autoload_register(function($clase) {
    require "$clase.php";
});

$operacion = "";

if (!empty(filter_input(0, "enviar"))) {
    $operacion = Operacion::generaOperacion(trim(filter_input(0, "operacion"))); //Llamo al método estático generaOperacion de la clase Operacion y recojo el resultado.
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body><!--Si se ha tenido que simplificar el resultado, muestro el mcd en un h3-->
        <?= is_a($operacion, "OperacionRacional") && $operacion->getMcd() != 1 ? "<h3>Se ha simplificado el resultado. El mcd es: " . $operacion->getMcd() . "</h3>" : "" ?>
        <fieldset id="ayuda">
            <legend>Reglas de uso de la calculadora</legend>
            <div id=texhelp> La calculadora se usa escribiendo la operación.</div>
            <div id=texhelp> La  operación será <strong>Operando_1 operación Operando_2</strong>.</div>
            <div id=texhelp> Cada operando puede ser número <strong>real  o racional.</strong></div>
            <div id=texhelp> Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></div>
            <div id=texhelp> Los operadores reales permitidos son <strong><font size='5' color='red'> +  -  *  /</font></strong></div>
            <div id=texhelp> Los operadores racionales permitidos son <strong><font size='5' color='red'> +  -  *  :</font> </strong></div>
            <div id=texhelp> No se deben de dejar espacios en blanco entre operandos y operación</div>
            <div id=texhelp> Si un operando es real y el otro racional se considerará operación racional</div>
            <div id=texhelp> Ejemplo (Real)<strong>5.1+4</strong>  (Racional)<strong>5/1:2</strong>  (Error)<strong>5.2+5/1</strong> (Error)<strong>52214+</strong></div>
        </fieldset>
        <?= $operacion ?>
        <fieldset>
            <legend>Establece la operación</legend>
            <form action="index.php" method="post">
                <label for="operacion">Operacion</label>
                <input type="text" name="operacion">
                <input type="submit" name="enviar" value="Calcular">
                <label><br/><?= is_a($operacion, "Operacion") ? $operacion->getCadenaResultado() : "" ?><br /></label>
            </form>
        </fieldset>
    </body>
</html>
