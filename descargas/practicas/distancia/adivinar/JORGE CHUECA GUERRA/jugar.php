<?php

$boton = $_POST["submit"];
$numIntentos = $_POST["num_intentos"];
$numero; $maximo; $minimo; $jugada; $maximoAbsoluto;

if ($boton == "empezar" || $boton == "reiniciar") {

    switch ($numIntentos) {
        case 10:
            $numero = 512;
            break;
        case 16:
            $numero = 32768;
            break;
        case 20:
            $numero = 524288;
            break;

        default:
            break;
    }
    
    $maximoAbsoluto = $numero * 2;
    $maximo = $maximoAbsoluto;
    $minimo = 0;
    $jugada = 0;

}else if ($boton == "volver"){
	header("Location:index.php");
}else{	//boton == "jugar"

    $signo = $_POST['signo'];
    $numero = $_POST["num"];
    $maximo = $_POST["max"];
    $minimo = $_POST["min"];
    $jugada = $_POST["jugada"];
    $maximoAbsoluto = $_POST["maxAbsoluto"];
    
    if($signo == "mayor"){
        $minimo = $numero; 
    }else if($signo == "menor"){
        $maximo = $numero;
    }else{//Si el signo es "igual"
	$texto = "Ves qué listo que soy!!! En $jugada jugadas!!!";
	header("Location:fin.php?texto=$texto");
    }
    
    $jugada++;
    
    if ($jugada >= $numIntentos){
        
        if($numero-1 == 0 && $signo == "menor"){
            $numero = 0;            
        }else if ($numero+1 == $maximoAbsoluto && $signo == "mayor") {
            $numero = $maximoAbsoluto;            
        }else if ($signo != "igual"){//Supera el número de intentos
            $texto = "No has sido sincera/o, debería de haberlo acertado ya!!!";
            header("Location:fin.php?texto=$texto");
        } 
    }else{
        $numero = ($maximo - $minimo) / 2 + $minimo;
    }  
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 3</title>
    </head>
    <body style="width: 60%;float:left;margin-left: 20%; ">

        <fieldset style="width:40%;background:bisque ">
            <legend>Empieza el juego</legend>
            <form action="jugar.php" method="POST" >
                
                <h2> El número es <?php echo $numero ?> ?</h2>
                <h5> Jugadas realizadas <span style=" color:darkred"><?php echo $jugada ?></span> Jugadas restantes <span style=" color:darkred"><?php echo $numIntentos - $jugada ?></h5>

                <input type="hidden" value="<?php echo $numIntentos ?>" name="num_intentos">
                <input type="hidden" value="<?php echo $numero ?>" name="num">
                <input type="hidden" value="<?php echo $maximo ?>" name="max">
                <input type="hidden" value="<?php echo $minimo ?>" name="min">
                <input type="hidden" value="<?php echo $jugada ?>" name="jugada">
                <input type="hidden" value="<?php echo $maximoAbsoluto ?>" name="maxAbsoluto">
                <fieldset>
                    <legend>Indica cómo es el número que has pensado</legend>
                    <input type="radio" name="signo" value='mayor' checked> Mayor<br />
                    <input type="radio" name="signo" value='menor'> Menor<br />
                    <input type="radio" name="signo" value='igual'> Igual<br />
                </fieldset>
                <hr />
                <input type="submit" name="submit" value="jugar">
                <input type="submit" name="submit" value="reiniciar">
                <input type="submit" name="submit" value="volver">

            </form>
        </fieldset>
    </body>
</html>