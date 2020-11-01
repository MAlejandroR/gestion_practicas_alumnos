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
        $nom = "Marcos";
        $ape = "Perez";
        echo "Mi nombre es $nom " . "y mi apellido es $ape";
        print "</br>Mi nombre es $nom " . "y mi apellido es $ape</br>";

        /* Sintaxis heredoc, */
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es
// aquí aparecer el contenido del infoorme
// respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
        $informe = <<<EOD
                <pre>
                Linea 1
                Linea 2
                Linea 3
                Linea 4
                Linea 5</pre>
EOD;
        echo "El contenido de informe es $informe";


        /* PROBANDO VARIABLES */
//Crea una variable y asígnale un valor
//visualiza el valor de la variable y el tipo que eś
//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
//Prueba a ver el valor y tipo de una variable no definida previamente
        /* VISUALIZA LAS VARIABLES USANDO LA FUNCION printf */

        $a = 21;
        echo "el valor es  $a tipo " . gettype($a) . "</br>";
        $a = true;
        echo "el valor es  $a tipo " . gettype($a) . "</br>";
        $a = "Hola";
        echo "el valor es  $a tipo " . gettype($a) . "</br>";
        $a = 2.78;
        echo "el valor es  $a tipo " . gettype($a) . "</br>";
        echo "el valor es  $b tipo " . gettype($b) . "</br>";
//Visualiza el contenido de la función time() y explica su valor
        $hora = time();
        echo "el valor es  $hora tipo " . gettype($hora) . " Devuelve el momento actual medido como el número de segundos desde la Época Unix (1 de Enero de 1970 00:00:00 GMT).</br>";


//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
        $fecha = new DateTime('now');
        echo $fecha->format('d-m-Y')."</br>";
        
        
//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
//        $fecha1 = DateTime('1970-01-01');
//        echo $fecha->format('d-m-Y');
//        echo $fecha1->format('d-m-Y');
//        $resta = date_diff($fecha1,$fecha);
//        
//        $dias = $resta/60/60/24;
//        $meses=$dias/30;
//        $años=$meses/12;
//        echo "Han pasado $dias dias, $meses meses y $años años </br>";      
        $anios= Date("Y");
        $mes= Date("m");
        $dia= Date("d");
        $intervaloA=$anios-1970;
        
        $intervaloM=$mes-1;
        
        $intervaloD=$dia-1;
        
        $sumDias=(($intervaloA*12)+$intervaloM)*30+$intervaloD;
        $sumMeses=$intervaloA*12+$intervaloM;
        echo "Han pasado ".$sumDias." dias, ".$sumMeses. " meses"." y ".$intervaloA. " años</br>";

// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
        $hoy =new DateTime('now');
        echo date_format($hoy, 'l, \d\i\a j \d\e F \d\e Y');
//Asigna a una variable la fecha de tu cumpleaños
        $cumple=new DateTime('1994-05-20');
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
        // tienes 23 años, 10 meses y 4 días
        $today=new DateTime();
        $aniios=$today->diff($cumple);
        echo $aniios->Y. "</br>";
        
//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando
        $cumplee=new DateTime('1994-05-20');
        $fecha2=new DateTime('now');
        $diff=date_diff($cumplee,$fecha2);
        echo "tengo ".$diff->y . " años ". $diff->m ." meses ".$diff->d. " dias</br>";
        //tienes 23 años
        // tienes 286 meses
        // tienes 8737 días
        $meses =($diff->y)*12+$diff->m;
        $años=$diff->y;
        $dias=($meses *31)+$diff->d;
        echo "tengo ".$años . " años</br> ";
        echo "tengo ". $meses ." meses</br> ";
        echo "tengo ".$dias. " dias</br>";
       
//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
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
    </body>
</html>

