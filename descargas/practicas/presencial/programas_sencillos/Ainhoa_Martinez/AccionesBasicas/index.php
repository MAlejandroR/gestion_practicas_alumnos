<?php
//Variables
//Defino dos variables con mi nombre y apellidos
$nombre = "Ainhoa";
$apellidos = " Martinez Lopez";
//Sintaxis heredoc
//Asigna a una variable llamada informe un texto de cinco líneas
$informe = <<<FIN
        <pre>El contenido de \$informe es = En términos generales, un informe
             es un texto que da cuenta del estado actual o de los resultados
             de un estudio o investigación sobre un asunto específico.
             En cualquier caso siempre es necesario preparar todo el material.
             El informe contiene datos en pasado o en futuro ya comprobados.
        </pre>
FIN;
//Probando variables
//Crea una variable y asígnale un valor
$varNueva = "hola";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Acciones básicas</title>
        <link rel="stylesheet" href="estilos.css" type="text/css">
    </head>
    <body>
        <fieldset>
        <h1>Probando instrucciones de php</h1>
        <hr />
        <?php
        /* Variables */
        echo "<h4>Muestro las variables \$nombre y \$apellidos con echo y print</h4>";
        echo "Con echo = Mi nombre es \"$nombre\" y mis apellidos son \"$apellidos\" <br />";
        print "Con print = Mi nombre es \"" . $nombre . "\" y mis apellidos son \"" . $apellidos . "\"<br />";

        echo "Con echo = Mis datos son =  $nombre", "$apellidos <br />";
        print "Con print = Mis datos son =  $nombre" . "$apellidos <br />";
        echo "<hr />";

        /* Sintaxis heredoc */
        echo "<h4>Utilizando la sintaxis heredoc</h4>";
        echo $informe;
        echo "<hr />";

        /* PROBANDO VARIABLES */
        echo "<h4>Se crea y se muestra una variable</h4>";
        //visualiza el valor de la variable y el tipo que eś
        echo "El valor de \$varNueva es= $varNueva <br />";
        echo "El tipo de \$varNueva es= " . gettype($varNueva) . "<br />";

        //Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
        echo "<h4>Cambiamos los tipos de la variable</h4>";
        $varNueva = true;
        echo "Se cambia a true. El valor de \$varNueva es= $varNueva <br />";
        $varNueva = 1.4;
        echo "Se cambia a float. El valor de \$varNueva es= $varNueva <br />";
        $varNueva = "Adios";
        echo "Se cambia a String. El valor de \$varNueva es= $varNueva <br />";
        $varNueva = null;
        echo "Se cambia a null. El valor de \$varNueva es= $varNueva <br />";

        echo "<h4>Prueba a ver el valor y tipo de una variable no definida previamente</h4>";
        //Prueba a ver el valor y tipo de una variable no definida previamente
        echo "Valor de \$variable $variable <br />";
        echo "Tipo de valor de \$variable =" . gettype($variable) . "<br />";

        settype($variable, boolean);
        echo "Valor de \$variable $variable <br />";
        echo "Tipo de valor de \$variable =" . gettype($variable) . "<br />";

        /* VISUALIZA LAS VARIABLES USANDO LA FUNCION printf */
        echo "<h4>Visualizo con printf</h4>";
        printf("Valor de \$variable $variable <br />");
        printf("Tipo de valor de \$variable =" . gettype($variable) . "<br />");

        settype($variable, boolean);
        printf("Valor de \$variable $variable <br />");
        printf("Tipo de valor de \$variable =" . gettype($variable) . "<br />");
        echo "<hr />";
        
        /* Fechas y tiempo */
        echo "<h3>time()</h3>";
        //Visualiza el contenido de la función time() y explica su valor;
        $tiempo = time();
        echo "Visualizo contenido de la función time() = $tiempo <br />";
        /**
         * time() es una función que devuelve en segundos el tiempo transcurrido desde 
         * la época Unix (1/1/1970 00:00:00 GMT).
         */
        echo "<h3>Fecha actual y visualizamos valor</h3>";
        // Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
        $t = date("d/m/y", $tiempo);
        echo "La fecha actual es: $t <br />";

        echo "<h3>Obtener dias, meses y años desde 1/1/1970</h3>";
        // Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
        $fecha1 = date_create_from_format("d/m/Y", "1/1/1970");
        $fecha2 = date_create();

        $inter = date_diff($fecha1, $fecha2);

        echo "<h3>Fecha actual con formato</h3>";
        // Obtén la fecha actual con formato por ejemplo
        // Lunes, día 25 de enero de 2013
        setlocale(LC_TIME, 'es_ES.UTF-8');
        echo "Muestro la fecha actual con formato = " . strftime("%A, dia %d de %B de %Y", $tiempo) . "<br/>";

        echo "<h3>Fecha cumpleaños</h3>";
        // Asigna a una variable la fecha de tu cumpleaños
        // Realiza una operación y obtén tu edad en años, meses y días (valor entero).
        // tienes 23 años, 10 meses y 4 días

        $miCumple = "09/04/1991";

        //Muestro los datos
        echo "Hoy es =" . date("d/m/Y") . "<br />";
        echo "Mi cumpleaños es = $miCumple <br />";

        $cumple = date_create_from_format("d/m/Y", $miCumple);
        $hoy = date_create();

        $interval = date_diff($cumple, $hoy);
        echo $interval->format("Tengo  %Y Años, %M Meses, %d Dias <br />");

        echo "<h3>Fecha 30/10/1969</h3>";
        //Asigna a una variable una fecha de 30/10/1969
        $f1 = date_create_from_format("d/m/Y", "30/10/1969");
        $f2 = date_create();

        echo "Hoy es =" . date_format($f2, "d/m/Y") . "<br />";
        echo "La fecha es =" . date_format($f1, "d/m/Y") . "<br />";

        $interval1 = date_diff($f1, $f2);
        echo $interval1->format("Tienes  %Y Años<br />");

        echo "<h3>getdate()</h3>";
        //Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
        $recogeFecha = getdate();
        print_r($recogeFecha);

        echo "<br />";
        //Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
        print_r(getdate(1));
        /**
         * 
         * Se crea un array con 0 milisegundos desde la epoca Unix (1/1/1970 00:00:00 GMT).
         */
        echo "<h3>Obtener edad de persona nacida antes del 1/1/1969</h3>";
        //Obtener la edad de una persona nacida el 1/1/1969
        $f3 = date_create_from_format("d/m/Y", "1/1/1969");
        $f4 = date_create();

        echo "Hoy es =" . date_format($f4, "d/m/Y") . "<br />";
        echo "La fecha nacimiento es =" . date_format($f3, "d/m/Y") . "<br />";

        $interval3 = date_diff($f3, $f4);
        echo $interval3->format("La edad es de  %Y Años<br />");
        
        
//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        echo "<hr>";
        echo strtotime("now"), "<br/>";
        echo date('d-m-Y', strtotime("now")), "<br/>";
        echo strtotime("27 September 1970"), "<br/>";
        echo date('d-m-Y', strtotime("10 September 2000")), "<br/>";
        echo strtotime("+1 day"), "<br/>";
        echo date('d-m-Y', strtotime("+1 day")), "<br/>";
        echo strtotime("+1 week"), "<br/>";
        echo date('d-m-Y', strtotime("+1 week")), "<br/>";
        echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
        echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
        echo strtotime("next Thursday"), "<br/>";
        echo date('d-m-Y', strtotime("next Thursday")), "<br/>";
        echo strtotime("last Monday"), "<br/>";
        echo date('d-m-Y', strtotime("last Monday")), "<br/>";
        echo "<hr>"
        ?>
        </fieldset>
    </body>
</html>