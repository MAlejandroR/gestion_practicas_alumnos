<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Empieza el juego</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <h1>Empieza el juego</h1>
        <?php
        $max = filter_input(INPUT_POST, 'maximo');
        $cont = filter_input(INPUT_POST, 'contador');
        $aux = filter_input(INPUT_POST, 'auxiliar');
        $dato = filter_input(INPUT_POST, 'acierto');
        $opcion = filter_input(INPUT_POST, 'opcion');

        if ($cont == 0) {
            $aux = $max / 2;
            $opcion = $max;
            $max = $aux;
            $cont++;
        } else {

            if (isset($_POST["acierto"])) {
                $aux = $aux / 2;
                if ($dato === "menor") {
                    $max -= $aux;
                    $cont++;
                } else if ($dato === "mayor") {
                    $max += $aux;
                    $cont++;
                } else {
                    echo "¡¡BIEN!! ¡Es el número que estaba pensando! $max";
                }
            }
        }

        if ($opcion == 1024) {
            if ($cont > 10) {
                echo "Te has equivocado en algún número";
            }
        }

        if ($opcion == 65536) {
            if ($cont > 16) {
                echo "Te has equivocado en algún número";
            }
        }

        if ($opcion == 1048576) {
            if ($cont > 20) {
                echo "Te has equivocado en algún número";
            }
        }

        echo "<h1>¿El número que piensas es $max?</h1>";
        echo "<h2>Ronda $cont</h2>";
        ?>
        
        
            Indica cómo es el número que has pensado
            <form name="jugar" action="jugar.php?" method="POST">
                <input type="hidden" name="maximo" value= <?php echo $max ?> />
                <input type="hidden" name="auxiliar" value= <?php echo $aux ?> />
                <input type="hidden" name="contador" value= <?php echo $cont ?> />
                <input type="hidden" name="opcion" value= <?php echo $opcion ?> />
                <input type="radio" name="acierto" value="mayor" id="mayor" checked> Mayor <br />
                <input type="radio" name="acierto" value="menor" id="menor"> Menor <br />
                <input type="radio" name="acierto" value="igual" id="igual"> Igual <br />
                <hr>
                <!--<input name="contador" type="hidden" value="<?= $cont ?>" />-->
                <input type="submit" name="jugar" value="Jugar" >
                <input type="reset" name="submit" value="Reset" >
                <input type="reset" name="volver" value="Volver" onclick="location.replace('index.php');" >
            </form>
    </body>
</html>   
