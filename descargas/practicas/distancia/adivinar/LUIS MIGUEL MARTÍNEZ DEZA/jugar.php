<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php        
        
        //valores maximo y minimo para la busqueda
        $mayor=$_REQUEST['valorMayor'];
        $menor=$_REQUEST['valorMenor'];
        $contador=$_REQUEST['contador'];
        
        
        
        //ponemos limitador de intentos segun seleccion
        switch ($mayor){
            case 1024: $limite=10; break;
            case 65536: $limite=16; break;
            case 1048576: $limite=20; break;
        }
      
        //si se aprieta uno de los botones submit
        if(isset($_POST['submit'])){
            
            //actualizamos variables
            $decision=$_POST['submit'];
            $indicacion=$_POST['indicacion']; //  mayor/menor/igual
            $limite=$_POST['limite'];
            $log=$_POST['log'];
            
            //mensaje para mostrar si no se selecciona una opcion
            $mensaje="Debe seleccionar una opcion";
            
            //si se excede del numero de intentos redirigimos a fin.php
            if($contador >= $limite){
                //redirigimos a fin.php enviando en la url los datos del nº de intentos y log
                $mensajeError="Me has mentido?, ya debería haber adivinado tu número";
                    header("Location:fin.php?mensaje=$mensajeError&log=$log");
            }          
         
            //si presiona volver redirigimos al index.php
            if($decision == "volver"){
                header("Location:index.php");
            //si presiona reiniciar cargamos la pagina con valores de 10 intentos
            }else if($decision == "reiniciar"){
                header("Location:jugar.php?valorMayor=1024&valorMenor=1&contador=1");
             //si presiona jugar comprobamos valor mayor/menor/igual
            }else if($decision == "jugar"){
                //comprobamos que ha seleccionado mayor/menor/igual
                if(!is_null($_POST['indicacion'])){
                    //si se manda indicación quitamos mensaje error
                    $mensaje="";
                                        
                    //si el numero pensado es mayor
                    if($indicacion == "mayor"){
                         $menor=(int)(($mayor+$menor)/2)+1;
                    }else if($indicacion == "menor"){
                        $mayor=(int)(($mayor+$menor)/2)-1;
                    }else if($indicacion == "igual" ){
                        //si ha acertado el numero                     
                        //redirigimos a fin.php enviando en la url los datos del nº de intentos y log
                        $mensajeAcierto="<span style=color:green>He acertado!!! en $contador jugadas.</span>";
                        header("Location:fin.php?mensaje=$mensajeAcierto&log=$log");
                    }
                    //aumentamos el numero de intentos en 1
                    $contador++;
                }//cierre if(!is null
                
            }//cierre if($decision
                       
        }// cierre if(isset
                
        //numero calculado a mostrar al jugador
        $numero=(int)(($mayor+$menor)/2);
                
        //añado al log los datos de la nueva jugada
        $log .= "<br />".Date("H:m:s")." Jugada nº $contador numero aportado: $numero ";
        
        if(isset($_POST['submit']) && is_null($indicacion)){
            $log .= "<span style=color:red>No ha seleccionado opcion</span>";       
        }
           
        
        ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <label>Empieza el juego</label>
                <h2>El número es <?php echo $numero;?> ? 
                    <?php if($mayor == $menor) 
                    echo "<br /><span style=color:red>Esta es tu ultima opcion, por lo que debería ser tu número</span>";?>
                </h2>
                <h3>Jugada <?php echo $contador; ?>, me quedan <?php echo $limite-$contador; ?> intentos</h3>
                <fieldset>
                    <label>Indica como es el número que has pensado
                        <?php echo "<br /><span style=color:red>$mensaje</span>"?></label><br />
                    <input type="radio" name="indicacion" value="mayor" /> Mayor <br />
                    <input type="radio" name="indicacion" value="menor" /> Menor <br />
                    <input type="radio" name="indicacion" value="igual" /> Igual <br />                  
                </fieldset>
                <input type="hidden" name="valorMayor" value="<?php echo $mayor; ?>" />
                <input type="hidden" name="valorMenor" value="<?php echo $menor; ?>" />
                <input type="hidden" name="contador" value="<?php echo $contador; ?>" />
                <input type="hidden" name="limite" value="<?php echo $limite; ?>" />
                <input type="hidden" name="log" value="<?php echo $log; ?>" />
                <hr />
                <input type="submit" name="submit" value="jugar" />
                <input type="submit" name="submit" value="reiniciar" />
                <input type="submit" name="submit" value="volver" />
            </fieldset>
        </form>
    </body>
</html>
