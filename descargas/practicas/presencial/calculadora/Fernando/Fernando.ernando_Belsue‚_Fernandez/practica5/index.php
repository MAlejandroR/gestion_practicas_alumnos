<?php

    spl_autoload_register(function($clase) {
            include "$clase.php";
    });
    
    $array = [];
        
    $input = filter_input(INPUT_POST, 'valores');    

    $envio = filter_input(INPUT_POST, 'submit');
    if (isset($envio)) {
        if (!empty($input)) {
            $operacion = Operacion::obtenerTipo($input);
            if ( $operacion == null ) {
                $error = "Los datos introducidos son incorrectos";
            } else {
                //var_dump($operacion->resolver());
                $resultado = $operacion->resolver();
                $array = [
                    'Concepto' => 'Valores',
                    'Operando 1' => $operacion->getOperando1(),
                    'Operando 2' => $operacion->getOperando2(),
                    'Operador' => $operacion->getTipo(),
                    'Resultado' => $resultado
                ];
            }
            
        }else{
            $error = "Introduce los datos para operar";
        }
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora</title>
        <link rel="stylesheet" href="estilos.css"/>
    </head>
    <body>
        <div id="contenedor">
            <fieldset id="reglas">
                <legend>Reglas de uso de la calculadora</legend>
                <div>
                    <p>La calculadora se usa escribiendo la operación.</p>
                    <p>La operación será <strong>Operando_1 operación Operando_2</strong>.</p>
                    <p>Cada operando puede ser número <strong>real o racional.</strong></p>
                    <p>Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></p>
                    <p>Los operadores reales permitidos son <strong><font size='5' color='red'> + - * /</font></strong></p>
                    <p>Los operadores racionales permitidos son <strong><font size='5' color='red'> + - * :</font> </strong></p>
                    <p>No se deben de dejar espacios en blanco entre operandos y operación</p>
                    <p>Si un operando es real y el otro racional se considerará operación racional</p>
                    <p>Ejemplo (Real)<strong>5.1+4</strong> (Racional)<strong>5/1:2</strong> (Error)<strong>5.2+5/1</strong> (Error)<strong>52214+</strong></p>
                </div>
            </fieldset>
            <fieldset id="operacion">
                <legend>Establece la operación</legend>
                <form action="index.php" method="POST">
                    Operación<input type="text" name="valores" value=""/>
                    <input type="submit" name="submit" value="Calcula"/>
                </form>
                <?php if (isset($error)) : ?>
                    <!--Si al darle al botón de operar no ha introducido datos, muestro mensaje de error-->
                    <p id="error"><?php echo $error ?></p>
                <?php endif; ?>
                    <table>
                        <?php foreach ($array as $key => $value):?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $value ?></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
            </fieldset>
        </div>
    </body>
</html>
