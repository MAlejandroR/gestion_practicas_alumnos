<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 2 PHP. Luis Royo Antín 2ºDAW</title>
    </head>
    <body>
        <?php
        echo "<h1>Práctica 2 PHP</h1><h3>Luis Royo Antín 2ºDAW</h3><br/>";
//Defino dos variables con mi nombre y apellidos
        $nombre = "Luis";
        $apellido = "Royo";
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "Manuel" y mi apellido es "Romero"
//1)con echo pasando varios argumentos (separadados por coma)
        echo "1.Mi nombre es \"", $nombre, "\" y mi apellido es \"", $apellido, "\"<br/>";
//2)con print
        print "2. Mi nombre es \"$nombre\" y mi apellido es \"$apellido\"<br/><br/>";
//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.
        echo "3, 4 y 5.Print muestra una única cadena. Por tanto, no es posible pasarle comas. "
        . "En cambio echo puede imprimir varias cadenas y por eso podemos utilizar comas o concatenar "
        . "con puntos. Ambos son constructores de lenguaje, y sirven para imprimir argumentos."
        . "Sin embargo, print devuelve siempre 1 y echo no devuelve ningún tipo de valor.<br/><br/>";
//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
        echo "6. Podemos pasar los argumentos sin utilizar paréntesis porque ni echo, "
        . "ni print son funciones. Son constructores de lenguaje."
        . "No obstante, print sí funcionaría con paréntesis porque, a pesar de ser "
        . "un constructor del lenguaje PHP, tiene comportamientos de función.<br/><br/>";
        /* 7) Sintaxis heredoc, */
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es:
//   ........
// aquí aparecer el contenido del informe
// debe de respetarse el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
        $informe = <<<FIN
                <pre>
                Este es un informe de ejemplo
                de tan sólo cinco líneas
                para la práctica número dos
                de PHP. En concreto, de la asignatura
                Entorno Servidor.
                </pre>
FIN;
        echo "7. El contenido de \$informe es: <br/> $informe";

        /* PROBANDO VARIABLES (del 8 al 19) */
//Crea una variable y asígnale un valor
        $variable = "hola";
//visualiza el valor de la variable y el tipo que eś
        echo "8 y 9.La variable \$variable=\"hola\" es " . gettype($variable) . " y su valor es '$variable'.<br/>";
//Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo
        $variable = true;
        echo "10 y 11.La variable \$variable=\"true\" es " . gettype($variable) . " y su valor es '$variable'.<br/>";
        $variable = 5.4;
        echo "12 y 13.La variable \$variable=\"5.4\" es " . gettype($variable) . " y su valor es '$variable'.<br/>";
        $variable = "hola de nuevo";
        echo "14 y 15. La variable \$variable=\"hola de nuevo\" es " . gettype($variable) . " y su valor es '$variable'.<br/>";
        $variable = null;
        echo "16 y 17. La variable '\$variable=\"null\" es " . gettype($variable) . " y su valor es '$variable'.<br/>";
//Prueba a ver el valor y tipo de una variable no definida previamente
        echo "18 y 19. La variable no definida previamente '\$variable2' es " . gettype($variable2) . " y su valor es '$variable2'.<br/><br/>";

        /* 20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() .. */
        echo "20. Listado ASCII:<br/>";
        for ($i = 64; $i < 123; $i++) {
            echo "*$i=";
            printf("%.1c", $i);
            echo ", ";
        }
        echo "<br/><br/>";
//21)Visualiza el contenido de la función time() y explica su valor
        echo "21. " . time() . "<br/>Este valor de la función time es el número de segundos "
        . "transcurridos desde el 1 de enero de 1970 (fecha UNIX) hasta este preciso momento.<br/><br/>";
//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello
        $fechaActual = date("d-m-y", time());
        echo "22. Fecha actual " . $fechaActual . "<br/><br/>";
//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear
        echo "23. Días transcurridos desde UNIX: " . round(((time() / 60) / 60) / 24) . " días<br/>";
        echo "24. Horas transcurridas desde UNIX: " . round((time() / 60) / 60) . " horas<br/>";
        echo "25. Minutos transcurridos desde UNIX: " . round(time() / 60) . " minutos<br/><br/>";
////Usando la función setlocale(...) y strftime(...)
//Puede ser que tengas que habilitar el idioma en el sistema con locale-gen
//26)  Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $diaActual = strftime("%A");
        $diaNumActual = strftime("%e");
        $mesActual = strftime("%B");
        $anioActual = strftime("%Y");
        echo "26. Fecha actual con formato en español: " . $diaActual . ", " . $diaNumActual . " de " . $mesActual . " de " . $anioActual . "<br/><br/>";
