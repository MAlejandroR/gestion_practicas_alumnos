<?php 
    
//Defino dos variables con mi nombre y apellidos
    $nombre = "Jorge"."<br>";
    $apellido = "Alloza"."<br>";
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "manolo" y mi apellido es "romero"    
//1)con echo pasando varios argumentos (separadados por coma)
    echo "Mi nombre es \" $nombre \" y mi apellido es \" $apellido \"" ."<br>";
//2)con print  
    print("Mi nombre es \" $nombre \" y mi apellido es \" $apellido \"" ."<br>");
//Explica en el fichero diferencias entre echo y print y semejanzas.
//Por qué puedo pasar los argumentos sin usar paréntesis
    echo "con la función echo podemos imprimir directamente varias cadenas a la vez,"."<br>";
    echo "con la función print solo podremos imprimir una cadena cada vez que sea llamada"."<br>";
/*Sintaxis heredoc,*/
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
    $informe = <<<FIN
            <pre>
            linea 1 
            linea 2
            linea 3
            linea 4
            linea 5
            </pre>
FIN;
//Posteriormente visualizas el texto    
// El contenido de 'informe' es
// aquí aparecer el contenido del informe    
// respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
    echo "El contenido de \$informe es:".$informe."<br>";
/*PROBANDO VARIABLES*/
//Crea una variable y asígnale un valor
    $v = 2;
//visualiza el valor de la variable y el tipo que es
    echo $v ." es del tipo ".gettype($v)."<br>";
//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
    $v = true;
    echo $v ." es del tipo ".gettype($v)."<br>";
    $v = 2.21342;
    echo $v ." es del tipo ".gettype($v)."<br>";
    $v = null;
    echo $v ." es del tipo ".gettype($v)."<br>";    
//Prueba a ver el valor y tipo de una variable no definida previamente
    $v2;
    echo $v2 ." es del tipo ".gettype($v2)."<br>";
    
    echo "<hr>";

/*VISUALIZA LAS VARIABLES USANDO LA FUNCION printf*/
    $v = 2;
    printf($v ." es del tipo ".gettype($v)."<br>");
    $v = true;
    printf($v ." es del tipo ".gettype($v)."<br>");
    $v = 2.21342;
    printf($v ." es del tipo ".gettype($v)."<br>");
    $v = null;
    printf($v ." es del tipo ".gettype($v)."<br>");
    echo "<hr>";

// Visualiza el contenido de la función time() y explica su valor
    var_dump(time());
    echo "<br>";
// Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
    echo date("d-m-Y");     
    echo "<br>";
// Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
    $v = time();
    $dias = floor(((($v/60)/60)/24));
    echo $dias;
    echo "<br>";
    $mes = floor($dias/30);
    echo $mes;
    echo "<br>";
    $ano = floor($mes/12);
    echo $ano;
    echo "<br>";
// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
    echo date("D, día d de F de Y");
    echo "<br>";
// Asigna a una variable la fecha de tu cumpleaños
    $fecha = strtotime("04-03-1997");
   
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
    $anos = floor((time() - $fecha)/60/60/24/365);
    $meses = floor((((time() - $fecha)/60/60/24/365) - floor((time() - $fecha)/60/60/24/365))*12) ;
    $d1 = (time() - $fecha)/60/60/24/365;
    $d2 = ((((time() - $fecha)/60/60/24/365) - floor((time() - $fecha)/60/60/24/365)));
    $diasf = floor((time()/60/60/24/365) - ($d1 + $d2));
    
//echo $edad("tienes y, m meses y d días");       
// tienes 23 años, 10 meses y 4 días
    echo "Tienes $anos años, $meses meses y $diasf dias"."<br>";
    
// Asigna a una variable una fecha de 30/10/1969
   $fecha2 = strtotime("30-10-1969");
// Obtén su edad en años, en meses y luego en días siempre redondeando
  // tienes 23 años
  $edad2 = floor((time() - $fecha2)/60/60/24/365);
  echo $edad2."<br>";
  // tienes 286 meses
  $meses2 = floor((time() - $fecha2)/60/60/24/30);
  echo $meses2."<br>";
  // tienes 8737 días
  $dias2 = floor((time() - $fecha2)/60/60/24);
  echo $dias2."<br>";
  echo "<hr>";
//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
    $v = getdate();
    print_r($v);
    echo "<br>";
    // devuelve un arrar con las unidades de tiempo que han pasado desde el momento unix
    
// Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
     $v = getdate(1);
     print_r($v);
     echo "<br>";
     //devuelve el primer segundo del momento unix
     echo "<hr>";
// Obtener la edad de una persona nacida el 1/1/1969
   $fecha3 = strtotime("1-1-1969");
   $edad3 = floor((time() - $fecha3)/60/60/24/365);
   echo $edad3;
// Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
echo "<hr>";
echo strtotime("now"), "<br/>";
echo date('d-m-Y', strtotime("now")), "<br/>";
echo strtotime("27 September 1970"), "<br/>";
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
echo strtotime("+1 day"), "<br/>";
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
echo strtotime("+1 week"), "<br/>";
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo strtotime("next Thursday"), "<br/>";
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo strtotime("last Monday"), "<br/>";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>";
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//                  *** COMENTARIOS ***
//                  
//cuando pone strtime(*) devuelve el tiempo que ha pasado 
//desde el mometo unix hast ahora en segundos
//
// cuando pone date('d-m-Y',strtotime(*))devuelve la fecha 
// especificada dentro del strtotime con el formato d-m-Y.
        ?>

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
        <link rel="stylesheet" href="estilos.css" type="text/css" />
    </head>
    <body>
        <?php
        
        ?>
    </body>
</html>
