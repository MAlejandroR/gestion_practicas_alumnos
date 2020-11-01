<!DOCTYPE html>
<?php
    $estado_boton="disabled";  //Variables que indica el estado del botón Eliminar contactos
    $alerta="";   //Variable que contiene el mensaje a mostrar por pantalla
    $nombre=$_POST['nombre'] ??"";
    $telefono=$_POST['telefono'] ??"";
    $agenda=$_POST['agenda'] ??[];
    //Se presiona boton insertar
    if(isset($_POST['insertar'])){
        $esta=false;  //Controla si el valor de nombre está ya en el array
        //Comprueba que el campo nombre no es vacio
        if($_POST['nombre']==""){
            $alerta="Debes escribir un nombre para el contacto";
        }else{
            //Si no está vacío comprueba que esté el nombre en la agenda
            foreach ($agenda as $nb=>$dt) {
                if($nb==$nombre){  
                    $esta=true;  //Si lo encuentra ponemos la variable a true
                }
            }           
            //Comprueba que el campo teléfono no es vacio
            if($_POST['telefono']==""){
                if($esta){  //Si el telefono está vacio y el nombre está en agenda, lo borra.
                   unset($agenda[$nombre]);
		   $alerta="Contacto borrado correctamente";
                }else{
                   $alerta="Debes escribir un teléfono para el contacto";
                }
            }else{
                //Comprueba que el campo teléfono es numérico
                if(is_numeric($_POST['telefono'])){
                    $telefono=$_POST['telefono']; 
                    $agenda=$_POST['agenda'];
                    $agenda[$nombre]=$telefono;
                    $alerta="¡El contacto se ha insertado con éxito!";
                }else{
                    $alerta="El teléfono debe ser numérico";
                } 
            }
        }
    }
    //Si el array no está vacío, se activa el botón de eliminar todos los contactos
    if($agenda!=null){
        $estado_boton="enabled";
    }
    //Se presiona boton eliminar, borra todos los contactos
    if(isset($_POST['eliminar'])){
        unset($agenda);
        $alerta="Se han eliminado todos los contactos";
        $estado_boton="disabled";
    }      
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div><h1 style="padding-left: 50px">AGENDA DE CONTACTOS</h1></div>
        <div style="padding-left: 70px;width: 20%;float: left;">
            <fieldset style="width: 400px">
                <legend><b>Nuevo Contacto</b></legend>
                <form action="index.php" method="POST">
                    <p>Nombre   <input type="text" name="nombre"></p>
                    <p>Teléfono   <input type="text" name="telefono"></p>
                    <p><input type="submit" name="insertar" value="Añadir contacto">   <?php echo '<input type="submit" name="eliminar" value="Eliminar contactos"'.$estado_boton.'>' ?></p>
                    <?php             
                    foreach ($agenda as $nom => $tel) {
                        echo "<input type='hidden' name='agenda[$nom]' value ='$tel'>";
                    }
                    ?>
                </form>
            </fieldset>  
            <p style="color:red"><?php echo $alerta; ?></p>
        </div>
        <div style="margin-left: 20%;padding-left:5%;padding-bottom: 20px;border: 2px solid black;width: 40%;float: left;">
            <h3>LISTADO DE CONTACTOS<br /><hr></h3>    
                    <?php    
                    foreach ($agenda as $nom => $tel) {
                        echo "<b>Nombre:</b> $nom    <b>Teléfono:</b> $tel<br />";
                    }
                    ?>
        </div>
    </body>
</html>
