<?php

//Declaramos todas las variables.
$nombre = "Pablo";
$apellido = "García";

$fin = <<< FIN
Este es un informe que tiene cinco líneas
esta es la primera
a continuación va la segunda
la tercera ya en el medio
la cuarta que es la penúltima
y la última la quinta
FIN;

$a = 25;
$b = true;
$c = 7.25;
$d = "Hola caracola";
$e = null;

//Declaro las fechas.
$fechahoy = new DateTime();
$fechanac = new DateTime('07-01-1998');
$fechanac2 = new DateTime('01-12-1963');
$f1 = strtotime("now");
$f2 = strtotime("1 January 1970");
$df = ($f1 - $f2);

//Obtengo la diferencia en segundos y hago el calculo para obtenerlo en minutos, horas y dias.
$minutos = floor($df / 86400 * 24 * 60);
$horas = floor($df / 86400 * 24);
$dias = floor($df / 86400);

//Con el diff hago la diferencia entre las fechas y la guardo.
$intervalo = $fechahoy->diff($fechanac);
$intervalo2 = $fechahoy->diff($fechanac2);
$sHoy = strtotime("now");
$fHoy = date("d-m-Y", strtotime("now"));
$sSep2000 = strtotime("10 September 2000");
$fSep2000 = date("d-m-Y", strtotime("10 September 2000"));
$sSep70 = strtotime("27 September 1970");
$fSep70 = date("d-m-Y", strtotime("27 September 1970"));
$sDia = strtotime("+1 day");
$fDia = date("d-m-Y", strtotime("+1 day"));
$sSem = strtotime("+1 week");
$fSem = date("d-m-Y", strtotime("+1 week"));
$sProx = strtotime("+1 week 2 days 4 hours 2 seconds");
$fProx = date("d-m-Y", strtotime("+1 week 2 days 4 hours 2 seconds"));
$sJueves = strtotime("next Thursday");
$fJueves = date("d-m-Y", strtotime("next Thursday"));
$sLunes = strtotime("last Monday");
$fLunes = date("d-m-Y", strtotime("last Monday"));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica2</title>
        <!--Introduzco un estilo básico-->
        <style>
            h1{
                color:#484b4f;
            }
            * {
                background-color: #bad2f4
            }
        </style>
    </head>
    <body>
        <!--Hago un titulo y una lista ordenada con todas las acciones que tengo que hacer-->
        <h1>Probando instrucciones de php </h1>
        <hr>
        <ol>
            <!--Imprimo cada variable-->
            <li> Mi nombre es <?php echo $nombre ?> y mi apellido es <?php echo $apellido ?><br> </li>
            <li> Mi nombre es <?php print($nombre) ?> y mi apellido es <?php print($apellido) ?><br> </li>
            <li> echo  hace esto que no hace print; puede mostrar mas de una cadena separas por coma </li>
            <li> print tiene esto que no tiene echo; siempre devulve 1, por lo que puede seer utilizado en expresiones complejas.  </li>
            <li> Ambos son iguales en: ambos imprimen una pagina php y tienen las mismas funcionalidades. </li>
            <li> Tanto echo como print puede usarse con paréntesis y sin paréntesis porque no son funciones, si no constructores de lenguaje. </li>
            <li><pre> <?php echo $fin ?></pre> </li>
            <li> Valor de la variable $a -<?php echo $a ?>-</li>
            
            <!--Con gettype obtengo el valor de la variable-->
            <li> Tipo de la variable es <?php echo gettype($a) ?> </li>
            <li> $b=true Valor de la variable -<?php echo $b ?>- </li>
            <li> Tipo de la varialbe es <?php echo gettype($b) ?> </li>
            <li> $c = 7.25 Valor de la variable -<?php echo $c ?>- </li>
            <li> Tipo de la varialbe es <?php echo gettype($c) ?></li>
            <li>$d = "Hola Caracola"Valor de la variable -<?php echo $d ?>- </li>
            <li> Tipo de la varialbe es <?php echo gettype($d) ?> </li>
            <li>$e = null Valor de la variable -<?php echo $e ?>-</li>
            <li> Tipo de la varialbe es <?php echo gettype($e) ?></li>
            <li> $f variable no creada previamente valor -<?php echo $f ?>-</li>
            <li>Tipo de la varialbe no creada es <?php echo gettype($f) ?> </li>
            
            <li>
                <!--Para obtener los valores de ASCII utilizo un for que me recorra desde un límite a otro
                y con la funcion chr obtengo el caracter y lo guardo en string-->
                <?php
                for ($i = 64; $i <= 122; $i++) {
                    $str = chr($i);
                    echo "  " . "[$i : $str] " . "  ";
                }
                ?>;
            </li>
            
            <!--Imprimo la fecha con el formato que quiero-->
            <li> Fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?></li>
            
            <li> Días desde el 1/1/1998 <?php echo $dias ?> días </li>
            <li> Horas desde el 1/1/1970 <?php echo $horas ?> horas </li>
            <li> Minutos desde el 1/1/1970 <?php echo $minutos ?> minutos </li>
            
            <!--Imprimo una fecha con el formato que le ponga y le pongo el idioma con setlocale-->
            <li> Fecha con formato personalizado - <?php
                setlocale(LC_TIME, "es_ES.UTF-8");
                echo strftime("%d, %A de %B del %G");
                ?>-</li>
            
            <li> Fecha <?php echo date_format($fechanac, "d-m-Y") ?><br> </li>
            
            <!--Imprimo las fechas en el formato que quiero e indico el intervalo con el formato que quiero sea años, meses, dias-->
            <li> Fecha de nacimiento 7/1/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo->format('%Y'); ?> años </li>
            <li> Fecha de nacimiento 7/1/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo->format('%m '); ?> meses  </li>
            <li> Fecha de nacimiento 7/1/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo->format('%d'); ?>  dias.  </li>
            <li> Fecha <?php echo date_format($fechanac2, "d-m-Y") ?><br> </li>
            <li> Fecha de nacimiento 1/12/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo2->format('%Y  '); ?> años </li>
            <li> Fecha de nacimiento 1/12/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo2->format('%m '); ?> meses  </li>
            <li> Fecha de nacimiento 1/12/1998; fecha actual <?php echo date_format($fechahoy, "d-m-Y") ?> tienes <?php echo $intervalo2->format('%d'); ?>  dias.  </li>
            
             <!--Imprimo las variables y las explico cuando el enunciado lo indica-->
            <li> <?php print_r(getdate()) ?></li>
            <li> La anterior salida es un print_r de lo que retorna getdate(), cuyo significado es: Devuelve un array con todos los datos de la fecha actual desde el año hasta los segundos.</li>
            <li> <?php print_r(getdate(1)) ?> </li>
            <li> La anterior salida es un print_r de lo que retorna getdate(1), cuyo significado es: Devuelve un array con todos los datos de la fecha Linux </li>
            <li>Variable -strtotime("now")- <?php echo $sHoy ?></li>
            <li>Significado de -strtotime("now")- : Devuelve el número de segundos transcurridos desde 01/01/1970 hasta la actualidad</li>  
            <li>Variable -date("d-m-Y",strtotime("now"))- <?php echo $fHoy ?> </li>
            <li>Significado de -date("d-m-Y",strtotime("now"))- : Muestra la fecha actual</li>
            <li>Variable -strtotime("27 September 1970")- <?php echo $sSep70 ?> </li>
            <li>Significado de -strtotime("27 September 1970")- : Devuelve el número de segundos transcurridos desde 01/01/1970 hasta la fecha introducida en el paréntesis del strtotime</li>
            <li>Variable -date("d-m-Y",strtotime("10 September 2000"))- <?php echo $sSep2000 ?> </li>
            <li>Significado de -date("d-m-Y",strtotime("10 September 2000"))- : Muestra la fecha del 10 de Septiembre del 2000</li>
            <li>Variable -strtotime("+1 day")- <?php echo $sDia ?> </li>
            <li>Significado de -strtotime("+1 day")- : Devuelve el número de segundos pasados desde 01/01/1970 hasta mañana</li>
            <li>Variable -date("d-m-Y",strtotime("+1 day"))- <?php echo $fDia ?> </li>
            <li>Significado de -date("d-m-Y",strtotime("+1 day"))- : Muestra la fecha de mañana</li>
            <li>Variable -strtotime("+1 week")- <?php echo $sSem ?> </li>
            <li>Significado de -strtotime("+1 week")- : Te muestra el número de segundos transcurridos desde 01/01/1970 hasta una semana despues</li>
            <li>Variable -date("d-m-Y",strtotime("+1 week"))- <?php echo $fSem ?> </li>
            <li>Significado de -date("d-m-Y",strtotime("+1 week"))- : Muestra la fecha del día tras sumarle a hoy una semana.</li>
            <li>Variable -strtotime("+1 week 2 days 4 hours 2 seconds")- <?php echo $sProx ?> </li>
            <li>Significado de -strtotime("+1 week 2 days 4 hours 2 seconds")- : Devuelve el número de segundos pasados desde 01/01/1970 hasta dentro de una semana, dos dias, cuatro horas y dos segundos</li>
            <li>Variable -date("d-m-Y",strtotime("+1 week 2 days 4 hours 2 seconds"))- <?php echo $fProx ?> </li>
            <li>Significado de -date("d-m-Y",strtotime("+1 week 2 days 4 hours 2 seconds"))- : Muestra la fecha del día al sumarle a la fecha actual, una semana, dos dias, cuatro horas y dos segundos</li>
            <li>Variable -strtotime("next Thursday")- : <?php echo $sJueves ?></li>
            <li>Significado de -strtotime("next Thursday")- : Te covierte "next Thursday" a el numero de segundos pasados desde 01/01/1970 hasta el próximo jueves</li>
            <li>Variable -date("d-m-Y", strtotime("next Thursday"))- : <?php echo $fJueves ?></li>
            <li>Significado de -date("d-m-Y", strtotime("next Thursday"))- : Te muestra en una fecha con el formato d-m-y la fecha del próximo Jueves.</li>
            <li>Variable -strtotime("last Monday")- : <?php echo $sLunes ?></li>
            <li>Significado de -strtotime("last Monday")- : Te covierte "last Monday" a el numero de segundos pasados desde el 01/01/1970 hasta el pasado lunes</li>
            <li>Variable -date("d-m-Y", strtotime("last Monday"))- : <?php echo $fLunes ?></li>
            <li>Significado de -date("d-m-Y", strtotime("last Monday"))- : Te convierte en una fecha con el formato d-m-y el pasado lunes.</li>
        </ol>
    </div>
</body>
</html>
