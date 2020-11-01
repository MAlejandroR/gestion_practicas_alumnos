<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Defino dos variables con mi nombre y apellidos
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
        // mi nombre es "manolo" y mi apellido es "romero"
//1)con echo pasando varios argumentos (separadados por coma)
//2)con print  
//Explica en el fichero diferencias entre echo y print y semejanzas.
        //Por qué puedo pasar los argumentos sin usar paréntesis

        $nombre = "Javier";
        $apellido = "Magdalena";

        echo "Mi nombre es $nombre" . " y mi apellido es $apellido " . "</br>";
        print"Mi nombre es $nombre" . " y mi apellido es $apellido" . "</br>";

        echo "<hr>";
        /* Sintaxis heredoc, */
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es
// aquí aparecer el contenido del infoorme
// respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)

        $informe = <<<FIN
                <pre>
                    Linea 1
                    Linea 2
                    Linea 3
                    Linea 4
                    Linea 5
                </pre>
FIN;
        echo "El contenido de informe es $informe";

        echo "<hr>";
        /* PROBANDO VARIABLES */
//Crea una variable y asígnale un valor
//visualiza el valor de la variable y el tipo que eś
//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
//Prueba a ver el valor y tipo de una variable no definida previamente
        /* VISUALIZA LAS VARIABLES USANDO LA FUNCION printf */

        $a = 7;
        $b = true;
        $c = 2.78;
        $d = "Hola";
        $e = null;

        echo "el valor es  $a tipo " . gettype($a) . "</br>";
        echo "el valor es  $b tipo " . gettype($b) . "</br>";
        echo "el valor es  $c tipo " . gettype($c) . "</br>";
        echo "el valor es  $d tipo " . gettype($d) . "</br>";
        echo "el valor es  $e tipo " . gettype($e) . "</br>";

        echo "<hr>";
//Visualiza el contenido de la función time() y explica su valor
        $time = time();
        echo "El valor es  $time " . " Devuelve el número de segundos desde 1 de Enero de 1970.</br>";
        echo "<hr>";
//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
        $fecha = new DateTime('now');
        echo "La fecha actual es: " . $fecha->format('d-m-Y') . "</br>";
        echo "<hr>";
////Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear

        $f1 = new DateTime('1970-1-1');
        $f2 = new DateTime('now');
        //calculo la diferencia entre las fechas 
        $diff = date_diff($f1, $f2);
        //guardo la diferencia por meses años y dias
        $m = $diff->m;
        $a = $diff->y;
        $d = $diff->d;
        //muestro los datos:
        echo "han pasado " . $a . " años " . $m . " meses y " . $d . " dias" . "</br>";


        echo "<hr>";
// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
        $hoy = new DateTime('now');
        echo date_format($hoy, 'l, \d\i\a j \d\e F \d\e Y');
        echo "<hr>";
//Asigna a una variable la fecha de tu cumpleaños              
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
        $cumple = new DateTime('1987-09-14');
        $date2 = new DateTime('now');
        $diff = date_diff($cumple, $date2);
        echo "tienes " . $diff->y . " años, " . $diff->m . " meses y " . $diff->d . " dias.";

        echo "<hr>";
//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando
        //tienes 23 años
        // tienes 286 meses
        // tienes 8737 días

        $cumple = new DateTime('1969-10-31');
        $date2 = new DateTime('now');
        //calculo la diferencia entre las fechas 
        $diff = date_diff($cumple, $date2);
        //guardo la diferencia por meses años y dias
        $meses = ($diff->y) * 12 + $diff->m;
        $años = $diff->y;
        $dias = ($meses * 31) + $diff->d;
        //muestro los datos:
        echo "tienes " . $años . " años " . "</br>";
        echo "tienes " . $meses . " meses" . "</br>";
        echo "tienes " . $dias . " dias" . "</br>";
        echo "<hr>";

//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php

        echo strtotime("now"), "<br/>";  //nos muestra la fecha actuar en unix
        echo date('d-m-Y', strtotime("now")), "<br/>"; // la fecha de hoy en formato d m y 
        echo strtotime("27 September 1970"), "<br/>"; //muestra la fecha 27 de sep de 1970 en unix
        echo date('d-m-Y', strtotime("10 September 2000")), "<br/>"; // la fecha del 10 se sep de 200 con formato dmy
        echo strtotime("+1 day"), "<br/>"; // la fecha de mañana en unix 
        echo date('d-m-Y', strtotime("+1 day")), "<br/>"; // la fecha del 10 
        echo strtotime("+1 week"), "<br/>"; // la fecha de la semana que viene en unix  
        echo date('d-m-Y', strtotime("+1 week")), "<br/>";//la fecha de la semana que viene en en formato dmy
        echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>"; //la fecha en unix de dentro de una semana dos dias 4 horas y 2 segundos
        echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>"; // lo mismo que arriba pero con formato dmy
        echo strtotime("next Thursday"), "<br/>"; // la fecha en unix de dentro de un jueves 
        echo date('d-m-Y', strtotime("next Thursday")), "<br/>"; // la fecha del proximo jueves en dmy
        echo strtotime("last Monday"), "<br/>"; // la fecha del proximo lunes en unix
        echo date('d-m-Y', strtotime("last Monday")), "<br/>"; // la fecha del proximo lunes en dmy
        echo "<hr>"
        ?>
    </body>
</html>
