<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//Defino dos variables con mi nombre y apellidos

        $nombre = "Javier";
        $apellido = "Aso";

//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "Manuel" y mi apellido es "Romero"
//1)con echo pasando varios argumentos (separadados por coma)

        echo '<b>1)</b> ';
        echo 'Mi nombre es ', "\"", $nombre, "\"", " y mi apellido es ", "\"", $apellido, "\"", "<br />";


//2)con print
        echo '<b>2)</b> ';
        print "Mi nombre es " . "\"" . $nombre . "\"" . " y mi apellido es " . "\"" . $apellido . "\"" . "<br />";


//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.

        echo '<b>3 4 5)</b> La semejanza fundamental es que ambas son construcciones del lenguaje y que las dos imprimen por pantalla lo que les "pasemos por parámetro"'
        . '<br />Como diferencias, a echo se le pueden pasar varias cadenas separadas por comas y las imprimirá todas. En cambio print solo imprimirá una cada vez que la llamemos.'
        . '<br />Además la función print devuelve como resultado un 1 si todo ha ido bien.<br /> ';


//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
        echo '<b>6)</b> ';
        echo 'Porque tanto echo como print no son realmente funciones (son una construcción del lenguaje), por lo que no se requiere el uso de paréntesis con ellas<br />';

        /* 7) Sintaxis heredoc, */
//Asigna a una variable llamada informe un texto de cinco líneas,
        echo '<b>7) El contenido de informe es:</b> ';
        $informe = <<<FIN
        <pre>
        Hola
        este
        es un texto
        de cinco
        líneas.</pre>
FIN;
        echo $informe;
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es:
//   ........
// aquí aparecer el contenido del informe
// debe de respetarse el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)



        /* PROBANDO VARIABLES (del 8 al 19) */
//Crea una variable y asígnale un valor


        echo '<b>8 a 19)</b><br /> ';
        $x = "Comadreja";

//visualiza el valor de la variable y el tipo que eś

        echo 'La variable $x cuyo valor es: <b>' . $x . '</b> es del tipo: <b>' . gettype($x) . '</b><br />';

//Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo

        $x = true;
        echo 'La variable $x cuyo valor es: <b>' . $x . '</b> es del tipo: <b>' . gettype($x) . '</b><br />';
        $x = 5.5;
        echo 'La variable $x cuyo valor es: <b>' . $x . '</b> es del tipo: <b>' . gettype($x) . '</b><br />';
        $x = null;
        echo 'La variable $x cuyo valor es: <b>' . $x . '</b> es del tipo: <b>' . gettype($x) . '</b><br />';


//Prueba a ver el valor y tipo de una variable no definida previamente

        echo 'La variable $y cuyo valor es: <b>' . $y . '</b> es del tipo: <b>' . gettype($y) . '</b><br />';


        /* 20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() .. */

        echo '<b>20)</b> ';

        for ($i = 64; $i < 123; $i++) {


            echo chr($i) . " ";
        }



//21)Visualiza el contenido de la función time() y explica su valor

        echo '<br /><b>21)</b> ';
        echo " Estos son los segundos que han pasado desde el instante 0 Unix. 1/1/1970 0:0:0 : " . time() . "<br />";

//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello

        echo '<b>22)</b> ';
        echo date("d-m-Y") . "<br />";


//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear

        echo '<b>23)</b> ';
        echo "Días desde el 1/1/1970: " . round(time() / 60 / 60 / 24) . "<br />";
        echo '<b>24)</b> ';
        echo "Horas desde el 1/1/1970: " . round(time() / 60 / 60) . "<br />";
        echo '<b>25)</b> ';
        echo "Minutos desde el 1/1/1970: " . round(time() / 60) . "<br />";

//Usando la función setlocale(...) y strftime(...)
//Puede ser que tengas que habilitar el idioma en el sistema con locale-gen
//26)  Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018
//27)  Ahora con formato en inglés  Sunday, 28 October 2018
//28) y con formato en francés  dimanche, 28 octobre 2018


        echo '<b>26)</b> ';
        setlocale(LC_TIME, "es_ES.UTF-8");
        echo strftime("%A, %e de %B de %Y") . "<br />";


        echo '<b>27)</b> ';
        setlocale(LC_TIME, "en_US.UTF-8");
        echo strftime("%A, %e %B %Y") . "<br />";

        echo '<b>28)</b> ';
        setlocale(LC_TIME, "fr_FR.UTF-8");
        echo strftime("%A, %e %B %Y") . "<br />";




