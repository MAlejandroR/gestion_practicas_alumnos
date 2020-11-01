<?php
var_dump($_POST);

$intervalo = filter_input(INPUT_POST, 'intervalo');



switch ($_POST['submit']) {
    case 'reiniciar': //he presionado reiniciar en jugar.php
        header("Refresh:2;url=indexAkinator.php");
        break;
    case 'empezar'://vengo del index
        $max = pow(2, $intervalo);
        $min = 0;

        break;
       
    case 'jugar': //He presiondo jugar en jugar.php
        $min = filter_input(INPUT_POST, 'numMin');
        $max = filter_input(INPUT_POST, 'numMax');
        $pista = filter_input(INPUT_POST, 'pista');
        $intentos = filter_input(INPUT_POST, 'numintentos');
        $num_maq = filter_input(INPUT_POST, 'num_maquina');
        
        
        
    
        
        if ($pista == 'mayor'){
            $min = $num_maq;
            
            echo "esta es nummax  $max";
        }
        elseif ($pista == 'menor') {
          $max = $num_maq;  
        
        }
        else{
            header("Location:finAkinator.php?jugada=$jugada&intentos=$intentos&num=$generado");
        }
        
        $intentos++;
        break;
        

    default: //han escrito la url directamente y no quiero...
        header("Refresh:2;url=indexAkinator.php");
        $msj = "Debes  hacer las cosas bien";
}

$num_maq=($min+$max)/2;


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <form action="juegoAkinator.php" method="POST">
            <h2>Dale pistas a la aplicación o ¡dile que ha acertado!</h2>

            <input type="text" value="<?= $num_maq ?>" name="num_maquina"><br>
            

            <input type="radio" name="pista" value="mayor">Mayor <br>
            <input type="radio" name="pista" value="menor">Menor <br>
            <input type="radio" name="pista" value="acierto">Has acertado! <br>
            <input type="submit" value="jugar" name="submit">
            <input type="submit" value="reiniciar" name="submit"><br>
            Intentos:<input type="text" value="<?= $intentos ?>" name="numintentos"> 

            <input type="hidden" value="<?= $min ?>" name="numMin"><br>
            <input type="hidden" value="<?= $max ?>" name="numMax">


        </form>
<?= $msj ?>



    </body>
</html>

