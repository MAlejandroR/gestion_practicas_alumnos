<?php
//Inicializamos El array vacio
$agenda = array();

// Esta función pintará la cabecera de una tabla donde se muestran los contactos
function pintar_cabecera()
{
?>
<h2>LISTADO DE CONTACTOS </h2>
<table align="center" border="1"  width="750px">
<thead>
<tr>
<th>Nombre</th>
<th>Teléfono</th>
</tr>
</thead>
<tbody>
<?php 
}

// Pinta el fin dela tabla para la agenda, no recibe parámetros
function pintar_fin_tabla()
{
?>
</tbody>
</table>
<?php
}


//Muestra un contacto en la tabla, se utiliza para mostrar la agenda persona a persona
function mostrar_persona($nombre,$telefono)
{
echo "<tr><td>";
echo $nombre;
echo "</td><td>";
echo $telefono;
echo "</td></tr>";  
}

// muestra toda la tabla, recibe un vector tipo agenda y llama a mostrar persona por cada elemento
function mostrar ($agenda)
{
    pintar_cabecera();
    foreach ($agenda as $persona=>$numero)
    {
        mostrar_persona($persona,$numero);
    }
    pintar_fin_tabla();
}

if (isset($_POST['add'])) {
    //Leo el nuevo nombre y el nuevo telefono
    $nombre = $_POST['name'];
    $telefono=$_POST['tel'];
    //Leo el array que contendrá todos los nombres anteriores 
    error_reporting(E_ALL ^ E_NOTICE);
    $agenda = $_POST['agenda'];
    //Agrego el nuevo dato. 
    $agenda[$_POST['name']] = $_POST['tel'];
    
    //Si el nombre recibido es vacio, se muestra una alerta y se borra del array 
    if($nombre==""){
        echo "<script>alert('Esta vacio el nombre');</script>";
        unset($agenda[$nombre]);
    }
    //Si el telefono recibido no es numerico, se muestra una alerta y se borra del array 
    if(!is_numeric($telefono)){
        echo "<script>alert('El teléfono no es número');</script>";
        unset($agenda[$nombre]);
    }
} 
if(isset($_POST['delete'])) {
     $agenda = array();
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> Agenda de contactos</title>
    </head>
    <header>Agenda de contactos: con <?php echo count($agenda) ?> contactos </header>
    <body>
        <!--Aquí se ponen las llamada a morstar para que se lanze la funcione-->
        <?php mostrar($agenda); ?>
        <div style="clear:both ">
            <hr/>
        </div>
        <!-- Creamos el formulario para insertr los nuevos datos-->
        <fieldset>
            <legend>Nuevo Contacto</legend>
            <form action="" method="POST">
                <br>
                <label for="nombre">Nombre :   </label><input type="text" name="name" size="15"/><br/><br/>
                <label for="telefono">Teléfono: </label><input type="text" name="tel" size="15"/><br/><br/>
                <input type="submit" value="Añadir contacto" name="add">
                <!-- Compruebo si la agenda tiene contactos agregados, para activar o desactivar el botón-->
                <?php  if(count($agenda)==0){
                    $msj= 'disabled';
                } else{
                    $msj= 'enabled';
                }?>
                <input type="submit" value="Eliminar contactos" name="delete" <?php echo $msj ?> >
                <?php 
                //Si la agenda esta vacia
                if(empty($agenda)){ 
                    foreach ($agenda as $nombre => $telefono) {
                      echo "<input type=hidden name='agenda[]' value =''>";
                    } 
       
                }else{
                    //Guardo el array para poderlo leer
                    foreach ($agenda as $nombre => $telefono) {
                        echo "<input type=hidden name='agenda[$nombre]' value ='$telefono'>";
                    } 
                }
                ?> 
            </form>
        </fieldset>
    </body>
</html>