//27)  Ahora con formato en inglés  Sunday, 28 October 2018
        setlocale(LC_TIME, 'en_US.UTF-8');
        $diaActual = strftime("%A");
        $diaNumActual = strftime("%e");
        $mesActual = strftime("%B");
        $anioActual = strftime("%Y");
        echo "27. Fecha actual con formato en inglés: " . $diaActual . " " . $diaNumActual . ", " . $mesActual . " " . $anioActual . "<br/><br/>";
//28) y con formato en francés  dimanche, 28 octobre 2018
        setlocale(LC_TIME, 'fr_FR');
        $diaActual = strftime("%A");
        $diaNumActual = strftime("%e");
        $mesActual = strftime("%B");
        $anioActual = strftime("%Y");
        echo "28. Fecha actual con formato en francés: " . $diaActual . " " . $diaNumActual . ", " . $mesActual . " " . $anioActual . "<br/><br/>";
// 29-30)Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
        $diferencia = time() - strtotime("28-12-1987");
        $anios = ((date("Y", $diferencia)) - 1970);
        $fecha = strtotime("28-12-1987");
        $anioActual = date("y", time());
        $mesActual = date("m", time());
        $mesFecha = date("m", $fecha);
        $diaActual = date("d", time());
        $diaFecha = date("d", $fecha);
        $fechaEspecial = mktime(0, 0, 0, date("m", $fecha), date("d", $fecha), date("Y", time()));
        $fechaMesPasado = strtotime('-1 month', strtotime(date('d-m-Y', $fechaEspecial)));
        if ($mesFecha == $mesActual) {
            if ($diaFecha < $diaActual) {
                $meses = 0;
            } else {
                $meses = $mesActual + 1;
            }
        } else {
            if ($mesFecha < $mesActual) {
                if ($diaFecha < $diaActual) {
                    $meses = (($mesActual - 1) - $mesFecha) + 1;
                } else {
                    $meses = ($mesActual - 1) - $mesFecha;
                }
            } else {
                if ($diaFecha < $diaActual) {
                    $meses = (($mesActual - 1) + (12 - $mesFecha)) + 1;
                } else {
                    $meses = ($mesActual - 1) + (12 - $mesFecha);
                }
            }
        }
        if ($diaFecha < $diaActual) {
            $dias = ($diaActual - $diaFecha);
        } else {
            $numMesAnterior = date("t", $fechaMesPasado);
            $dias = (($numMesAnterior - $diaFecha) + $diaActual);
        }
        echo "29 y 30. Tienes " . $anios . " años, " . $meses . " meses y " . $dias . " días<br/><br/>";
//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días
        $diferencia = time() - strtotime("30-10-1969");
        $anios = ((date("Y", $diferencia)) - 1970);
        $fecha = strtotime("30-10-1969");
        $anioActual = date("y", time());
        $mesActual = date("m", time());
        $mesFecha = date("m", $fecha);
        $diaActual = date("d", time());
        $diaFecha = date("d", $fecha);
        $fechaEspecial = mktime(0, 0, 0, date("m", $fecha), date("d", $fecha), date("Y", time()));
        $fechaMesPasado = strtotime('-1 month', strtotime(date('d-m-Y', $fechaEspecial)));
        if ($mesFecha == $mesActual) {
            if ($diaFecha < $diaActual) {
                $meses = 0;
            } else {
                $meses = $mesActual + 1;
            }
        } else {
            if ($mesFecha < $mesActual) {
                if ($diaFecha < $diaActual) {
                    $meses = (($mesActual - 1) - $mesFecha) + 1;
                } else {
                    $meses = ($mesActual - 1) - $mesFecha;
                }
            } else {
                if ($diaFecha < $diaActual) {
                    $meses = (($mesActual - 1) + (12 - $mesFecha)) + 1;
                } else {
                    $meses = ($mesActual - 1) + (12 - $mesFecha);
                }
            }
        }
        if ($diaFecha < $diaActual) {
            $dias = ($diaActual - $diaFecha);
        } else {
            $numMesAnterior = date("t", $fechaMesPasado);
            $dias = (($numMesAnterior - $diaFecha) + $diaActual);
        }
        echo "31 y 32. <br/>Tienes " . $anios . " años<br/>Tienes " . $meses . " meses<br/>Tienes " . $dias . " días<br/><br/>";
//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
        echo "33. ";
        print_r(getdate());
        echo "<br/>34. Printr de función getdate(...). Retorna un array que especifica datos sobre la fecha actual (año en el que estamos, "
        . "mes, día y -entre otros datos- la hora exacta con minutos, segundos y horas<br/><br/>";
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
        echo "35.";
        print_r(getdate(1));
        echo "<br>36. Printr de función getdate(1).Retorna un array con los datos de la anterior fecha pero aplicados a la fecha UNIX de 1970<br/><br/>";
