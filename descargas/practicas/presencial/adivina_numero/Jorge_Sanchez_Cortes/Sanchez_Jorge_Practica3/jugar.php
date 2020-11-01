<?php
    $check0="";
    $check1=""; 
    switch ($_POST['enviar'])
    {
     case "Empezar":
            $n=filter_input(INPUT_POST, 'rango');
            switch ($n){
            case "p1":
                $intentos=10;
                $const=10;
                break;
            case "p2":
                $intentos=15;
                $const=15;
                break;
            case "p3":
                $intentos=20;
                $const=20;
                break;
            }
            $min=1;
            $max=$intentos;
            $ale=rand($min,$max);
            $numero=pow(2,$ale);
            $lim=pow(2,$max);
            break;
     case "Jugar":
            $option=filter_input(INPUT_POST,'option');
            $max=filter_input(INPUT_POST,'max');
            $min=filter_input(INPUT_POST,'min');
            $numero=filter_input(INPUT_POST,'num');
            $const=filter_input(INPUT_POST,'const');
            $intentos=filter_input(INPUT_POST,'int');
            switch($option){
                case "mayor":
                    if($lim>$numero){
                    $min=log($numero,2);
                    $numero=pow(2,$min+1);
                    $intentos--;
                    $check0="checked";
                    }
                    break;
                case "menor":
                   if(0<$numero){
                    $max=log($numero,2);
                    $numero=pow(2,$max-1);
                    $intentos--;
                    $check1="checked";
                   }
                    break;
                case "igual":
                    header("Location:http://localhost/Sanchez_Jorge_Practica3/fin.php");
                    break;
            }
            
            if($intentos==0){
               header("Location:http://localhost/Sanchez_Jorge_Practica3/fin.php");
            }
            
            break;
     case "Reiniciar":
            $option=$_POST['option'];
            $intentos=$_POST['int'];
            $numero=$_POST['num'];
            $intentos=$const;
            $max=$intentos;
            $min=1;
            $ale=rand($min,$max);
            $numero=pow(2,$ale);
            break;
    }

  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Juego</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css" type="text/css" />  
    </head>
    <body>
        <fieldset>
            <legend>Jugar</legend>
            <form action='jugar.php' method="post">
                <p>Tú número pensado es el <?php echo $numero; ?> ?</p>
                <p>Quedan <?php echo $intentos; ?> intentos</p>
                <input type="radio" name="option" value="mayor" <?php echo $check0; ?>>Mayor<br>
                <input type="radio" name="option" value="menor" <?php echo $check1; ?>>Menor<br>
                <input type="radio" name="option" value="igual">Igual<br>
                <input type="text" name="int" <?php echo "value='".$intentos."'";?>><br>
                <input type="text" name="const" <?php echo "value='".$const."'";?>><br>
                <input type="text" name="num" <?php echo "value='".$numero."'";?>><br>
                <a href="index.php"><input type="button" value="Volver"></a>
                <input type="submit" name="enviar" value="Reiniciar">
                <input type="submit" name="enviar" value="Jugar">
            </form>
        </fieldset>
    </body>
</html>
