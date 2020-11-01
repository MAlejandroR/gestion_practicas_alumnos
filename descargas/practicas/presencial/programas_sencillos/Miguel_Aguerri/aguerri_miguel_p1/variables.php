
<?php
header('Refresh: 2; URL=index.php');
$v1=125;
$v2=0574;
$v3=0xAbC12;
$v4=0b1100;
$v5="Esto es una cadena de caracteres"; 
$v6='Esto es otra cadena de caracteres'; 
$v7= <<<FIN
         <pre>
               Esto es una cadena
               multilínea
               y termina aquí
         </pre>
FIN;
$v8= <<<FIN
         <pre>
                Esto es una cadena
               multilínea
               y termina aquí
         </pre>
FIN;
$v9=1.23432230003322014000002234101; 
$v10=1234E-2; 
$v11=null; 
$v12=true; 
$v13=false; 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Las variables se muestran asi:</h1>
        <?php
        print "$v1<br/>";
        print "$v2<br/>";
        print "$v3<br/>";
        print "$v4<br/>";
        print "$v5<br/>";
        print "$v6<br/>";
        print "$v7<br/>";
        print "$v8<br/>";
        print "$v9<br/>";
        print "$v10<br/>";
        print "$v11<br/>";
        print "$v12<br/>";
        print "$v13<br/>";
        ?>
    </body>
</html>