//. Obtener la edad de una persona nacida el 1/1/1969
        $anioActual = getdate()[year];
        $anioPersona = getdate(strtotime("1/1/1969"))[year];
        $mesActual = getdate()[mon];
        $mesPersona = getdate(strtotime("1/1/1969"))[mon];
        $edad1 = $anioActual - $anioPersona;
        $edad2 = $edad1 - 1;
        if ($mesActual >= $mesPersona) {
            echo "36b. La persona tiene $edad1 años <br/>";
        } else {
            echo "36b. La persona tiene $edad2 años <br/>";
        }
//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        echo "<hr>";
        echo "37. strtotime(\"now\")<b>" . strtotime("now"), "</b><br/>";
        echo "38. Muestra los segundos que han pasado desde la fecha UNIX hasta hoy porque strtotime devuelve esa cifra
            y en este caso se le ha pasado 'now', haciendo referencia a la fecha actual. <br/>";
        echo "39. date('d-m-Y', strtotime(\"now\"))<b>" . date('d-m-Y', strtotime("now")), "</b><br/>";
        echo "40. Muestra la fecha de hoy con formato de día, mes y año.<br/>";
        echo "41. strtotime(\"27 September 1970\")<b>" . strtotime("27 September 1970"), "</b><br/>";
        echo "42. En este caso muestra los segundos que han pasado desde la fecha UNIX hasta el 27 de septiembre del año 1970. <br/>";
        echo "43. date('d-m-Y', strtotime(\"10 September 2000\"))<b>" . date('d-m-Y', strtotime("10 September 2000")), "</b><br/>";
        echo "44 .Muestra la fecha del 10 de septiembre del 2000 con formato día, mes y año.<br/>";
        echo "45. strtotime(\"+1 day\")<b>" . strtotime("+1 day"), "</b><br/>";
        echo "46. Muestra los segundos que han pasado desde la fecha UNIX hasta el día de mañana
                .A los segundos desde la fecha UNIX hasta hoy se le han añadido los segundos correspondientes a un día más.<br/>";
        echo "47. date('d-m-Y', strtotime(\"+1 day\"))<b>" . date('d-m-Y', strtotime("+1 day")), "</b><br/>";
        echo "48. Muestra la fecha de mañana con formato de día, mes y año.<br/>";
        echo "49. strtotime(\"+1 week\")<b>" . strtotime("+1 week"), "</b><br/>";
        echo "50. A los segundos desde la fecha UNIX hasta hoy se le han añadido los segundos correspondientes a una semana más.<br/>";
        echo "51. date('d-m-Y', strtotime(\"+1 week\"))<b>" . date('d-m-Y', strtotime("+1 week")), "</b><br/>";
        echo "52. Muestra la fecha de dentro de una semana con formato de día, mes y año.<br/>";
        echo "53. strtotime(\"+1 week 2 days 4 hours 2 seconds\")<b>" . strtotime("+1 week 2 days 4 hours 2 seconds"), "</b><br/>";
        echo "54. A los segundos desde la fecha UNIX hasta hoy se le han añadido los segundos correspondientes a una semana, dos días, cuatro horas y dos segundos.<br/>";
        echo "55. date('d-m-Y', strtotime(\"+1 week 2 days 4 hours 2 seconds\"))<b>" . date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), "</b><br/>";
        echo "56. Muestra la fecha anterior con formato de día, mes y año.<br/>";
        echo "57. strtotime(\"next Thursday\")<b>" . strtotime("next Thursday"), "</b><br/>";
        echo "58. A los segundos desde la fecha UNIX hasta hoy se le han añadido los segundos que hay desde hoy hasta el próximo jueves.<br/>";
        echo "59. date('d-m-Y', strtotime(\"next Thursday\"))<b>" . date('d-m-Y', strtotime("next Thursday")), "</b><br/>";
        echo "60. Muestra la fecha anterior con formato de día, mes y año.<br/>";
        echo "61. strtotime(\"last Monday\")<b>" . strtotime("last Monday"), "</b><br/>";
        echo "62. Muestra los segundos que hay desde la fecha UNIX hasta el pasado lunes.<br/>";
        echo "63. date('d-m-Y', strtotime(\"last Monday\"))<b>" . date('d-m-Y', strtotime("last Monday")), "</b><br/>";
        echo "64. Muestra la fecha anterior con formato de día, mes y año.";
        echo "<hr>";
        ?>
    </body>
</html>
