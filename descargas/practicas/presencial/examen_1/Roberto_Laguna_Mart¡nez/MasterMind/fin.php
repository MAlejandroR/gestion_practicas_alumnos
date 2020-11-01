<?php
$mensaje = filter_input(INPUT_GET, 'mensaje');
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>       
    </head>
    <body>        
        <fieldset style="width:40%; background: lemonchiffon; margin:0 auto; padding: 10px;">
            <legend><h2>Resultado final</h2></legend>
            <h1><span style="color: blue;"><?= $mensaje ?></span></h1>                        
        </fieldset>
</html>
