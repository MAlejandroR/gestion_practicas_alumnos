
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nom = "David";
        $ape = "Murcia";
        echo "1.Mi nombre es $nom", " y mi apellido es $ape <br/>";
        print "2.Mi nombre es $nom  y mi apellido es $ape <br/>";
        echo "3.echo puede imprimir más de una cadena separada por coma<br/>";
        echo "4.print imprime una cadena<br/>";
        echo "5.Ambos se pueden usar con y sin paréntesis<br/>";
        //Sintaxis heredoc
        $informe = <<<FIN
                        Esto que ves
                        es una cadena
                        multilínea
                        y termina
                        justo aqui
FIN;
        print_r("7.$informe");
        echo "<br/>";
        //Probando variables
        $var = 1;
        echo "8.\$var=$var, ";
        printf("Valor de la variable -$var- <br/>");
        echo("9.Tipo de la variable es ");
        printf(gettype($var));
        echo "<br/>";
        $var2 = true;
        echo "10.\$var2=true, ";
        printf("Valor de la variable -$var2- <br/>");
        echo("11.Tipo de la variable es ");
        printf(gettype($var2));
        echo "<br/>";
        $var3 = 7.25;
        echo "12.\$var3=$var3, ";
        printf("Valor de la variable -$var3- <br/>");
        echo("13.Tipo de la variable es ");
        printf(gettype($var3));
        echo "<br/>";
        $var4 = "Hola caracola";
        echo "14.\$var4=$v4, ";
        printf("Valor de la variable -$var4- <br/>");
        echo("15.Tipo de la variable es ");
        printf(gettype($var4));
        echo "<br/>";
        $var5 = null;
        echo "16.\$var5=null, ";
        printf("Valor de la variable -- <br/>");
        echo("17.Tipo de la variable es ");
        printf(gettype($var5));
        echo "<br/>";
        printf("18.\$a variable no creada previamente valor -$a-<br/>");
        echo("19.Tipo de la variable es ");
        printf(gettype($a));
        print '<br/>';
        echo time(), " la funcion time() devuelve el el tiempo en número de segundos";
        print '<br/>';
        echo "21.Fecha actual ", date('d-m-Y');
        ?>
    </body>
</html>
