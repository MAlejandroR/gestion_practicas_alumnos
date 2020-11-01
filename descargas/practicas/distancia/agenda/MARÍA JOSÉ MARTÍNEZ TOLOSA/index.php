<?php
if (!is_null($_POST['borrar'])) {
    unset($agenda);
    $numContac = 0;
}
if (!is_null($_POST['enviar'])) {//recuperamos los campos ocultos
    $agenda = $_POST['agenda'];
    $nomb = $_POST['nombre'];
    $telef = $_POST['telefono'];
    if ($nomb == "") {
        $msj = "Debes facilitar un nombre para crear el contacto";
    } else {
        if ($telef != is_numeric($telef)) {
            $msj = "El teléfono debe ser numérico y " . $telef . " no lo es.";
        } else {
            if (empty($agenda) || !isset($agenda)) {//Si la agenda está vacía o si es el primer envío
                if ($telef == "") {
                    $msj = "Debes facilitar un teléfono para el contacto " . $nomb;
                } else {
                    $agenda[$nomb] = $telef;
                }
            } else {//Si la agenda no está vacía               
                if (!array_key_exists($nomb, $agenda)) {//Si no existe el nombre
                    if ($telef !== "") {
                        $agenda[$nomb] = $telef;
                    } else {
                        $msj = "Debes facilitar un teléfono para el contacto " . $nomb;
                    }
                } else {//Si ya existe el nombre
                    foreach ($agenda as $nombre => $telefono) {
                        if ($nombre == $nomb) {
                            if ($telef == "") {
                                unset($agenda[$nombre]);
                                $msj = "El contacto ". $nomb. " ha sido eliminado";
                            } else {
                                if ($telefono == $telef) {
                                    
                                } else {

                                    $agenda[$nomb] = $telef;
                                }
                            }
                        }
                    }
                }
            }
            
        }
    }
    $numContac = count($agenda);
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./estilo.css" type="text/css">
        <title> Agenda de contactos</title>
    </head>

<?php
if (is_null($_POST['enviar']) || $numContac == 0) {
    echo '<header>Agenda de contactos: sin contactos actualmente</header>';
} else {
    echo '<header>Agenda de contactos: con ' . $numContac . ' contactos </header>';
}
?>

    <body>  
        <div class="listado_contactos">
            <div class="center">LISTADO DE CONTACTOS</div>
            <hr>
            <div class="center">
<?php
if (isset($agenda) && !empty($agenda)) {
    echo '<table>';
    echo '<tr><th>Nombre</th><th>Teléfono</th></tr>';
    foreach ($agenda as $nombre => $telefono) {
        echo "<tr><th> $nombre </th><th> $telefono</th></tr>";
    }
    echo '</table>';
} else {
    echo"Agenda sin contactos";
}
?>
            </div>
        </div>
        <fieldset>
            <legend>Nuevo Contacto</legend>
            <form action="index.php" method="POST">
                <br>
                <label>Nombre</label><input type ="text" name ="nombre" size="15"/><br>
                <label>Telefono</label><input type ="text" name ="telefono" size="15"/><br>
                <input type ="submit" value ="Añadir contacto" name ="enviar">
                <!-- Si se ha pulsado Añadir, habilitamo el botón Eliminar-->
<?php
if (isset($agenda) && !empty($agenda)) {
    echo '<input type="submit" value="Eliminar contactos" name="borrar">';
} else {
    echo '<input type="submit" value="Eliminar contactos" name="borrar" disabled >';
}
?>
                <!-- Metemos los contactos existentes  ocultos en el formulario-->
                <?php
                if (!is_null($_POST['enviar'])) {
                    if (isset($agenda)) {
                        foreach ($agenda as $nombre => $telefono) {
                            echo "<input type='hidden' name='agenda[$nombre]' value='$telefono'/>";
                        }
                    }
                }
                ?>
            </form>
            <!-- Creamos el formulario para insertr los nuevos datos-->
        </fieldset>
        <div style="clear:both ">
            <hr/>
            <p style='color:red'><?php echo $msj; ?></p>
            <br/>
        </div>
    </body>

</html>
