<!DOCTYPE html>
<?php
    //Si pulsamos el boton de enviar ejecutamos este código
    if(isset($_POST['añadir'])){
        //Recogemos lo que hay en nombre y telefono
        $indice = $_POST['nombre'];
        $tel = $_POST['tel'];
        //Creamos el array indexado que esta guardado en el input hidden
        $agenda = $_POST['agenda'];
        //Eliminamos el registro vacio
        unset($agenda[0]);
        //Si el télefono no es numérico y no esta vacio mostramos mensaje error
        if(!is_numeric($tel) && $tel != ""){
            $mensaje = "<p>La casilla de teléfono debe de ser numérica y <b>'$tel'</b> no lo es.</p>";
            echo $mensaje;
        //Si el nombre no esta vacío mostramos mensaje error
        }elseif(empty(trim($indice))){
            $mensaje = "<p>Debes de introducir un nombre para añadir un contacto</p>";
            echo $mensaje;
        //Si el nombre no esta vacío y teléfono si esta puede pasar 2 cosas 
        }elseif(!empty($indice) && empty($tel)){
            //Si no existe el contacto mostramos mensaje error
            if(!isset($agenda[$indice])){
                $mensaje = "<p>Introduzca un teléfono para el contacto <b>'$indice'</b></p>";
                echo $mensaje;
            //Si el contacto existe borramos el contacto
            }else{
                unset($agenda[$indice]);
                $mensaje = "<p>El contacto <b>'$indice'</b> ha sido eliminado</p>";
                echo $mensaje;
            }
        //Si no ocurre nada de lo anterior actualizamos el array
        }else{
            $agenda[$indice] = $tel;
        }
    //Si pulsamos el boton de eliminar contactos borramos la agenda
    }elseif(isset($_POST['borrar'])){ 

        $agenda = [];
    //Si aun no hemos pulsado el boton de añadir contacto creamos un array vacío
    }else{ 

        $agenda = [];
    }
    //Creamos variable con el número de contactos.
    $contactos = sizeof($agenda);
    ?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda Telefónica</title>
        <link type="text/css" rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <?php
            //Si la agenda esta vacia mostramos un mensaje sin contactos
            if(empty($agenda)){
              echo "<h1>AGENDA DE CONTACTOS: sin contactos</h1>";  
            //Si existen contactos mostramos mensaje con el número de contactos
            }else{   
                echo "<h1>AGENDA DE CONTACTOS: $contactos contactos</h1>";
            }
            
        ?>
        <fieldset>
            <legend>Añadir nuevo contacto</legend>
            <form action="index.php" method="POST">
                <label for="nombre">Nombre:</label><input type="text" id="nombre" name="nombre"><br>
                <label for="tel">Teléfono:</label><input type="text" id="tel" name="tel"><br>
                <input type="submit" name="añadir" value="Añadir contacto">
                
                <?php
                    //Si la agenda esta vacía desabilitamos el boton de borrar contactos
                    if(empty($agenda)){
                        $estado = "disabled";
                    //Si existen contactos habilitamos el boton
                    }else{
                        $estado = '';
                    }
                    //Creamos el boton con el estado del mismo
                    echo "<input type='submit' name='borrar' value='Borrar contactos' $estado>";
                ?>
                
                <?php
                    //Si la agenda esta vacía creamos input hidden con array vacío
                    if(empty($agenda)){
                        echo "<input type='hidden' name='agenda[]' value=''>";
                    //Si exiten contactos lo creamos con los contactos del array
                    }else{
                        foreach ($agenda as $indice => $tel){ 
                            echo "<input type='hidden' name='agenda[$indice]' value='$tel'>";   
                        }
                    }
                ?>
            </form>
            
        </fieldset>
        <div>
            <h2>CONTACTOS</h2>
            <hr>
            <ol>
                
                <?php
                    //Si la agenda esta vacía creamos mensaje de agenda sin contactos.
                    if(empty($agenda)){
                        echo'<h4>Agenda sin contactos</h4>';
 
                    }else{
                        //Si existen contactos creamos lista recorriendo el array y mostrando contactos.
                        foreach ($agenda as $indice => $tel){
                            echo "<li>Nombre: $indice   --------------   Teléfono: $tel.";

                        }
                    }
                ?>
            </ol>
        </div>
        <hr>
    </body>
</html>

    