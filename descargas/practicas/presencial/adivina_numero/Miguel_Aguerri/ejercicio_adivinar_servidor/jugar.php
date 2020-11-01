<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

if (isset($_POST['jugar'])) {
    $count = filter_input(INPUT_POST,'count');
    if ($count==10) {
       echo "<h1>Creo que no has sido muy legal jugando conmigo o he adivinado el número en el ultimo intento</h1>"; 
    }else{
            $opcion = filter_input(INPUT_POST, 'opcion');
            $numero = filter_input(INPUT_POST,'num');
            $max = filter_input(INPUT_POST,'max');
            $min = filter_input(INPUT_POST,'min');
            
            $count=$count+1;
            switch ($opcion){
                case 'mayor':
                    $min=$numero;
                      
                    
                    
                    $numero=($max+$min)/2;
                   
                    break;
                case 'menor':
                    $max=$numero;
                    
                    
                    
                        
                    $numero=($min+$max)/2;
                    
                    break;
                case 'igual':
                    echo "<h1>Lo he adivinado! Es el $numero y solo me ha costado $count intentos</h1>";
                    break;
            }
    }
}else{
   $numero = 512;
   $min = 0;
   $max = 1024;
   $count=0;

}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <fieldset style="width: 50%;float: left;margin-left: 20%;background: bisque">
            <legend>Empieza el juego</legend>
            <h2>El numero es <?=$numero?></h2>
            <form action="jugar.php" method="POST">
                <fieldset>
                 <legend>Indica cómo es el número que has pensado</legend>   
                 <input type="hidden" name="num" value="<?=$numero?>">
                 <input type="hidden" name="max" value="<?=$max?>">
                 <input type="hidden" name="min" value="<?=$min?>">
                 <input type="hidden" name="count" value="<?=$count?>">
                 <input type="radio" name="opcion" value="mayor" id="">Mayor<br />
                <input type="radio" name="opcion" value="menor" id="">Menor<br />
                <input type="radio" name="opcion" value="igual" id="">Igual<br />
                </fieldset>
                <h1>Intentos: <?=$count?></h1>
                <hr />
                <input type="submit" value="Jugar" name="jugar">
                <input type="submit" value="Reiniciar" name="reiniciar">
 
            </form>
        </fieldset>
        
    </body>
</html>