<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

        <?php

$nom="Javier";
$apel="Andrés Pérez";
//print a diferencia del echo solo acepta un argumento y devuelve
//un valor booleano 
echo "<p>mi nombre es ", "\"$nom\"&nbsp", "de apellidos \"$apel\"</p>";
$v = print ("<p>mi nombre es ".$nom."&nbsp".$apel."</p>");
echo $v."<br>";
//En este caso $v devolveria 1 dado que lo ha interpretado como "true"

//Metemos un texto de varias lineas y le asignmos formato con <pre> para
//visualizar los saltos de linea
$informe=<<<FIN
<pre>
Este es el 
contenido del informe 
respetando el número 
de 5 líneas asignadas 
previamente.
</pre>
FIN;

echo $informe;
echo "<br>";

//Asignamos un valor a la variable
$var=3;
//Y comprobamos el tipo de variable
var_dump($var);
echo "<br>";
//Cambiamos el valor a booleano, float, string y null y visualizamos su valor

//boleano
$var=false;
printf($var);
var_dump($var);
echo "<br>";
//float
$var=1.01;
printf($var);
var_dump($var);
echo "<br>";
//String
$var="hola";
printf($var);
var_dump($var);
echo "<br>";
//null
$var=null;
printf($var);
var_dump($var);
echo "<br>";
//Visualiza el contenido de la función time() y explica su valor
//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
echo "<p>Aqui tenemos el tiempo en milisegundos desde el dia 0:  ".time()."ms</p>";
echo "<p>Fecha de Hoy: ".date('d-m-Y')."</p>";
$s=time();
echo "<br>";
$d=round(((($s/60)/60))/24);
$y=floor(((((($s/60)/60))/24)/365));
$m=floor(((((($s/60)/60))/24)/365)*12);
echo "Tiempo transcurrido desde 1/1/1970<br> Dias: ".$d."<br>Meses: ".$m."<br>Años: ".$y."<br>";
/*echo date("l,j \d\e F \d\e Y");*/

// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
setlocale(LC_TIME, "ES");
echo strftime("%A, dia %d de %B del %Y")."<br><br>";


//Obtenemos nuestra edad en años, meses y dias
$dianac=28;
$mesnac=7;
$anonac=1990;

if ($mesnac < date('m') && $dianac>date('d')){
    $meses=date('m')-$mesnac;
    $anos=date('Y')-$anonac;
    $dias=$dianac-date('d');
}else if ($mesnac < date('m') && $dianac<date('d')) {
    $anos=date('Y')-$anonac;
    $meses=date('m')-$mesnac;
    $dias=date('d')-$dianac;
}else if ($mesnac > date('m') && $dianac>date('d')) {
    $anos=(date('Y')-1)-$anonac;
    $meses=$mesnac-date('m');
    $dias=$dianac-date('d');
}else if ($mesnac > date('m') && $dianac<date('d')) {
    $anos=(date('Y')-1)-$anonac;
    $meses=$mesnac-date('m');
    $dias=date('d')-$dianac;
}

echo "Tengo $anos años, $dias dias y $meses meses";
echo "<hr>";
//Utlizamos print_r la funcion getdate()
print_r(getdate());
//Nos muestra todos los elementos de la funcion en un array asociativo

//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
echo "<hr>";
//Obtenemos la fecha actual en segundos
echo strtotime("now"), "<br/>";
//Obtenemos la fecha actual en formato dia-mes-año
echo date('d-m-Y', strtotime("now")), "<br/>";
//Obtenemos el tiempo transcurrido desde 27 de Septiembre de 1970 en segundos
echo strtotime("27 September 1970"), "<br/>";
//Obtenemos el formato de fecha con strtotime a segundos para pasarlo en formato
//dia-mes-año con date()
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
//Obtenemos el tiempo en segundos transcurrido un dia mas de la fecha actual
echo strtotime("+1 day"), "<br/>";
//Obtenemos la fecha de mañana con strtotime a segundos para pasarlo en formato
//dia-mes-año con date()
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
//Obtenemos el tiempo en segundos transcurrido una semana mas adelante de
//la fecha actual
echo strtotime("+1 week"), "<br/>";
//Obtenemos la fecha de la semana que viene con strtotime a segundos para pasarlo en formato
//dia-mes-año con date()
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
//Obtenemos el tiempo en segundos por delante de la fecha actual 1 semana, 2 dias
//4 horas y 2 segundos
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
//Obtenemos el tiempo en segundos por delante de la fecha actual 1 semana, 2 dias
//4 horas y 2 segundos para pasarlo en formato dia-mes-año con date()
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
//Obtenemos el tiempo en segundo de un dia de la semana proximo
echo strtotime("next Thursday"), "<br/>";
//Obtenemos el tiempo en segundos indicando un dia de la semana para pasarlo en formato dia-mes-año con date()
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo strtotime("last Monday"), "<br/>";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>"
        ?>
    </body>
</html>
