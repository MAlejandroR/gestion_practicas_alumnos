<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		
		$nombre = jorge;
		$apellido = sanchez;
		$informe = <<<FIN
<pre>
esta es la primera
a continuación va la segunda
la tercera ya en el medio
la cuarta que es la penúltima
y la última la quinta
</pre> 
FIN;
		
		
		echo $nombre, $apellido;
		
		
                echo "Con echo mi nombre es " . $nombre . " y mi apellido es " . $apellido;
                print "<br />Con print mi nombre es " . $nombre . " y mi apellido es " . $apellido;
                echo "<br />La diferencia entre echo y print es que print puede imprimir una cadena y echo puede imprimir mas de una separada por comas";
		
		echo "La variable \$informe contiene " . $informe;
                
                $variable = 7;
                echo "La variable \variable contiene " . $variable . " y es de tipo ". gettype($variable);
                $variable = true;
                echo "La variable \variable contiene " . $variable . " y es de tipo ". gettype($variable);
                $variable = "pepe";
                echo "La variable \variable contiene " . $variable . " y es de tipo ". gettype($variable);
                $variable = 5.4;
                echo "La variable \variable contiene " . $variable . " y es de tipo ". gettype($variable);
                $variable = null;
                echo "La variable \variable contiene " . $variable . " y es de tipo " . gettype($variable);
				
				$dia = date("d");
				$mes = date("m");
				$anio = date("y");
				
				echo "Fecha de hoy por separado: " . $dia . "-" . $mes . "-" . $anio; 
				
				echo 'Fecha de hoy:            '. date('d-m-Y') ."<br/>";
                
				$cumpleanos = new DateTime("1997-10-21");
				$hoy = new DateTime();
				$annos = $hoy->diff($cumpleanos);
				echo "mi edad es " . $annos->y;

				$dia1 = round((time())/86400);
				$mes1 = round((time())/2678400);
				$anio1 = round((time())/31536000);
				
				echo "Años desde 1970 " . $anio1;
				echo "Meses desde 1970 " . $mes1;
				echo "Dias desde 1970 " . $dia1;
        ?>
    </body>
</html>