<?php
    
    $edadRandom = rand(0, 150);
    $titulo = "Seleccion php";
    $mensaje = "Con " . $edadRandom . " años";

    switch (true){
        case $edadRandom >=0 && $edadRandom < 12:
            $mensaje .= " eres un niño";
            break;
        case $edadRandom >=12 && $edadRandom < 17:
            $mensaje .= " eres un adolescente";
            break;
        case $edadRandom >=17 && $edadRandom < 36:
            $mensaje .= " eres joven";
            break;
        case $edadRandom >=36 && $edadRandom < 66:
            $mensaje .= " eres un adulto";
            break;
        case $edadRandom >=66 && $edadRandom < 111:
            $mensaje .= " eres un juvilado";
            break;
        case $edadRandom <0 || $edadRandom > 110:
            $mensaje .=' "La edad no está contemplada en nuestra encuesta"';
            break;

    }
?>

<html>
    <head>
        <title><?php echo $titulo;?></title>
        <meta http-equiv="refresh" content="2;URL=index.php">
    </head>
    <body>
        <p><?php echo $mensaje;?> </p>
    </body>
</html>
