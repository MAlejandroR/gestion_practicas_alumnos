<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP</title>
        <style>
            body{
                text-align: center;
            }
            div{
                display: inline-block;
                width: 70%;
                height: auto;
                font-family:cursive;
                background-color: #5FB404;
            }
        </style>
    </head>
    <body>
        <div>
        <?php
        echo "<h2><b>Print VS EchoO</b></h2>";
//Defino dos variables con mi nombre y apellidos
        $nombre = "Erick";
        $apellido = "Cupueran";

//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
        // mi nombre es "manolo" y mi apellido es "romero"
        echo "<b>Con echo <br/></b>Mi nombre es $nombre y mi apellido es $apellido<br/>";
//1)con echo pasando varios argumentos (separadados por coma)
//2)con print  
        //Explica en el fichero diferencias entre echo y print y semejanzas.
        //Por qué puedo pasar los argumentos sin usar paréntesis
        print "<b>Con print <br/></b>Mi nombre es $nombre y mi apellido es $apellido <br/>";
        echo "<b>Diferencias entre ECHO y PRINT en php</b><br/>";
        echo "1. print imprime una cadena, echo puede imprimir más de una separadas por coma, ejemplo:<br/>"
        . "print 'Hola';<br/>
            echo 'Hola', 'Hola de nuevo';<br/>";
        echo "<b>print</b> devuelve un valor int que según la documentación siempre es 1,"
        . " por lo que puede ser utilizado en expresiones mientras que echo es tipo void, "
        . "no hay valor devuelto y no puede ser utilizado en expresiones:<br/>"
        . "
        Se imprime 'Hola' y la variable $-foo toma el valor 1<br/>
        $-foo = print 'Hola'<br/>;
        //La siguiente expresión da error<br/>
        $-foo = echo 'Hola';<br/>";
        echo "<b>Semejanzas Print y Echo</b><br/>"
        . "Ambas funciones nos permiten mostrar un output en pantalla y ambas funciones no llevan paréntesis al momento de llamarlas. <br/><hr/>";


        /* Sintaxis heredoc, */
        echo "<h2><b>Sintaxis heredoc</b></h2>";
//Asigna a una variable llamada informe un texto de cinco líneas,
        //la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es
// aquí aparecer el contenido del infoorme
        // respetando el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)
        $informe = <<<FIN
                <pre>
                Esto es un linea
                esto es la linea 2
                esto es la linea 3
                esto es la linea 4
                y esto es la linea 5
                </pre>
FIN;
        echo "El contenido de la variable informe es: " . $informe . "<br/><hr/>";



        echo "<h2><b>Probando variables</b></h2>";
        /* PROBANDO VARIABLES */
//Crea una variable y asígnale un valor
//visualiza el valor de la variable y el tipo que eś
//Cambia a los siguientes tipos (boolean, float, string y null y visualizar su valor)
//Prueba a ver el valor y tipo de una variable no definida previamente
        /* VISUALIZA LAS VARIABLES USANDO LA FUNCION printf */
        $v = 4;
        echo "El valor de la varible v es $v tipo int</br>";
        $v2 = true;
        echo "El valor de la varible v2 es $v2 tipo boolean</br>";
        $v3 = 4.4;
        echo "El valor de la varible v3 es $v3 tipo float</br>";
        $v4 = "hola";
        echo "El valor de la varible v4 es $v4 tipo string</br>";
        $v5 = null;
        echo "El valor de la varible v5 es $v5  con null</br><hr/>";


        echo "<h2><b>Codigo ascii</b></h2>";
        $string = "";
        for ($i = 64; $i <= 122; $i++) {
            $string = "$i= " . chr($i) . "   ";
            echo $string;
        }
        echo "<br/><hr/><br/><h2><b>Función time</b></h2>";
        //Visualiza el contenido de la función time() y explica su valor
        echo " Función time(): " . time() . "<br/>";
        echo "Devuelve el momento actual como el número de segundos de la Época Unix (1 de enero de 1970 00:00:00 GMT).<br/>";
//Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número
        echo "<br/><hr/><br/><h2><b>Fechas</b></h2>";
        $dia = date("d");
        $mes = date("m");
        $anyo = date("y");
        echo "<b>Fecha actual: $dia - $mes - $anyo</b>";


