<!DOCTYPE html>
<?php
    //Inicializamos las variables que nos haran falta rescatando información de index.php
    if(isset($_POST['intentos'])){
        $inferior = 1;
        $numIntentos = $_POST['intentos'];
        $superior = (pow(2, $numIntentos));
        $numero = floor(($inferior + $superior)/2);
        $intento = 1;
        $resultado = '';
    } 
    
    //Si realizamos cualquier opción del radio button entonces rescatamos la accion y actuamos 
    //en consecuencia.
    if(isset($_POST['accion'])){
       
        $accion = $_POST['accion'];
        
        //Mediante un switch valoramos la accion a realizar.
        switch ($accion){
            
            //En caso de pulsar el botón "Volver" nos redirige hacia página index.php
            case 'Volver':
                header('Location:index.php');
                break;
            
            //Si pulsamos botón "Reiniciar" volvemos las variables a su punto inicial según opción.
            case 'Reiniciar':
                $numIntentos = $_POST['intentosMax'];
                $inferior = 1;
                $superior = (pow(2, $numIntentos));
                $numero = floor(($inferior + $superior)/2);
                $intento = 1;
                $resultado = '';
                break;
            
            //Si vamos a intentar adivinar el número.
            case 'Jugar':
            //Si hemos pulsado una opcion de radio primero rescatamos valores de los hidden y
            //damos valor a las variables.
            if(isset($_POST['resultado'])){
                $resultado = $_POST['resultado'];
                $numero = $_POST['num'];
                $inferior = $_POST['inf'];
                $superior = $_POST['sup'];
                $numIntentos = $_POST['intentosMax'];
                $intento = $_POST['nInt'];
                //Si la opción elegida es mayor entonces variamos el valor inferior que lo igualamos
                //al valor intermedio más 1, calculamos de nuevo el valor intermedio y aumentamos en 1
                //el número de intento.
                if($resultado == 'Mayor'){
                    $inferior = $numero + 1;
                    $numero = ceil(($inferior + $superior)/2);
                    $intento += 1;  
                
                //Si la opción es igual entonces habremos acertado por lo tanto nos dirigimos a la
                //página fin.php pasando el parámetro de número de intentos.
                }else if ($resultado == 'Igual'){
                    
                    header('Location:fin.php?intento=' . $intento);
                
                //Si la opción elegida es menor entonces variamos el valor superior que lo igualamos
                //al valor intermedio menos 1, calculamos de nuevo el valor intermedio y aumentamos en 1
                //el número de intento.
                }else if ($resultado == 'Menor'){
                    
                    $superior = $numero - 1;
                    $numero = floor(($inferior + $superior)/2);
                    $intento += 1;  
                
                }
            }else{
                //En caso que no se seleccione ninguna opción mostrara que hacer para reiniciar el juego.
                echo '<h1 style="color: #ff0000;">No has seleccionado ninguna opción, pulsa volver e inicia otra vez.</h1>';
            }
            break;

        }
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego adivina un número</title>
        <link rel="stylesheet" href="css/estilo_Index.css" type="text/css">
    </head>
    <body>
        <fieldset id="limites">
            <legend><h2>Empieza el juego</h2></legend>
            <h1>¿El número que has pensado es <?php echo $numero;?>?</h1>
            <h2>Jugada Nº <?php echo $intento?></h2>
            
            <fieldset>
                <legend><h2>Indica como es el número que has pensado</h2></legend>
                <form action="jugar.php" method="POST">
                    <input type="hidden" name="intentosMax" value="<?php echo $numIntentos;?>">
                    <input type="hidden" name="sup" value="<?php echo $superior;?>">
                    <input type="hidden" name="inf" value="<?php echo $inferior;?>">
                    <input type="hidden" name="num" value="<?php echo $numero;?>">
                    <input type="hidden" name="nInt" value="<?php echo $intento;?>">
                    
                    
                    <input type="radio" name="resultado" value="Mayor">Mayor<br>
                    <input type="radio" name="resultado" value="Menor">Menor<br>
                    <input type="radio" name="resultado" value="Igual">Igual<br>
                    <hr>
                    <input type="submit" name="accion" value="Jugar">
                    <input type="submit" name="accion" value="Reiniciar">
                    <input type="submit" name="accion" value="Volver">  
                </form> 
            </fieldset>
            
        </fieldset>
        
    </body>
</html>
