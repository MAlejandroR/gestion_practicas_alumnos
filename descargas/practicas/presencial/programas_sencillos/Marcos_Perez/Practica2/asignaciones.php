<?php 
$a=5;
$b=5.7;
$c=0b100001;
$d="hola caracola";
$e=5+9;
$f="hola"."caracola";
$g="hola caracola";
$h=($v=8);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Expresión asignada</th>
                <th>Valor de la expresión</th>
            </tr>

            <tr>
                <td>$a=5</td> 
                <td>-<?php echo $a ?>-</td> 
            </tr>

            <tr>
                <td>$b=5.7</td> 
                <td>-<?php echo $b ?>-</td> 
            </tr>
            <tr>
                <td>$c=0b100001</td> 
                <td>-<?php echo dechex($c) ?>-</td>
            </tr>

            <tr>
                <td>$d="hola caracola"</td> 
                <td>-<?php echo $d ?>-</td>
            </tr>

            <tr>
                <td>$e=5+9</td> 
                <td>-<?php echo $e ?>-</td>
            </tr>

            <tr>
                <td>$f="hola"."caracola"</td> 
                <td>-<?php echo $f ?>-</td>
            </tr>

            <tr>
                <td>$a= print("hola caracola")</td> 
                <td>-<?php print $g=true ?>-</td>
            </tr>

            <tr>
                <td>$h=($v=8)</td>
                <td>-<?php echo $h ?>- </td>
            </tr>
   
        </table>
 <?php header("Refresh:2; url=index.php"); ?>
    </body>
</html>


