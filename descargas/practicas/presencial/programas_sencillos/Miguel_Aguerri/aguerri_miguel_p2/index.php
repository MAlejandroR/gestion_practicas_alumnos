<!DOCTYPE html>
 
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
 
//Defino dos variables con mi nombre y apellidos
$nombre = "Miguel";
$apellido = "Aguerri";
$informe= <<<FIN
         <pre>
               En este informe deben de aparecer 5 lineas,
               por lo que continuo escribiendo hasta alcanzarlas
               para satisfacer las exigencias de Manuel y asi
               poder aprobar la práctica y conseguir una buena
               calificación.
         </pre>
FIN;
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "Manuel" y mi apellido es "Romero"
    echo "Visualicación con echo<br/> Mi nombre es \"Miguel\" y mi apellido es \"Aguerri\"<br/>";
    print "Visualización con print<br/> Mi nombre es \"Miguel\" y mi apellido es \"Aguerri\"<br/><br/>";
    echo "<hr>";
//1)con echo pasando varios argumentos (separadados por coma)
    echo 'Hola me llamo Miguel',' y de apellido Aguerri<br/>';
 echo "<hr>";
//2)con print
    print 'Hola me llamo Miguel'.' y de apellido Aguerri<br/><br/>';
//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.
    //Semejanzas: Ambos dos constructores de lenguaje que muestran cadenas de texto
    //Diferencias: 1-print imprime una sola cadena mientras que echo puede imprimir varias separadas por coma.
    //             2-print devuelve un valor int mientras que echo no es tipo void por lo que no devuele nada.
    echo "<hr>";
//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
    //Porque los paréntesis no son necesarios con estos tipos de funciones.
 
/*7) Sintaxis heredoc,*/
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es:
//   ........
// aquí aparecer el contenido del informe
// debe de respetarse el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
echo 'El contenido de \'informe\' es: ',$informe;
 echo "<hr>";
/*PROBANDO VARIABLES (del 8 al 19)*/
//Crea una variable y asígnale un valor
$variable = 5;
$variableNoDefinida;
//visualiza el valor de la variable y el tipo que eś
echo "El valor de la variable es $variable y es de tipo ", gettype($variable)."<br/><br/>";
//Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo 
$variable = true;
echo "El valor de la variable es $variable y es de tipo ", gettype($variable)."<br/>";
$variable = 1.234;
echo "El valor de la variable es $variable y es de tipo ", gettype($variable)."<br/>";
$variable = "Hola";
echo "El valor de la variable es $variable y es de tipo ", gettype($variable)."<br/>";
$variable = null;
echo "El valor de la variable es $variable y es de tipo ", gettype($variable)."<br/><br/>";
 echo "<hr>";
//Prueba a ver el valor y tipo de una variable no definida previamente
 echo "El valor de la variable es $variableNoDefinida y es de tipo ", gettype($variableNoDefinida)."<br/><br/>";
 echo "<hr>";
 
/* 20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() ..*/
 for ($x = 64; $x <= 122; $x++) {
    echo "El valor de $x en código ascii es: ", chr($x),  "<br>";
} 
 echo "<hr>";
//21)Visualiza el contenido de la función time() y explica su valor
echo "<br>",time();
echo "<hr>";
//Es la cuenta de segundos desde 1970 cuando se inicio la cuenta
//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello
echo "<br>",date('d-m-Y');
 echo "<hr>";
//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear
$date1=date_create("2019-10-20");
$date2=date_create("1970-01-01");
$diff=date_diff($date1,$date2);
echo "<br>",$diff->format("%R%a días");
 echo "<hr>";
//Usando la función setlocale(...) y strftime(...)
//Puede ser que tengas que habilitar el idioma en el sistema con locale-gen
//26)  Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018
//27)  Ahora con formato en inglés  Sunday, 28 October 2018
//28) y con formato en francés  dimanche, 28 octobre 2018
setlocale(LC_TIME, 'es_ES.UTF-8');
echo "<br>",strftime("%A, %d de %B de %Y", time()).'<br/>';
setlocale(LC_TIME, NULL);
echo "<br>",strftime("%A, %d %B %Y", time()).'<br/>';
setlocale(LC_TIME, 'fr_FR.UTF8');
echo "<br>",strftime("%A, %d %B %Y", time()).'<br/>';
 echo "<hr>";
// 29-30)Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
$datetime1 = new DateTime('14 Sep 1998');
$datetime2 = new DateTime(date());
$cumple = $datetime1->diff($datetime2);
echo "<br>",$cumple->format('%y años %m meses y %d dias');
 echo "<hr>";
 
 
 
//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días
$datetime1 = new DateTime('30 Oct 1969');
$datetime2 = new DateTime(date());
$cumple = $datetime1->diff($datetime2);
echo "<br>",$cumple->format('%y años %m meses y %d dias');
echo "<hr>";
 
//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
print_r(getdate());
echo "<br/>";
//Nos muestra un array con todos los datos de la fecha actual
print_r(getdate(1));
echo "<br/>";
//Nos muestra un array con todos los datos de la fecha de inicio 1970
//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
echo "<hr>";
echo strtotime("now"), "<br/>";
//Segundos transcurridos desde 1970 hasta ahora(fecha actual)
echo date('d-m-Y', strtotime("now")), "<br/>";
//Fecha actual de segundos a formato normal
echo strtotime("27 September 1970"), "<br/>";
//Fecha 27 de septiembre de 1970 en segundos
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
//Una fecha traducida a dicho formato
echo strtotime("+1 day"), "<br/>";
//Los segundos transcurridos desde 1970 hasta mañana
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
//Fecha de mañana de segundos a formato normal
echo strtotime("+1 week"), "<br/>";
//Los segundos transcurridos desde 1970 hasta la semana que viene
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
//Fecha (+ 1 semana) de segundos a formato normal
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
//Los segundos transcurridos desde 1970 hasta dentro de 1 semana, 2 dias, 4 horas y 2 segundos
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
//Fecha (dentro de una semana, 2 dias, 4 horas y 2 segundos) de segundos a formato normal
echo strtotime("next Thursday"), "<br/>";
//Los segundos transcurridos desde 1970 hasta el proximo jueves
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
//Fecha (el proximo jueves) de segundos a formato normal
echo strtotime("last Monday"), "<br/>";
//Los segundos transcurridos desde 1970 hasta el pasado lunes
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
//Fecha (del pasado lunes) de segundos a formato normal
echo "<hr>";
?>
</body>
</html>