// 29-30)Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días

        echo '<b>29-30)</b> ';

        function calculaEdad($fecha) {

            $fNac = strtotime($fecha);

            $anoAct = (int) date("Y");
            $anoNac = (int) date("Y", $fNac);
            $mesAct = (int) date("m");
            $mesNac = (int) date("m", $fNac);
            $diaNac = (int) date("d", $fNac);
            $diaAct = date("d");
            $diasMesAnterior = date("t", strtotime("-1month"));
            $diasCumplidosMesAnterior = $diasMesAnterior - $diaNac;
            if ($diasCumplidosMesAnterior < 0) {
                $diasCumplidosMesAnterior = 0;
            }





            if ($mesAct < $mesNac) {//No has cumplido
                echo "Tienes " . ($anoAct - $anoNac - 1 ) . " años<br />";
                if ($diaNac > $diaAct) {
                    echo "Tienes " . (12 - $mesNac + $mesAct - 1) . " meses<br />";
                    echo "Tienes " . ($diasCumplidosMesAnterior + $diaAct) . " dias<br />";
                } else {
                    echo "Tienes " . (12 - $mesNac + $mesAct ) . " meses<br />";
                    echo "Tienes " . ( $diaAct - $diaNac) . "dias<br />";
                }
            } else {

                if ($mesAct > $mesNac) {//Ya has cumplido
                    echo "Tienes " . ($anoAct - $anoNac ) . " años<br />";
                    if ($diaNac > $diaAct) {//NO has cumplido
                        echo "Tienes " . ($mesAct - $mesNac - 1 ) . " meses<br />";
                        echo "Tienes " . ($diasCumplidosMesAnterior + $diaAct) . " dias<br />";
                    } else {//has cumplido
                        echo "Tienes " . ($mesAct - $mesNac ) . " meses<br />";
                        echo "Tienes " . ($diaAct - $diaNac ) . "dias<br />";
                    }
                } else {

                    if ($diaAct < $diaNac) {
                        echo "Tienes " . ($anoAct - $anoNac - 1 ) . " años<br />";
                        echo "Tienes " . (12 - $mesNac + $mesAct - 1) . " meses <br />";
                        echo "Tienes " . ($diasCumplidosMesAnterior + $diaAct) . " dias<br />";
                    } else {
                        echo "Tienes " . ($anoAct - $anoNac ) . " años<br />";
                        echo "Tienes " . 0 . " meses <br />";
                        echo "Tienes " . ( $diaAct - $diaNac) . "dias<br />";
                    }
                }
            }
        }

        calculaEdad("28-11-1989");





//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días

        echo '<b>31-32)</b> ';

        calculaEdad("30-10-1969");

//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado

        echo '<b>33)</b> ';
        print_r(getdate());

        echo '<br />La función getdate() devuelve toda la información relacionada con la fecha. Aparentemente los distintos valores están almacenados en un array<br />';


//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
        echo '<b>34)</b> ';
        echo print_r(getdate(1));
        echo '<br /><b>35)</b> ';
        echo 'Devuelve el array correspondiente a que haya pasado un segundo desde la fecha UNIX<br />';

//. Obtener la edad de una persona nacida el 1/1/1969
//
        echo '<b>36)</b> ';
        echo getdate(time() - strtotime("1/1/1969"))["year"] - 1970 . "<br />";


//
//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        echo "<hr>";
        echo '<b>37)</b> ';
        echo strtotime("now"), " Pasamos el momento actual y nos lo convierte a segundos UNIX<br/>";
        echo '<b>38)</b> ';
        echo date('d-m-Y', strtotime("now")), " Fecha actual obtenida pasando como parametro a date los segundos actuales desde UNIX<br/>";
        echo '<b>39)</b> ';
        echo strtotime("27 September 1970"), " Segundos hasta 27/9/1970 <br/>";
        echo '<b>40)</b> ';
        echo date('d-m-Y', strtotime("10 September 2000")), " Convertimos la fecha al formato d-m-Y pasandola por segundos UNIX con strtotime()<br/>";
        echo '<b>41)</b> ';
        echo strtotime("+1 day"), " Segundos UNIX hasta un día más del momento actual<br/>";
        echo '<b>42)</b> ';
        echo date('d-m-Y', strtotime("+1 day")), " Fecha de mañana obtenida pasando como parametro los segundos del ejercicio anterior<br/>";
        echo '<b>43)</b> ';
        echo strtotime("+1 week"), " Segundos UNIX hasta una semana más del momento actual<br/>";
        echo '<b>44)</b> ';
        echo date('d-m-Y', strtotime("+1 week")), " Fecha de dentro de una semana obtenida pasando como parametro los segundos del ejercicio anterior<br/>";
        echo '<b>45)</b> ';
        echo strtotime("+1 week 2 days 4 hours 2 seconds"), " Segundos UNIX hasta dentro de una semana 2 días 4 horas y 2 segundos más<br/>";
        echo '<b>46)</b> ';
        echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), " Fecha del momento del ejercicio anterior, pasando cómo parámetro los segundos obtenidos<br/>";
        echo '<b>47)</b> ';
        echo strtotime("next Thursday"), " Segundos hasta el próximo jueves desde la fecha UNIX<br/>";
        echo '<b>48)</b> ';
        echo date('d-m-Y', strtotime("next Thursday")), " Fecha del próximo jueves obtenida pasando como parámetro los segundos del ejercicio anterior<br/>";
        echo '<b>49)</b> ';
        echo strtotime("last Monday"), " Segundos hasta el lunes anterior desde el momento UNIX<br/>";
        echo '<b>50)</b> ';
        echo date('d-m-Y', strtotime("last Monday")), " Fecha del lunes pasado obtenida pasando como parámetro los segundos obtenidos en el ejercicio anterior<br/>";
        echo "<hr>";
        ?>

    </body>
</html>