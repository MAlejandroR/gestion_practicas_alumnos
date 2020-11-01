<?php 
$a = 5;
$a1 = 5.7;
$a2 = 0b0001;
$a3 = "hola caracola" ;
$a4 = 5+9;
$a5 = "hola"."caracola";
$a6 = print("hola caracola ");
$a7 = ($v = 8) ;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
            <h1>Variables en PHP</h1>
            <table border="1">
                <tr>
                    <th>Expresión asignada</th>
                    <th>Valor de la expresión</th>
                </tr>

                <tr><td>$a=5</td> <td>-<?php echo $a ?>-</td>
                </span>
                </tr>
                <tr><td>$a=5.7</td> <td>-<?php echo $a1 ?>-</td>
                </span>
                </tr>
                <tr><td>$a=0b100001</td> <td>-<?php echo $a2?>-</td>
                </span>
                </tr>
                <tr><td>$a="hola caracola"</td> <td>-<?php echo $a3  ?>-</td>
                </span>
                </tr>
                <tr><td>$a=5+9</td> <td>-<?php echo $a4 ?>-</td>
                </span>
                </tr>
                <tr><td>$a="hola"."caracola"</td> <td>-<?php echo $a5 ?>-</td>
                </span>
                </tr>
                <tr><td>$a= print("hola caracola")</td> <td>-<?php echo $a6 ?>-</td>
                </span>
                </tr>
                <tr><td>$a=($v=8)</td> <td>-<?php echo $a7 ?>-</td>
                </tr>
            </table>
            <br>
            <a href="index.php">Volver</a>
</body>

</html>