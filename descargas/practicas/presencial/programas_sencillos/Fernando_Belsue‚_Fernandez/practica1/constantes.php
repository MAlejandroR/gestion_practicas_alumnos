<?php
    define(edad, 26);
    const EDAD = 30;
    $resto = 100 - edad;
    
?>
<html>
    <head>
        <title><?php echo $titulo?></title>
        <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>
        <?php echo "Mi edad es " . edad . " años. ";
              echo "Me faltan $resto años para cumplir los 100.";  
        ?>
    </body>
</html>



