<?php
$intentos = filter_input(INPUT_POST,'intentos');
$msj = $intentos;
var_dump($msj);//no recupera los valores de la página jugar.Revisar 
?>

<!doctype html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>fin del Juego</title>
        <style>
          body{
                background: #F7F7F7;
            }
            h1{
                margin-left: 500px;
                text-align: center;
                margin-top:  200px;
                background:  #3B5998;
                color: white;
                border-radius: 23px;
                width:  800px;
            }
            fieldset{
                align-items: center;
                text-align: center;
                margin-top:  200px;
            }
            
        </style>
    </head>
    <body>
        <h1>¡ Enhorabuena !</h1>
        <fieldset >
            
            <h2> HE HACERTODO EL NUMERO <?=$msj?> !!</h1>
        </fieldset >
        </body>
</html>
