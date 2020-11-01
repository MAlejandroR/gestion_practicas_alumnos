<?php 
define("edad", 31);

$mensaje = "tienes ". edad ." años de edad </br>";

$años = 100-edad;

$mensaje2="te faltan $años para cumplir 100 años";

?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
 <?php 
 echo $mensaje ; 
 echo $mensaje2; 
 
 header("Refresh:2; url=index.php");
 ?>
    </body>
</html>