//Obtener los días, luego meses y luego años transcurridos desde el 1/1/1970 (round() o floor() para redondear
        echo "<br/><b>Dias, meses y años transcurridos desde 1/1/1970</b> <br/>";
        //para sacar los dias, meses y años hice una regla de 3 
        //es decir si un dia(24horas) tiene 86400 segundos cuantos dias tendra en 1539847728 segundos(son los segundos que han pasado desde 
        //1970)
        //lo mismo para meses y años
        $dias = round((time() * 1) / 86400);
        $meses = round((time() * 1) / 2678400);
        $anyos = round((time() * 1) / 31536000);
        echo "Dias que han pasado desde 1970: $dias<br/>";
        echo "Meses que han pasado desde 1970: $meses<br/>";
        echo "Años que han pasado desde 1970: $anyos<br/>";
// Obtén la fecha actual con formato por ejemplo
// Lunes, día 25 de enero de 2013
        echo "<br/><b>Fecha actual con formato </b><br/>";

        echo date("l") . ", day " . date("d") . " of " . date("F") . " of " . date("Y") . "<br/>";
//Asigna a una variable la fecha de tu cumpleaños        
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
//        echo "Fecha de nacimiento $cumpleA fecha actual $fechaAc tienes " . (2018 - 1996)."años<br/>";
//        echo "Fecha de nacimiento $cumpleA fecha actual $fechaAc tienes ".(22*12)."meses<br/>";
        //  // tienes 23 años, 10 meses y 4 días
//Asigna a una variable una fecha de 30/10/1969
// Obtén su edad en años, en meses y luego en días siempre redondeando
        //tienes 23 años
        // tienes 286 meses
        // tienes 8737 días
$edad = calcular_edad('1996-07-05');
//        $cumpleA = " 05/07/1996";
        $fechaAc = $dia . "/" . $mes . "/" . $anyo;
        
        //creo esta funcion para saber la años, meses y dias de la persona
               function calcular_edad($fecha){
$fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
return $edad;
}
 
 

echo "Mi Fecha<br/>Fecha actual $fechaAc Tienes {$edad->format('%Y')} años y {$edad->format('%m')} meses {$edad->format('%d')} dias <br/>"; // Aplicamos un formato al objeto resultante de la funcion
  $edad2 = calcular_edad('1969-10-30');
  echo "Persona 2 1969-10-30 <br/>Fecha actual $fechaAc Tienes {$edad2->format('%Y')} años y {$edad2->format('%m')} meses {$edad2->format('%d')} dias <br/>"; // Aplicamos un formato al objeto resultante de la funcion

//. Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
  $edad3 = calcular_edad('1969-01-01');
  echo "Persona 3  1969-01-01  <br/>Fecha actual $fechaAc Tienes {$edad3->format('%Y')} años y {$edad3->format('%m')} meses {$edad3->format('%d')} dias <br/>"; // Aplicamos un formato al objeto resultante de la funcion

//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
        echo "<hr>";
        echo "<b>strtotime — Convierte una descripción de fecha/hora textual en Inglés a una fecha Unix</b><br/>";
        echo "<b>now<br/>
La marca de tiempo que se usa como base para el cálculo de las fechas relativas.</b><br/>";
        echo strtotime("now"), "<br/>";
        
        echo "<b>Te devuelve la fecha actual <br/></b>";
        echo date('d-m-Y', strtotime("now")), "<br/>";
        
        echo "<b>Con vierte la fecha 27 de sep 1970 a un valor de tiempo</b> <br/>";
        echo strtotime("27 September 1970"), "<br/>";
        
        echo "<b>En este caso coge el mes de sep pasandolo a número del mes </b><br/>";
        echo date('d-m-Y', strtotime("10 September 2000")), "<br/>";
        
        echo "<b>Convierte la fecha actual a un valor de tiempo agregandole un día</b><br/>";
        echo strtotime("+1 day"), "<br/>";
        
        echo "<b>Recoge ese día agregado es decir que indicara el día de mañana </b><br/>";
        echo date('d-m-Y', strtotime("+1 day")), "<br/>";
        
        echo "<b>Añade una semana</b> <br/>";
        echo strtotime("+1 week"), "<br/>";
        
        echo "<b>Añade una semana a la fecha actual e imprime la fecha una semana despues</b><br/>";
        echo date('d-m-Y', strtotime("+1 week")), "<br/>";
        
        echo "<b>Añade una seman 2 dias, 4 horas y 2 segundo a la fecha actual</b><br/>";
        echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
        echo date('d-m-Y', strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
 
        echo "<b>Imprime la fecha del seguiente jueves next thursday</b><br/>";
        echo strtotime("next Thursday"), "<br/>";
        echo date('d-m-Y', strtotime("next Thursday")), "<br/>";
          echo "<b>Imprime la fecha del sdel lunes pasado last Monday</b><br/>";
        echo strtotime("last Monday"), "<br/>";
        echo date('d-m-Y', strtotime("last Monday")), "<br/>";
        echo "<hr>"
        ?>
            </div>
    </body>
</html>