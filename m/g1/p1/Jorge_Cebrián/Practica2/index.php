<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica 2</title>
    </head>
    <body>
        <h1>Práctica básica con php</h1>
        <?php
//Defino dos variables con mi nombre y apellidos
        $nombre = "Jorge";
        $apellidos = "Cebrián González";

//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
//1)con echo pasando varios argumentos (separadados por coma)
        echo "Visualizar texto con <span style=color:red>echo</span><br />";
        echo '"' . $nombre . '"<br />';
        echo '"' . $apellidos . '"<hr />';

//2)con print
        echo "Visualizar texto con <span style=color:red>print</span><br />";
        print '"' . $nombre . '"<br />';
        print '"' . $apellidos . '"<hr />';

//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.
        $frase = <<<'FINAL'
Una diferencia importante pero no muy conocida entre ambas, 
es que con la función echo podemos imprimir directamente varias cadenas a la vez, 
mientrás que con la función print solo podremos imprimir una cadena cada vez que sea llamada. 
Cabe resaltar que la función print siempre devuelve como resultado el número 1 y
no es muy utilizada a diferencia de la función echo que se utiliza en un 90% 
de las veces en los scripts en PHP.
FINAL;
        echo "$frase<hr />";


//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
        $frase = <<<'FINAL'
<span style=color:red>echo</span> no es realmente una función (es una construcción del lenguaje), 
por lo que no se requiere el uso de paréntesis con él.
Y ya que no se comporta como una función, nos da a entender que no siempre se puede usar en el contexto de una función
FINAL;
        echo "$frase<hr />";

// 7) Sintaxis heredoc,
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
<span style=color:red>
Esto
es
el texto
que contiene
la variable informe
</span>
</pre>
FIN;
        echo "El contenido de informe es: <br />$informe<hr />";


// PROBANDO VARIABLES (del 8 al 19) 
//Crea una variable y asígnale un valor
//visualiza el valor de la variable y el tipo que eś
//Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo 
//Prueba a ver el valor y tipo de una variable no definida previamente
        echo "<h3>Creamos una variable y le asignamos un valor y comprobamos su tipo</h3>";
        $a = 24;
        $tipo = gettype($a);
        echo "La variable \$a vale $a y es del tipo <span style=color:red>$tipo</span><br />";
        $tipo = gettype((boolean) $a);
        echo "La variable \$a vale $a y es del tipo <span style=color:red>$tipo</span><br />";
        $tipo = gettype((float) $a);
        echo "La variable \$a vale $a y es del tipo <span style=color:red>$tipo</span><br />";
        $tipo = gettype((string) $a);
        echo "La variable \$a vale $a y es del tipo <span style=color:red>$tipo</span><br />";
        $tipo = gettype((unset) $a);
        echo "La variable \$a vale $a y es del tipo <span style=color:red>$tipo</span><br />";
        echo "<h3>Visualizamos el valor y la el tipo de una variable no definida</h3>";
        echo "La variable \$var_no_definida vale $var_no_definida y es del tipo <span style=color:red>" . gettype($var_no_definida) . "</span><hr />";

//20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() .. */
        for ($i = 64; $i <= 122; $i++) {
            $cod_ASCII = chr($i);
            echo "El codigo ASCII de $i es: <span style=color:red>$cod_ASCII</span><br />";
        }
        echo "<hr />";
//21)Visualiza el contenido de la función time() y explica su valor
        $tiempo = time();
        echo "El contenido de la función time() es: <span style=color:red>$tiempo</span>, y devuelve como valor el momento actual medido "
        . "como el número de segundos desde la Época Unix (1 de Enero de 1970 00:00:00 GMT). <hr />";
//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello
        $date = date("d-m-Y", time());
        echo "La fecha actual es: <span style=color:red>$date</span><hr />";
//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear
        $tiempoUnix = strtotime("1 January 1970");
        $tiempoActual = time();
        $diferenciaTiempo = $tiempoActual - $tiempoUnix;
        $minutos = floor($diferenciaTiempo / 60);
        $horas = floor($minutos / 60);
        $dias = floor($horas / 24);
        echo "Han transcurrido desde el 1/1/1970: <span style=color:red>$dias</span> dias, <span style=color:red>$horas</span> horas y  <span style=color:red>$minutos</span> minutos";
        echo "<hr />";
//Usando la función setlocale(...) y strftime(...)
//Puede ser que tengas que habilitar el idioma en el sistema con locale-gen
//26)  Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018
        setlocale(LC_TIME, "es_ES.UTF-8");
        $fecha = strftime("%A, %d de %B de %Y", strtotime("10/28/2018"));
        echo "Fecha en español: <span style=color:red>$fecha</span><hr />";
//27)  Ahora con formato en inglés  Sunday, 28 October 2018
        setlocale(LC_TIME, "en_US.UTF-8");
        $fech = strftime("%A, %d %B %Y", strtotime("10/28/2018"));
        echo "Fecha en inglés: <span style=color:red>$fech</span><hr />";
//28) y con formato en francés  dimanche, 28 octobre 2018
        //Al parecer cuando utilizo el navegador de Internet Explorer si que se ve
        //el formato de la fecha en francés
        /* setlocale(LC_TIME, "fr_FR.UTF-8");
          $fech = strftime("%A, %d %B %Y", strtotime("10/28/2018"));
          echo "Fecha en francés: <span style=color:red>$fech</span><hr />"; */

