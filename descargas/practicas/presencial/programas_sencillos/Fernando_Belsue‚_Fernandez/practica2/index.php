    <!DOCTYPE html>
 
<html>
<head>
    <meta charset="UTF-8">
    <title>Practica2</title>
</head>
<body>
<?php
 
 
//Defino dos variables con mi nombre y apellidos
 $nombre = '"Mi nombre es Fernando" y mi apellido es "';
 $apellido = 'Belsué"';
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "Manuel" y mi apellido es "Romero"

//1)con echo pasando varios argumentos (separadados por coma)
  echo $nombre, $apellido;
 
//2)con print
 print "<br />$nombre $apellido.<br />";
//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.
 echo "La semejanza entre 'echo' y 'print' es:";
 $semejanza = <<<FINAL
        <pre>
        La semejanza entre 'echo' y 'print' es que su uso y funcionalidad son iguales
        </pre> 
FINAL;
 echo $semejanza;
 $dif1 = <<<FINAL
        <pre>
        Con 'echo' es posible pasar varios argumentos separados por comas,
        algo que no puede hacer 'print'. EL ejemplo de esto lo tenemos
        en el punto 1. Hacemos un 'echo' pasando las variables \$nombre y
        \$apellido separadas por comas para visualizar el texto:
        $nombre $apellido
        </pre> 
FINAL;
 $dif2 = <<<FINAL
        <pre>
        'print' devuelve un valor booleano indicando si la sentencia ha tenido
         éxito, esto es, devuelve 1 si todo ha ido bien y 0 si algo ha fallado.
        </pre> 
FINAL;
  echo "La primera diferencia es:" . $dif1;
  echo "La segunda diferencia es:" . $dif2;
//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
 echo "<br />Tanto echo como print pueden usarse sin paréntesis porque ninguno de ellos son una función.";
 
/*7) Sintaxis heredoc,*/
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es:
//   ........
// aquí aparecer el contenido del informe
// debe de respetarse el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
 $informe = <<<'FINAL'
        <pre>
        No es la persona la que elige su destino, sino el destino el que elige a la persona. Ésta es
        la concepción del mundo en la que se fundamenta la tragedia griega. Y la tragedia, según la
        define Aristóteles, irónicamente, no surge de los defectos del protagonista, sino de sus virtudes
        ¿entiendes a qué me refiero? Son las cualidades , no los defectos , las que arrastran al hombre
        a la "tragedia". "Kafka en la orilla, Haruki Murakami"
        </pre> 
FINAL;
 
echo "<br /><br />HEREDOC de 5 líneas:<br />".$informe;
 
 
/*PROBANDO VARIABLES (del 8 al 19)*/
//Crea una variable y asígnale un valor
 $v = 25;
//visualiza el valor de la variable y el tipo que eś
 echo "El valor de \$v es -$v-<br />";
 echo "El tipo de la variable es: " . gettype($v);
//Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo 
 $v = true;
 echo "<br />El valor de \$v es -$v- y su tipo es ". gettype($v);
 $v = 7.25;
 echo "<br />El valor de \$v es -$v- y su tipo es ". gettype($v);
 $v = "Hola caracola";
 echo "<br />El valor de \$v es -$v- y su tipo es ". gettype($v);
 $v = null;
 echo "<br />El valor de \$v es -$v- y su tipo es ". gettype($v);
 echo "<br />El valor de \$a es -$a- y su tipo es ". gettype($a) . "<br />"; 
 
/* 20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() ..*/
 echo "<hr>";
 for ($i = 64; $i <= 122; $i++) {
	$letra = chr($i);
	print "Ascii valor: $i  su caracter es = $letra <br />";
}

//21)Visualiza el contenido de la función time() y explica su valor
echo "<hr>";
echo "Número de segundos trancurridos desde el 1/1/1970<br />";
echo strtotime("now")."<br />";
//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello
$fecha = date('d-m-Y', strtotime("now"));
echo "La fecha actual es: $fecha<br/>";
//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear
 $dias = floor(strtotime("now")/60/24);
 echo "Los días transcurridos desde el 1/1/1970 son: $dias<br />";
 $horas = floor(strtotime("now")/60);
  echo "Las horas transcurridas desde el 1/1/1970 son: $horas<br />";
 $segundos = floor(strtotime("now"));
  echo "Los segundos transcurridos desde el 1/1/1970 son: $segundos<br />";
 
