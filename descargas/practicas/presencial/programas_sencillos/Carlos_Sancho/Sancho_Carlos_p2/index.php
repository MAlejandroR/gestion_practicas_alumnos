<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <title></title>
    </head>
    <body>
        <?php
//Defino dos variables con mi nombre y apellidos
        $name = "Carlos";
        $ape = "Sancho";

        echo "1.Mi nombre es \"$name\" ", "y mi apellido es \"$ape\"<br>";
        print "2.Mi nombre es \"$name\" y mi apellido es \"$ape\"<br><br>";

        echo "3. Las diferencias entre echo y print son sutiles, por ejemplo
        echo permite concatenar cadenas de caracteres con la coma \",\". 
        Se dice que echo es ligeramente más rápido.<br>";

        echo "4. print devuelve valor entero 1 por lo que puede ser usado en expresiones
        mientras que echo es de tipo void.<br>";

        echo "5. Ninguno de los dos necesita parentesis.<br>";


        $informe = <<< FIN
                <pre>
7. Este es un informe que tiene cinco líneas
esta es la primera
a continuación va la segunda
la tercera ya en el medio
la cuarta que es la penúltima
y la última la quinta
                </pre>
FIN;
        echo $informe;

        /* VARIABLES */
        //int
        $v = 125;
        $type = gettype($v);
        printf("<td>8. \$v=$v </td>");
        printf("<td>Variable de tipo $type, valor -$v-</td><br>");
        //boolean
        $v = true;
        $type = gettype($v);
        $b = $v == true ? "true" : "false";
        printf("<td>9. \$v=$b </td>");
        printf("<td>Variable de tipo $type, valor -$v-</td><br>");
        //double        
        $v = 125.123;
        $type = gettype($v);
        printf("<td>10. \$v=$v </td>");
        printf("<td>Variable de tipo $type, valor -$v-</td><br>");
        //string
        $v = "Hola Mundo!";
        $type = gettype($v);
        printf("<td>11. \$v=$v </td>");
        printf("<td>Variable de tipo $type, valor -$v-</td><br>");
        //null
        $v = null;
        $type = gettype($v);
        $b = $v == null ? "null" : $v;
        printf("<td>12. \$v=$b </td>");
        printf("<td>Variable de tipo $type, valor -$v-</td><br>");
        //Variable no declarada
        printf("<td>13. Variable no declarada \$z = -$z- </td><br><br>");

        /* TIIIME */
        echo "14. La función time() devuelve el número de segundos que han pasado "
        . "desde el 1 de enero de 1970, ", time() . " segundos<br>";
        echo "15. Fecha con formato d-m-y " . date("d-m-Y", time()) . "<br>";

        //Dias trancurridos desde 1970
        $ff = (time() - strtotime("1970-01-01"));
        $ff = $ff / (60 * 60 * 24);
        echo "16. Días transcurridos desde el 1 de enero de 1970, " . round($ff) . " días<br>";

        //Meses
        $ff = $ff / 30;
        echo "17. meses transcurridos desde el 1 de enero de 1970, " . round($ff) . " meses<br>";

        //Años
        $ff = strtotime("01 01 1970");
        $ff = (date('Y', time())) - (date('Y', strtotime($ff)));
        echo "18. Años transcurridos desde el 1 de enero de 1970, " . $ff . " años<br>";

        //Mi edad en días, meses y años.
        $dd = date_diff(date_create('1997-05-09'), date_create('today'))->d;
        $mm = date_diff(date_create('1997-05-09'), date_create('today'))->m;
        $yy = date_diff(date_create('1997-05-09'), date_create('today'))->y;

        echo "19. Tienes $yy años, $mm meses y $dd días.<br>";

        //Fecha con formato.
        echo "20. " . date('l, d/m/Y', strtotime("now")) . "<br>";

        //Si naciste en el 69 cuantos años, meses, y días tienes.
        echo "21. Si naciste el 30 de octubre de 1969, tienes. <br>";
        $year = new DateTime("1969-10-30");
        $now = new DateTime();
        echo "  - " . date_diff($year, $now)->y . " años.<br>";
        echo"  - " . ($year->diff($now)->m + (date_diff($year, $now)->y * 12)) . " meses.<br>";

        $difD = (time() - strtotime("1969-10-30"));
        $difD = $difD / (60 * 60 * 24);
        echo "  - " . round($difD) . " días<br>";

        //Funcion GETDATE()
        echo"<br>";
        print_r(getdate());
        echo "<br><br>La función getDate() devuelve un array cuyo contenido es: segundos, minutos,"
        . "hora, día del mes, día de la semana en número, mes, año, semana del año"
        . ", día de la semana en texto, mes en texto, y segundos desde la época Unix.<br><br>";
        print_r(getdate(1));
        echo "<br><br>Devuelve los valores para el primer segundo empezando a"
        . " contar desde la época Unix.<br><br>";

//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        echo "<hr>";
        echo strtotime("now"),
        ", segundos que han pasado desde el 1 de enero de 1970.<br/>";
        echo date('d-m-Y', strtotime("now")),
        ", fecha con formato dia-mes-año.<br/>";
        echo strtotime("27 September 1970"),
        ", 27/09/1970 em unix.<br/>";
        echo date('d-m-Y', strtotime("10 September 2000")),
        ", 10 de septiembre del 2000, transformado a formato dia-mes-año<br/>";
        echo strtotime("+1 day"),
        ", mañana en formato unix.<br/>";
        echo date('d-m-Y', strtotime("+1 day")),
        ", mañana con formato dia-mes-año.<br/>";
        echo strtotime("+1 week"),
        ", una semana más en formato unix.<br/>";
        echo date('d-m-Y', strtotime("+1 week")), ", una semana más en formato dia-mes-año.<br/>";
        echo strtotime("+1 week 2 days 4 hours 2 seconds"),
        ", una semana 2 días 4 horas y 2 segundos más en formato unix.<br/>";
        echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")),
        ", una semana 2 días 4 horas y 2 segundos más en formato dia-mes-año<br/>";
        echo strtotime("next Thursday"),
        ", el próximo jueves en formato unix.<br/>";
        echo date('d-m-Y', strtotime("next Thursday")),
        ", El próximo jueves en formato dia-mes-año<br/>";
        echo strtotime("last Monday"),
        ", el lunes pasado en formato unix.<br/>";
        echo date('d-m-Y', strtotime("last Monday")),
        ", el lunes pasado en formato dia-mes-año.<br/>";
        echo "<hr>"
        ?>
    </body>
</html>