<?php
    $titulo = "iteracionesPhp";
    $num = 100*2;
    
    
    function sumaPrimerosPares($num){
        //los 100 primeros número pares llegan hasta el 200.
        for($i=0; $i<=$num; $i++){
            if ($i % 2 == 0) {
                $suma = $suma + $i;
            }
        }
        echo $suma;
    }
?>
<html>
    <head>
        <title><?php echo $titulo;?></title>
        <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>
        <p><?php sumaPrimerosPares($num)?> </p>
    </body>
</html>

