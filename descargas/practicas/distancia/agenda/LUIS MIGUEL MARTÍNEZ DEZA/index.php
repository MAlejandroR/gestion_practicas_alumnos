<?php
if (isset($_POST['enviar'])) {

    //recogemos dato de accion
    $accion = $_POST['enviar'];

    //si se manda eliminar, eliminamos array,
    //sino continuamos con la agenda
    if ($accion == "Eliminar todos") {
        //eliminación de la variable-array
        unset($contactos);
    } else {

        //recogemos el resto de datos recibidos
        $contactos = $_POST['contactos'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];

        //creo variables para mensajes de error
        $mensajeNombre = "";
        $mensajeTelefono = "";

        //variable para control de teléfono válido
        $telefonoValido = true;

        //MENSAJES DE ADVERTENCIA
        if (trim ($nombre) == "") {
            $mensajeNombre = "<span style=color:red>Debe indicar un nombre</span>";
        }
        if (!is_numeric ($telefono)) {
            $mensajeTelefono = "<span style=color:red>Debe indicar un número</span>";
            $telefonoValido = false;
        }

        //si el contacto existe y el tfno está vacio, lo eliminamos 
        if (array_key_exists ($nombre, $contactos) && $telefono == "") {
            unset($contactos[$nombre]);
            //elimino mensaje de advertencia del telefono
            $mensajeTelefono = "";
        }

        //si ha introducido nombre y el teléfono es válido lo añadimos
        if (trim ($nombre) != "" && $telefonoValido) {
            $contactos[$nombre] = $telefono;
        }

        //creamos una TABLA con los datos del Array
        $tabla = "<table border='1'>";
        $tabla .= "<tr><th>Nombre</th><th>Teléfono</th></tr>";
        foreach ($contactos as $nombre => $telefono) {
            $tabla .= "<tr><td>$nombre</td><td>$telefono</td></tr>";
        }
        $tabla .= "</table";
    }//cierre del else


}// cierre if(isset...


?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Agenda de contactos</title>
</head>
<body>
<header>Agenda de teléfonos:
    <?php echo count ($contactos) == 0 ? "sin contactos actualmente" : "con " . count ($contactos) . " contactos"; ?>
</header>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <fieldset>
        <legend>Nuevo Contacto</legend>
        <label for="nobre">Nombre</label>
        <input type="text" name="nombre" size="15" value=""/>
        <?php echo $mensajeNombre; ?>
        <br/>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" size="15" value=""/>
        <?php echo $mensajeTelefono; ?>
        <br/>
        <br/>
        <input class="añadir" type="submit" name="enviar" value="Añadir"/>
        <input class="eliminar" type="submit" name="enviar"
               value="Eliminar todos" <?php echo count ($contactos) == 0 ? "disabled" : ""; ?> />
        <!--- Mandamos un campo oculto por cada nombre-telefono de la agenda-->
        <?php
        foreach ($contactos as $nombre => $telefono) {
            echo "<input type='hidden' name='contactos[$nombre]' value=$telefono />";
        }

        ?>
    </fieldset>
</form>


<!--- Mostramos la tabla con la información de del array -->
<div class="listado">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
    <div class="center">
        <?php
        echo count ($contactos) == 0 ? "Agenda sin contactos" : $tabla;

        ?>
    </div>

</div>
<br/>
<!-- Formulario de recogida de datos-->


</body>
</html>
