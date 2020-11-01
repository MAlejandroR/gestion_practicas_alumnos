
<?php

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Programa Básicos Php</title>
    </head>
    <body>
        
        <?php
        
        $nom = "\"Diego\"";
        $apellido= "\"Chuquiguanga\"";
        
        $informe=<<<FIN
Una máquina puede hacer el 
trabajo de cincuenta hombres 
ordinarios, pero ninguna máquina 
puede hacer el trabajo de 
un hombre extaordinario
FIN;
          
        $variable = 3;
      
        //Ejercicio1
        print $nom;
        print $apellido;
        echo "<br/>";
        echo "<br/>";
        echo $nom,$apellido;
        echo "<br/>";
        echo "<br/>";
        /* Diferencias entre echo y pirnt.- print imprime una cadena, echo puede imprimir mas de una separadas por comas.
         * Semejanza entre los dos echo es ligeramente más rápido que print, además print devuelve un valor int que según la 
         * documentacion siempre es 1 lo cual puede ser utilizado para expresiones, mientras echo es tipo void, no hay valor 
         * devuelto y no puede ser usado para expresiones*/
        
        /*los constructores de lenguaje como es el caso de print y echo no requieren de parentesis*/
        

        //Ejercicio2
        echo $informe;
        echo "<br/>";
        echo "<br/>";
         
        //Ejercicio3
        echo "El valor de la variable es ". $variable." y el tipo de variable es ". gettype($variable);
        $variable = true;
        echo "<br/>";
        echo "<br/>";
        printf("El valor de la variable es %s  y el tipo de variable es %s ",$variable, gettype($variable));
        
        $variable = 23.45;
        echo "<br/>";
        echo "<br/>";
        printf("El valor de la variable  es %f y el tipo de variable es %s ",$variable, gettype($variable));
        
        $variable = "hola mundo";
        echo "<br/>";
        echo "<br/>";
        printf("El valor de la variable  es %s y el tipo de variable es %s ",$variable, gettype($variable));
        
        $variable = null;
        echo "<br/>";
        echo "<br/>";
        printf("El valor de la variable  es %s y el tipo de variable es %s ",$variable, gettype($variable));
        
        $variable;
        echo "<br/>";
        echo "<br/>";
        printf("El valor de la variable  es %s y el tipo de variable es %s ",$variable, gettype($variable));
        
        //Ejercicio4 
        echo "<br/>";
        echo "<br/>";
        echo "el valor de la funcion time() es ".time();
        /*Devuelve el momento actual medido como el número de segundos desde 
         * la Época Unix (1 de Enero de 1970 00:00:00 GMT).*/
        echo "<br/>";
        echo "<br/>";
        echo "fecha actual:  ".date('d-m-Y');
        
        echo "<br/>";
        echo "<br/>";
        echo "fecha actual:". date('l').", ".date('d')." de ".date('F')." de ". date('Y');
        
        
        echo "<br/>";
        $fecha= strtotime( date("d-m-Y"));
        $f_nac= date("Y",strtotime( date("d-m-Y")-strtotime("04/01/1989")));
        echo "valor f_nac".$f_nac;
        
        
        //Ejercicio5
        
        echo "<hr>";
        echo strtotime("now"), "<br/>";
        //now marca de tiempo que usa como base para el cálculo de las fechas relativas, 
        //su formato comprende el numero de segundos desde 1 de enero 1970 hasta ahora  
        echo date('d-m-Y', strtotime("now")), "<br/>";
        //se muestra  formato de dìa mes año de la fecha actual
        echo strtotime("27 September 1970"), "<br/>";
        echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
        echo strtotime("+1 day"), "<br/>";
        //se muestra el número de segundos desde el 1-1-1970 mas un día 
        echo date('d-m-Y',strtotime("+1 day")), "<br/>";
        //se muestra el cálculo de segundos hasta la fecha mas un día con formato de día mes año
        echo strtotime("+1 week"), "<br/>";
        //se muestra los segundos desde 1-1-1970 hasta la fecha mas unas semana 
        echo date('d-m-Y',strtotime("+1 week")), "<br/>";
        //se muestra el cálculo de segundos hata la fecha mas una semana en formato de día mes año
        echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
        //se muestra el número de segundos desde el 1-1-1970 mas la seman, 2 días, 4horas y 2 segundos
        echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
        //se muestra el cálculo de segundo hasta la fecha mas una semana, 2días, 4 horas y 2 segundo con fomato de día-mes-año
        echo strtotime("next Thursday"), "<br/>";
        //se muestra el número de segundos desde el 1-1-1970 hasta la fecha, y contando los días hasta el jueves
        echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
        //se muestra el cálculo de la fecha actual mas los días hasta el jueves 
        echo strtotime("last Monday"), "<br/>";
        ////se muestra el número de segundos desde el 1-1-1970 hasta el anterior lunes 
        echo date('d-m-Y',strtotime("last Monday")), "<br/>";
        //se muestra el cáluculo de la fecha actual restando los días hasta el anterior lunes
        echo "<hr>";
        
        ?>
        
    </body>
</html>
