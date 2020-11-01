<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $mensaje=$_GET['mensaje'];
        $log=$_GET['log'];
        
        //mostramos mensaje
        echo "<h1> $mensaje</h1>";
        ?>
              
       
        <br />
        <hr />
        <h3>Tu jugada:</h3>
        <?php
            echo $log;
        ?>
        <br /><br />
        <a href="index.php">Reiniciar</>
    </body>
</html>