// 29-30)Asigna a una variable la fecha de tu cumpleaños.
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
 $cumpleanios = strtotime("03 September 1993");
 $segundosDeVida = strtotime("now") - $cumpleanios;
 $edadAnios = floor($segundosDeVida /(60*60*24*365));
 $edadMeses = floor($segundosDeVida/(60*60*24*30));
 $edadDias = floor($segundosDeVida/(60*60*24));
 echo "<br /> Tengo $edadAnios años, $edadMeses meses y  $edadDias días.<br />";
    
//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días
 /*Al ser una fecha anterior a la unix, el tiempo transcurrido desde la fecha nac hasta UNIX es negativo,
    este tiempo se le suma a la parte positiva.  */
 $cumpleanios = strtotime("30 october 1969");
 $segundosDeVida = strtotime("now") - $cumpleanios;
 $edadAnios = floor($segundosDeVida /(60*60*24*365));
 $edadMeses = floor($segundosDeVida/(60*60*24*30));
 $edadDias = floor($segundosDeVida/(60*60*24));
 echo "<br /> Tengo $edadAnios años, $edadMeses meses y  $edadDias días.<br />";
 
 
//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
echo "<hr>";
echo "El resultado de visualizar getdate() es un array asociativo que contiene la información de la fecha (si se especifica) o el momento local actual.<br />";
echo "<br />";
print_r(getdate());
echo "<br />En caso de pasarle un uno como parámetro a la función getdate(), nos retorna un array con la información"
. "de la fecha 1/1/1970 01:00:01(marca de tiempo unix)<br />";
print_r(getdate(1));

echo "<br /><br />Obtengo la edad de una persona nacida el 1/1/1969<br />";
$cumpleanios = getdate(strtotime("01 January 1969"));//getdate(-60*60*24*365);
$now = getdate();
$edad =  $now['year'] - $cumpleanios['year'];
echo $edad;

//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php


echo "<hr>";
echo "1.- Muestro los segundos trancurridos desde 1/1/1970 hasta el momento actual<br />";
echo strtotime("now"), "<br/>";
echo "2.- Muestro los segundos transcurridos con el formato especificado  (27 September 1970)<br />";
echo strtotime("27 September 1970"), "<br/>";
echo "3.- Creo una fecha con la función date(), el primer parámetro ('d-m-y') es el formato y el segundo el timestamp"
. ", que es el tiempo transcurrido desde 1/1/1970 hasta da fecha especificada usando strtotime, el resultado"
        . " es la siguiente fecha<br />";
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
echo "4.- Ahora muestro los segundos transcurridos desde fecha unix hasta el momento actual mas un día<br />";
echo strtotime("+1 day"), "<br/>";
echo "5.- Muestro la fecha de mañana<br />";
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
echo "6.- Muestro los segundos transcurridos desde fecha unix hasta el momento actual mas una semana<br />";
echo strtotime("+1 week"), "<br/>";
echo "7.- Muestro la fecha dentro de una semana<br />";
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
echo "8.- Muestro los segundos transcurridos desde fecha unix hasta el momento actual mas una semana"
. " dos días, cuatro horas y dos segundos.<br />";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo "9.- Muestro la fecha dentro de una semana, dos días, cuatro horas y dos segundos.<br />";
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo "10.- Muestro los segundos transcurridos desde fecha unix hasta el siguiente jueves.<br />";
echo strtotime("next Thursday"), "<br/>";
echo "11.- Muestro la fecha del siguiente jueves.<br />";
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo "12.- Muestro los segundos transcurridos desde fecha unix hasta el pasado Lunes.<br />";
echo strtotime("last Monday"), "<br/>";
echo "13.- Muestro la fecha del pasado Lunes.<br />";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>";
?>
 
</body>
</html>