
<?php 
    //Se presiona el botón Jugar
    //Recogemos la variable del intervalo elegido por el usuario. La cogemos como el valor superior
    //Iniciamos el resto de variables, como el número de intentos
    if(isset($_POST['boton'])){  
       $estado=$_POST['estado'];  //Se recoge el valor de estado, mayor, menor o igual
       $opcion=$_POST['opcion'];  //Se recoge la opcion elegida por el usuario
       $superior=$_POST['superior'];  //Recoge el valor superior incial del rango a buscar
       $inferior=$_POST['inferior'];  //Recoge el valor incial del rango a buscar, incialmente 1 
       $numero=$_POST['numero'];  //La variablee numero recoge el numero adivinado
       $intentos=++$_POST['intentos'];  //La variable intentos lleva el numero de intentos. Parte de cero. 
       $limite=$_POST['limite'];
       //Dependiendo de la opción escogida por el usuario tiene un limite de intentos
       //Se comprueba con la ariable estado si es la primera vez que se entrea en el juego
       if(($opcion==1)&&(is_null($estado))){
         $superior=1024;
         $limite=10;
         $numero=$superior/2;  //El primer intento de adivinar, la mitad de los valores inferior y superior
       }else if(($opcion==2)&&(is_null($estado))){
         $superior=65536;
         $limite=16;
         $numero=$superior/2;  //El primer intento de adivinar, la mitad de los valores inferior y superior
       }else if(($opcion==3)&&(is_null($estado))){
         $superior=1048576;
         $limite=20;
         $numero=$superior/2;  //El primer intento de adivinar, la mitad de los valores inferior y superior
       }     
              
        //Comprueba que los intentos no se han superado
        if($intentos<=$limite){
            //Comprueba el estado pasado por el usuario, si el número es mayor, menor o igual
            if($estado=="mayor"){               
                $inferior=++$_POST['numero'];
                $numero=intval(($inferior+$superior)/2);  //Se calcula el nuevo numero a indicar adivinado
            }else if($estado=="menor"){
                $superior=--$_POST['numero'];
                $numero=intval(($inferior+$superior)/2);  //Se calcula el nuevo numero a indicar adivinado
            }
        }else{  //Se ha superado el límite
            header("Location:fin.php?mensaje=No has sido sincero, debería de haber acertado antes de $intentos intentos");
        }  
        if ($estado=="igual"){
                header("Location:fin.php?mensaje=Genial, lo he acertado en ". ($intentos-1)." intentos");
        }           
    }
    
    //Si se presiona el botón Volver
    //Se vuelve a la página inicial del juego
    if(isset($_POST['volver'])){ 
        header("Location:index.php");
    }
    
    //Si se presiona el botón Reiniciar
    //Reiniciamos variables
    if(isset($_POST['reiniciar'])){ 
       $estado=$_POST['estado'];  
       $opcion=$_POST['opcion'];
       $superior=$_POST['superior'];  
       $inferior=$_POST['inferior'];  
       $limite=$_POST['limite'];
       $numero=$_POST['numero']; 
       $intentos=$_POST['intentos'];
       //Miramos la opción que había elegido el jugador para reiniciar variables con unos valores u otros
       if($opcion==1){
         $intentos=1;
         $inferior=1;
         $superior=1024;
         $numero=$superior/2;
         $limite=10;
       }else if($opcion==2){
         $intentos=1;
         $inferior=1;
         $superior=65536;
         $numero=$superior/2;
         $limite=16;
       }else if($opcion==3){
         $intentos=1;
         $inferior=1;
         $superior=1048576;
         $numero=$superior/2;
         $limite=20;
       }
    }    
?>

</body>
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 03 - DWES | Fernando Cebrián Carreras</title>
    </head>
    <body>        
    <fieldset style="margin-left:25%;text-align: center;width:600px;border-color:blue">
    <legend><h2>COMIENZA EL JUEGO</h2></legend>
    <?php
        $valor=abs(($intentos)-($limite));  //Variable que almacena las jugadas que restan.
        echo "<h2>¿El número pensado es el $numero?</h2>";
        echo "<h3>Lo he intentado: $intentos veces. Jugadas restantes: ".$valor."</h3>";
    ?>
    <form action="jugar.php" method="POST">        
        <p>Indica como es el número que has pensado</p>
        <p><input type="radio" name="estado" value="mayor" checked> Mayor  <input type="radio" name="estado" value="menor"> Menor  <input type="radio" name="estado" value="igual"> Igual</p>
        <p><input type="hidden" name="intentos" value="<?php echo $intentos ?>"></p>
        <p><input type="hidden" name="superior" value="<?php echo $superior ?>"></p>
        <p><input type="hidden" name="opcion" value="<?php echo $opcion ?>"></p>
        <p><input type="hidden" name="inferior" value="<?php echo $inferior ?>"></p>
        <p><input type="hidden" name="numero" value="<?php echo $numero ?>"></p>
        <p><input type="hidden" name="limite" value="<?php echo $limite ?>"></p>
        <p><input type="submit" name="boton" value="Jugar">
            <input type="submit" name="reiniciar" value="Reiniciar">
            <input type="submit" name="volver" value="Volver"></p>
    </form>
    </fieldset>
    </body>
</html>
