<?php

$intentos = $_POST['num_intentos'];

if (isset($_POST['submit'])){
    

    switch($_POST['submit']) {

    case 'reiniciar':
        $archivo= fopen("log.txt", "a");
        fwrite($archivo,"REINICIADO".PHP_EOL);
        fclose($archivo);
    case 'empezar':
        
        $contador=$intentos;
        $min = 1;
        $max =pow(2, $intentos);
        $archivo= fopen("log.txt", "a");
        fwrite($archivo,"EMPIEZA EL JUEGO".PHP_EOL);
        fclose($archivo);
      


        break;

    case 'jugar':
        $num =$_POST['num'];
        $contador=$_POST['contador'];
        $contador --;
        
        if($contador >0){
            switch ($_POST['opcion']){
            case '>':

                $min = $num;
                $max=$_POST['max'];
                $log =date("d-m-y h:i:s",time())."num".PHP_EOL;
                fwrite($archivo, $log);
                fclose($archivo);
            break;
            case '<':
            $max=$num;
            $min=$_POST['min'];
            $log =date("d-m-y h:i:s",time())."num".PHP_EOL;
                fwrite($archivo, $log);
                fclose($archivo);
           
        
            break;
            case '=':
            $contador = $_POST['contador'];
            $diferencia=$intentos-$contador;
            echo "Has acertado en $diferencia intentos";
            $log =date("d-m-y h:i:s",time())."num".PHP_EOL;
                fwrite($archivo, $log);
                fwrite($archivo, "GAME OVER");
                fclose($archivo);
             $fclose($archivo);        
             break; 
        
            }
          } else {
        
                $msj='No has acertado';
            }

    break;
     
    case 'volver':
        header("Location:index.php?checks=$intentos");
        exit();
}

$num = round((($min + $max) / 2));
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <form action="jugar.php" method="POST">
            <h3><?php echo "El numero es $num?"; ?></h3>
            <h3>Intentos: <?php echo " $intentos"; ?></h3>

            <fieldset>
                <h3>Intervalo</h3>
                
                    <input type="radio" name="opcion" value=">"id ="">Mayor<br/>
                    <input type="radio" name="opcion" value="<"id ="">Menor<br/>
                    <input type="radio" name="opcion" value="="id ="">Igual<br/>
                    
            </fieldset>
                    <input type="submit" value="jugar" name="submit" >
                    <input type="submit" value="volver" name="submit">      
                    <input type="submit" value="reiniciar" name="submit">
                </form>
       </fieldset>

    </body>
</html>