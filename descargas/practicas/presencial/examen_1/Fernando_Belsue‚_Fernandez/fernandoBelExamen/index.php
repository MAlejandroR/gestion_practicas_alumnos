<?php
    spl_autoload_register(function ($clase) {
        require "$clase.php";
    });
    
    //session_start();
    
    $envio = filter_input(INPUT_POST, 'submit');
    
    if (isset($envio)) {
        
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina</title>
    </head>
    <body>
        <fieldset>
            <legend>Instrucciones</legend>
            <div>
                <p>Empieza el juego</p>
            </div>
            <form action="Jugar.php" method="POST">
                <input type="submit" name="submit" value="Jugar"/>
            </form>
        </fieldset>
        <?php
            
        ?>
    </body>
</html>
