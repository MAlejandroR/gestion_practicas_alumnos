<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	

$numero=rand(1,1000);
$titulo = "ternarioPhp";
echo "El número generado aleatoriamente es $numero<br />";
echo ($numero % 2 ? 'Impar' : 'Par');
?>
<html>
    <head>
        <title><?php echo $titulo ?></title>
        <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>

    </body>
</html>
