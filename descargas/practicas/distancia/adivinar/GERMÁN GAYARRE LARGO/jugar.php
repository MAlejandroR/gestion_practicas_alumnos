<?php

$numero = filter_input(INPUT_POST, 'num');
$intentos=0;
$min;
$max;
define(1, $numero);

echo $numero;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>juego</title>
    </head>
    <body>
    <?php 
        echo $numero;
     ?>
        <h1>Dime si tu numero es mayor menor o igual que el que visualizas</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<input type="hidden" name="num" value="<?php echo $num; ?>" />
<input type="radio" name="r" id="r1" value="<?php echo urlencode('<'); ?>" /> <label for="r1">Menor</label>
<input type="radio" name="r" id="r2" value="<?php echo urlencode('>'); ?>" /> <label for="r2">Mayor</label>
<input type="radio" name="r" id="r3" value="<?php echo urlencode('='); ?>" /> <label for="r3">Igual</label>
<div><input type="submit" value="Verificar" id="verificar"/></div>
    <?php
    
        if isset($_GET['verificar']){
            
            if($_GET['r1']){
                //calcular numero menor que el mostrado
                //si lleva mas intentos de los permitidos llevar al final con solucion false
                 if ($intentos<10{
                     
                    $intentos = $intentos+1 
                }else{
                       
                           header("Location:fin.php$solucion==false");
                    }
                }elseif($_GET['r2']){
                    //calcular numero mayor que el mostrado
                    //si lleva mas intentos de los permitidos llevar al final con solucion false
                if ($intentos<10{
                    
                    $intentos = $intentos+1 
                }else{
                       header("Location:fin.php$solucion==false");
                    }
                })
            }else{
                //llevar al final
                //al ser menor de 10 en intentos variable solucion se ira en true
                header("Location:fin.php$solucion==true");
            }
        }
    
    ?>

<div><input type="submit" value="reiniciar" id='reiniciar'/></div>
<?php
    
    if isset($_GET['reiniciar']{
        header("Location:jugar.php?$numero=num&$intentos=0");
    }
?>

<div><input type="submit" value="volver" id='volver'  /></div>
<?php
    if isset($_GET[ 'volver']{
        header("Location:index.html");
    }
 ?>
</form>
    </body>
</html> 
 