// 29-30)Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
        $fecha_Nac = strtotime("09/24/1999");
        $f_Actual = time();
        $difTiempo = $f_Actual - $fecha_Nac;
        $d = date("d", $difTiempo);
        $m = date("m", $difTiempo);
        $y = date("Y", $difTiempo) - 1970;
        echo "La edad es: <span style=color:red>$y</span> años, <span style=color:red>$m</span> meses y <span style=color:red>$d</span> dias<hr />";
//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días     

        $f_Nac = strtotime("10/30/1969");
        $fech_Actual = time();
        $diferTiempo = $fech_Actual - $f_Nac;
        $year = date("Y", $diferTiempo) - 1970;
        $mes = date("m", $diferTiempo);
        $dia = date("d", $diferTiempo);
        if ((date("m", $fech_Actual) == (date("m", $f_Nac)))) {
            $mesParse = (int) (date("m", $diferTiempo)) - 1;
            $mes = (string) $mesParse;
            $diasParse = (int) (date("d", $f_Actual));
            for ($i = 0; $i <= $diasParse; $i++) {
                if ($i == $diasParse) {
                    $dia = (string) $i;
                }
            }
        }
        echo "La edad es: <br />"
        . "<span style=color:red>$year</span> años,<br />"
        . "<span style=color:red>$mes</span> meses<br />"
        . "y <span style=color:red>$dia</span> dias<hr />";

//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
        print_r(getdate());
        echo "<hr />";
        /* El resultado devuelve un array con los siguientes datos de la fecha actual: 
          Devuelve los segundos, minutos, horas, dias,
          el número de dia de la semana, el mes, el año,
          la cantidad de dias del año hasta la fecha actual,
          el nombre del dia de la semana, el nombre de mes del año
          y el tiempo actual en segundos. Todo contenido en un array */

//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
        print_r(getdate(1));
        echo "<hr />";
        /* El resultado devuelve un array con los siguientes datos de la fecha del 01/01/1970: 
          Devuelve los segundos, minutos, horas, dias,
          el número de dia de la semana, el mes, el año,
          la cantidad de dias del año hasta la fecha actual,
          el nombre del dia de la semana, el nombre de mes del año
          y el tiempo actual en segundos. Todo contenido en un array */

//. Obtener la edad de una persona nacida el 1/1/1969
        $fecha_Nac = strtotime("01/01/1969");
        $f_Actual = time();
        $difTiempo = $f_Actual - $fecha_Nac;
        $d = date("d", $difTiempo);
        $m = date("m", $difTiempo);
        $y = date("Y", $difTiempo) - 1970;
        echo "La edad es: <span style=color:red>$y</span> años, <span style=color:red>$m</span> meses y <span style=color:red>$d</span> dias<hr />";

//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        /* Ya que utilizamos la función strtotime, devolverá el tiempo transcurrido
          desde la fecha Unix(01/01/1970). */
        /* 1 */echo strtotime("now"), "<br/>";
        /* 1.-Devuelve el tiempo en segundos de tiempo actual */

        /* 2 */echo date('d-m-Y', strtotime("now")), "<br/>";
        /* 2.-Devuelve el tiempo actual en formato fecha */

        /* 3 */echo strtotime("27 September 1970"), "<br/>";
        /* 3.-Devuelve el tiempo en segundos de la fecha del 27/09/1970 */

        /* 4 */echo date('d-m-Y', strtotime("10 September 2000")), "<br/>";
        /* 4.-Devuelve el tiempo en segundos del 10/09/2000 en formato fecha */

        /* 5 */echo strtotime("+1 day"), "<br/>";
        /* 5.-Devuelve el tiempo en segundos del dia de mañana */

        /* 6 */echo date('d-m-Y', strtotime("+1 day")), "<br/>";
        /* 6.-Devuelve el tiempo del dia de mañana en formato fecha */

        /* 7 */echo strtotime("+1 week"), "<br/>";
        /* 7.-Devuelve el tiempo en segundos del dia actual una semana después */

        /* 8 */echo date('d-m-Y', strtotime("+1 week")), "<br/>";
        /* 8.-Devuelve el tiempo del dia actual una semana después en formato fecha */

        /* 9 */echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
        /* 9.-Devuelve el tiempo en segundos del dia actual una semana,
          2 dias, 4 horas y 2 segundos después */

        /* 10 */echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
        /* 10.-Devuelve el tiempo del dia actual una semana,
          2 dias, 4 horas y 2 segundos después en formato fecha */

        /* 11 */echo strtotime("next Thursday"), "<br/>";
        /* 11.-Devuelve el tiempo en segundos del proximo Jueves */

        /* 12 */echo date('d-m-Y', strtotime("next Thursday")), "<br/>";
        /* 12.-Devuelve el tiempo del proximo Jueves en formato fecha */

        /* 13 */echo strtotime("last Monday"), "<br/>";
        /* 13.-Devuelve el tiempo en segundos del último Lunes */

        /* 14 */echo date('d-m-Y', strtotime("last Monday")), "<br/>";
        /* 14.-Devuelve el tiempo del último Lunes en formato fecha */
        ?>
    </body>
</html>

