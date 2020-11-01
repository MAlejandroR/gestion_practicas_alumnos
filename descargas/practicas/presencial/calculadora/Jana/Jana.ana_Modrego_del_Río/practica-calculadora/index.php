<?php
// Cargo las clases necesarias
spl_autoload_register(function($clase) {
    require "$clase.php";
});

// Muestro los errores
function show() {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

show();

// Declaro las variables que voy a necesitar
$rtdo = "";// resultado de la operación
$info ="";// tabla html que muestra el resultado
$operando1 = "";
$operando2 = "";
$operador = "";
$operacion="";
$msj = "";
if (isset($_POST['submit'])) {
// Leo los datos de la caja de texto y determino si es una operación real o racional
$operacion = filter_input(INPUT_POST, 'operacion'); 
$valida = Operacion::validaOperacion($operacion);
    switch ($valida) {
        case 1:
            // Es una operación real
            $opReal = new OperacionReal($operacion);
            $rtdo = $opReal->resolver();
            $info = $opReal->mostrar();          
            break;
        case 2:
            // Es una operación racional
            $opRacional = new OperacionRacional($operacion);
            $rtdo = $opRacional->resolver();
            $info= $opRacional->mostrar();  
            $simplificado = $opRacional->simplifica();
            break;
        default:
            $msj = "<h2>La operación $operacion no es una operación válida</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel=StyleSheet href="estilo.css" type="text/css">
        <title>Calculadora</title>
    </head>
    <body>
        <div id="contenedor">
            <fieldset id="ayuda">
                <legend>Reglas de uso de la calculadora</legend>
                    <div id="texhelp"> La calculadora se usa escribiendo la operación.</div>
                    <div id="texhelp"> La  operación será <strong>Operando_1 operación Operando_2</strong>.</div>
                    <div id="texhelp"> Cada operando puede ser número <strong>real  o racional.</strong></div>
                    <div id="texhelp"> Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></div>
                    <div id="texhelp"> Los operadores reales permitidos son <strong><font size='5' color='red'> +  -  *  /</font></strong></div>
                    <div id="texhelp"> Los operadores racionales permitidos son <strong><font size='5' color='red'> +  -  *  :</font> </strong></div>
                    <div id="texhelp"> No se deben de dejar espacios en blanco entre operandos y operación</div>
                    <div id="texhelp"> Si un operando es real y el otro racional se considerará operación racional</label></div>
                    <div id="texhelp"> Ejemplo (Real)<strong>5.1+4</strong>  (Racional)<strong>5/1:2</strong>  (Error)<strong>5.2+5/1</strong> (Error)<strong>52214+</strong> </label></div>
            </fieldset>
            <fieldset>
                <legend>Establece la operación</legend>
                    <form action="." method="post">
                    <label for="operacion">Operacion</label>
                        <input type="text" name="operacion" id="input" value="<?=$operacion?>">
                        <input type="submit" name="submit" value="Calcular">
                    </form>
            </fieldset>
            <?=$info?>
            <div class="clear"style="clear: both;"></div>
            <?=$msj?>
        </div>
    </body>
</html>
