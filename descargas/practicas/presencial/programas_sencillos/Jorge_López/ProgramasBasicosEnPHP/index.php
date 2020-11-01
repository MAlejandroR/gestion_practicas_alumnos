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
$nombre="Jorge";
$apellido="López";
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
 // mi nombre es "manolo" y mi apellido es "romero"
//1)con echo pasando varios argumentos (separadados por coma)
echo "Mi nombre es \"$nombre\" ", "y mi apellido es \"$apellido\" <br/>";
//2)con print  
print "Mi nombre es \"$nombre\" y mi apellido es \"$apellido\"<br/>";
//Explica en el fichero diferencias entre echo y print y semejanzas.


/*Diferencias:
 * Print imprime una cadena, mientras que echo puede imprimir más de una cadena separándolas por comas.
 * Print siempre devuelve el entero 1, mientras que echo es void y no devuelve nada.
 */


 //Por qué puedo pasar los argumentos sin usar paréntesis

/*Porque tanto echo como prints no son exáctamente funciones, si no constructores de lenguaje.
 */


/*Sintaxis heredoc,*/
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
$informe= <<<FIN
        En un lugar de La Mancha<br/>
        de cuyo nombre no quiero acordarme<br/>
        no ha mucho tiempo que vivía un hidalgo<br/>
        de los de lanza en astillero, adarga antigua,<br/>
        rocín flaco y galgo corredor<br/>
FIN;
//Posteriormente visualizas el texto
// El contenido de 'informe' es
// aquí aparecer el contenido del infoorme
// respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
echo $informe;
 
/*PROBANDO VARIABLES*/
//Crea una variable y asígnale un valor
//visualiza el valor de la variable y el tipo que eś
//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
//Prueba a ver el valor y tipo de una variable no definida previamente
/*VISUALIZA LAS VARIABLES USANDO LA FUNCION printf*/
        
$var=5;
printf("La variable \$var vale $var y es de tipo " . gettype($var) . "<br/>");
$var=true;
printf("La variable \$var vale $var y es de tipo " . gettype($var) . "<br/>");
$var=1.25;
printf("La variable \$var vale $var y es de tipo " . gettype($var) . "<br/>");
$var="Hola, mundo!";
printf("La variable \$var vale $var y es de tipo " . gettype($var) . "<br/>");
$var=null;
printf("La variable \$var vale $var y es de tipo " . gettype($var) . "<br/>");
 
 
//Visualiza el contenido de la función time() y explica su valor
echo time() . "<br/>";

/*
 *Devuelve el número de segundos que han transcurrido desde el 1 de enero de 1970 a las 00:00:00 (momento en el que fue lanzado UNIX) 
 */


//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
$fecha= date("d-m-Y");
echo $fecha . "<br/>";
//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
$dias=time();
$dias=$dias/60;
$dias=$dias/60;
$dias=floor($dias/24);
echo "Han transcurrido $dias días desde el 1/1/1970.  <br/>";
$meses=floor($dias/30);
echo "Han transcurrido $meses meses desde el 1/1/1970.  <br/>";
$anios=floor($meses/12);
echo "Han transcurrido $anios años desde el 1/1/1970.  <br/>";
// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
setlocale(LC_ALL,"es_ES");
echo strftime("%A %d de %B del %Y")."<br/>";
//Asigna a una variable la fecha de tu cumpleaños

// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
  // tienes 23 años, 10 meses y 4 días
$diaCumple=19;
$mesCumple=10;
$añoCumple=1992;

$hoy= getdate();
$diaHoy=$hoy[mday];
$mesHoy=$hoy[mon];
$añoHoy=$hoy[year];

$edadAños=$añoHoy-$añoCumple;
$edadMeses=$mesHoy-$mesCumple;
$edadDias=$diaHoy-$diaCumple;

if($edadDias<0){
    $edadMeses=$edadMeses-1;
    $edadDias=$edadDias+30;
}
if($edadMeses<0){
    $edadAños=$edadAños-1;
    $edadMeses=$edadMeses+12;
}

