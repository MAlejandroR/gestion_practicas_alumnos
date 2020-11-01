<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego</title>
        <style type="text/css">
            body {
                color: purple;
                background-color: #FFD033; 
                border: 1px solid #000000;
                padding: 40px 40px 40px 40px;
            }
        </style>
    </head>
    <body>
        <?php
        if (!is_null(filter_input(INPUT_POST, 'empezar'))) {
            if (!is_null(filter_input(INPUT_POST, 'intervalo'))) {
                $intervalo = filter_input(INPUT_POST, 'intervalo');
                if ($intervalo === "1024") {
                    $limite = 10;
                } elseif ($intervalo === "65536") {
                    $limite = 16;
                } else {
                    $limite = 20;
                }
                $sup = doubleval($intervalo);
                $inf = 1;
                $jugada = 0;
            } else {
                $intervalo = "";
            }
        }
        if (!is_null(filter_input(INPUT_POST, 'jugar'))) {
            $sup = filter_input(INPUT_POST, 'sup');
            $inf = filter_input(INPUT_POST, 'inf');
            $numero = filter_input(INPUT_POST, 'numero');
            $jugada = filter_input(INPUT_POST, 'jugada');
            $intervalo = filter_input(INPUT_POST, 'intervalo');
            $limite = filter_input(INPUT_POST, 'limite');

            if (!is_null(filter_input(INPUT_POST, 'selec'))) {
                $selec = filter_input(INPUT_POST, 'selec');
                $acertado = false;
                $seleccion = true;
                if ($selec === "mayor") {
                    $inf = $numero;
                } elseif ($selec === "menor") {
                    $sup = $numero;
                } else {
                    $acertado = true;
                }
            } else {
                $seleccion = false;
            }
        }


        if (!is_null(filter_input(INPUT_POST, 'reiniciar'))) {
            $intervalo = filter_input(INPUT_POST, 'intervalo');
            $limite = filter_input(INPUT_POST, 'limite');
            $sup = doubleval($intervalo);
            $inf = 1;
            $jugada = 0;
        }

        if (!is_null(filter_input(INPUT_POST, 'volver'))) {
            $intervalo = "";
            
        }
        echo"<legend> Empieza el juego</legend>";

        function calcular($sup, $inf, $jugada) {            
            global $numero, $jugada;
            $numero = round((($sup - $inf) / 2) + $inf);
            $jugada++;
        }

        if ($intervalo === "") {
            echo '<h1>Debe seleccionar un intervalo</h1>';
            echo '<h1>Pulse un botón</h1>';
        } elseif (($jugada > 0) && ((!$seleccion) || ($acertado) )) {
            if (!$seleccion) {
                echo '<h1>Debe seleccionar un opción</h1>';
            } else {
                echo '<h1>Ha acertado. Pulse cualquier botón</h1>';
            }
        } else {
            if (($jugada > 0) && ($jugada === $limite)) {
                echo '<h1>Ha sobrepasado el límite. Pulse cualquier botón</h1>';
            } else {
                calcular($sup, $inf, $jugada);
                echo"<h1>El número es " . $numero . " ?</h1>";
                echo"<h2>Jugada " . $jugada . "</h2>";
            }
        }
        ?>

        <form <?php 
        if ($intervalo==""){
            echo 'action="index.php"';
        } else {
            if($acertado||($jugada === $limite)) {
             echo 'action="fin.php"';
        } else {
             echo 'action="jugar.php"';
        }   
        }      
         ?>
            method="post">
            <fieldset>
                <legend> Indica como es el número que has pensado</legend>
            <input type="radio" name="selec" value="mayor"> Mayor<br>
            <input type="radio" name="selec"  value="menor"> Menor<br>
            <input type="radio" name="selec" value="igual"> Igual<br><br>
            </fieldset>
            <input type="hidden" name="numero" value="<?php echo $numero; ?>"> 
            <input type="hidden" name="inf" value="<?php echo $inf; ?>">
            <input type="hidden" name="sup" value="<?php echo $sup; ?>">
            <input type="hidden" name="jugada" value="<?php echo $jugada; ?>">
            <input type="hidden" name="intervalo" value="<?php echo $intervalo; ?>">
            <input type="hidden" name="limite" value="<?php echo $limite; ?>">
            <input type="hidden" name="acertado" value="<?php echo $acertado; ?>">
            <input type="submit" name= 'jugar' value="Jugar">        
            <input type="submit" name= "reiniciar" value="Reiniciar">
            <input type="submit" name= "volver" value="Volver">
        </form>

    </body>
</html>        