echo "Tienes $edadAños años, $edadMeses meses y $edadDias dias<br/>";


//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando
 
  //tienes 23 años
  // tienes 286 meses
  // tienes 8737 días

$diaCumple=30;
$mesCumple=10;
$añoCumple=1969;

$hoy= getdate();
$diaHoy=$hoy[mday];
$mesHoy=$hoy[mon];
$añoHoy=$hoy[year];

$edadAños=$añoHoy-$añoCumple;
$edadMeses=$mesHoy-$mesCumple;
$edadDias=$diaHoy-$diaCumple;

if($edadDias<0){
    $edadMeses=$edadMeses-1;
    $edadDias=$edadDias+30;
}
if($edadMeses<0){
    $edadAños=$edadAños-1;
    $edadMeses=$edadMeses+12;
}

echo "Tienes $edadAños años<br/>";
$edadMeses=$edadAños*12+$edadMeses;
echo "Tienes $edadMeses meses <br/>";
$edadDias=$edadMeses*30+$edadDias;
echo "Tienes $edadDias días <br/>";

 
//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//
$hoy= getdate();
print_r($hoy);
echo "<br/>";
/*Devuelve un array en el cual, cada posición está ocupada por un factor del tiempo actual: los tres primeros devuelven la hora actual (segundos, minutos, horas) 
 * y el resto la fecha actual(día, día de la semana, mes, año, día del año, día de la semana en letras y més en letras)
 */


//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna

$hoy=getDate(1);
print_r($hoy);
echo "<br/>";
/*Devuelve un array como el anterior pero con la fecha 1/1/1970.*/

//. Obtener la edad de una persona nacida el 1/1/1969
$diaCumple=1;
$mesCumple=1;
$añoCumple=1969;

$hoy= getdate();
$diaHoy=$hoy[mday];
$mesHoy=$hoy[mon];
$añoHoy=$hoy[year];

$edadAños=$añoHoy-$añoCumple;
$edadMeses=$mesHoy-$mesCumple;
$edadDias=$diaHoy-$diaCumple;

if($edadDias<0){
    $edadMeses=$edadMeses-1;
    $edadDias=$edadDias+30;
}
if($edadMeses<0){
    $edadAños=$edadAños-1;
    $edadMeses=$edadMeses+12;
}

echo "Tienes $edadAños años, $edadMeses meses y $edadDias dias<br/>";



//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
echo "<hr>";
echo strtotime("now"), "<br/>";
//Convierte la fecha actual a fecha UNIX
echo date('d-m-Y', strtotime("now")), "<br/>";
//Muestra la fecha actual
echo strtotime("27 September 1970"), "<br/>";
//Muestra la fecha del 27 de septiembre de 1970 en formato UNIX
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
//Muestra la fecha del 10 de septiembnre del 2000
echo strtotime("+1 day"), "<br/>";
//Muestra la fecha de mañana en formato UNIX
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
//Muestra la fecha de mañana
echo strtotime("+1 week"), "<br/>";
//Muestra la fecha de la semana que viene en formato UNIX
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
//Muestra la fecha de la semana que viene
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
//Muestra la fecha de dentro de una semana, dos dias, 4 horas y dos segundos en formato UNIX
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
//Muestra la fecha de dentro de una semana, dos días, 4 horas y dos segundos.
echo strtotime("next Thursday"), "<br/>";
//Muestra la fecha del próximo jueves en formato UNIX.
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
//Muestra la fecha del próximo jueves
echo strtotime("last Monday"), "<br/>";
//Muestra la fecha del pasado lunes en formato UNIX
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
//Muestra la fecha del pasado lunes.
echo "<hr>"

//Recordar que la fecha en formato UNIX es el número de segundos transcurridos desde el 1/1/1970 a las 00:00:00
        ?>
    </body>
</html> 
