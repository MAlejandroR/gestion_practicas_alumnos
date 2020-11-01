<!--
AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->
<?php
//El programa recibe los botones de añadir y de borrar: 
$botonAdd = filter_input(INPUT_POST, "add");
$botonDel = filter_input(INPUT_POST, "del");
//El programa también recibe varios parámetros vacíos al principio, para evitar posibles warnings: 
$error = "";
$contactos = [];
$msj = "";
$count = "";
$nombreUsuario = "";
$contacto = "";
$contador = 0;

//Esta función me va a devolver una tabla con cada uno de los contactos almacenados en el array "contactos"
function mostrarTabla($contactos) {
    //Si el array de contactos está vacío no es necesario recorrerlo. 
    //Este "if !empty contactos" lo repito en otras funciones por dicho motivo
    if (!empty($contactos)) {
        $msj = "<table border=1 style='border-collapse:collapse'><tr><td><b>Contacto</b></td><td><b>Teléfono</b></td></tr>";
        foreach ($contactos as $contacto => $telefono) {
            $msj .= "<tr><td>$contacto</td><td>$telefono</td></tr>";
        }
        $msj .= "</table>";
        return $msj;
    }
}

//El botón de eliminar contactos tiene que estar activo siempre y cuando haya contactos en el array
//Por tanto, a esta función le paso el contador de contactos
function disabled($contador, &$msj, &$disabled) {
    if ($contador == 0) {
        $msj = "Agenda sin contactos";
        $disabled = "disabled";
    } else {
        $disabled = "";
    }
}

//Si el botón de borrado está activo, el programa borrará todos los contactos del array: 
function borrarArray(&$contactos, $botonDel) {
    if (isset($botonDel)) {
        foreach ($contactos as $contacto) {
            unset($contactos[$contacto]);
        }
    }
}

//Este método devolverá true en caso de que el nombre de usuario esté dentro del array: 
function buscaContacto($contactos, $nombreUsuario) {
    $telefono = "";
    if (!empty($contactos)) {
        foreach ($contactos as $contacto => $telefono) {
            if ($contacto == $nombreUsuario) {
                return true;
            }
        }
    }
}

//Si se da el caso de que está activo el botón añadir, el programa recogerá valores recibidos del formulario
//y los utilizará en el switch case
if (isset($botonAdd)) {
    $esta = false;

    $contactos = filter_input(INPUT_POST, "array", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $nombreUsuario = filter_input(INPUT_POST, "nombre");
    $tlfUsuario = filter_input(INPUT_POST, "tlf");

    switch (true) {
        //Si el nombre que introduce el usuario está en el array y el teléfono esta vacío, 
        //el programa borrará el contacto
        case $tlfUsuario == "":
            //Compruebo que el nombre está en el array, y si no está le devolveré un mensaje al usuario
            $esta = buscaContacto($contactos, $nombreUsuario);
            if ($esta == false) {
                $error = "Debes introducir un número de teléfono para el usuario $nombreUsuario";
            } else {
                //Si está, lo borraré: 
                unset($contactos[$nombreUsuario]);
            }
            break;
        //Si el nombre que introduce el usuario es una cadena vacía, el programa le mostrará un mensaje
        //y no hará nada más
        case $nombreUsuario == "":
            $error = "Debes introducir un nombre de usuario";
            break;
        //Si el número de teléfono insertado por el usuario no es numérico, el programa le mostrará un 
        //mensaje y no hará nada más
        case (is_numeric($tlfUsuario)) == false:
            $error = "Debes introducir un número correcto";
            break;
        //Si no se cumplen las condiciones anteriores, el contacto y el teléfono introducidos por el usuario
        //pasarán a formar parte de la agenda
        default:
            //He colocado un trim para "esquivar" los posibles espacios que el usuario pueda poner 
            //delante y detrás del nombre que desee agregar a la agend
            $contactos[trim($nombreUsuario)] = $tlfUsuario;
            break;
    }
    $msj = mostrarTabla($contactos);
    if (!empty($contactos)) {
        $contador = count($contactos);
    }
    disabled($contador, $msj, $disabled);
    //Si el usuario refresca la página o pulsa borrar, los contactos se borrarán: 
} else {
    borrarArray($contactos, $botonDel);
    $msj = "Agenda sin contactos";
    $disabled = "disabled";
    $contador = 0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="background-color: cornsilk;width:65%">
            <h1>Agenda de contactos</h1>
            Número de contactos almacenados: <?= $contador ?>
        </fieldset>
        <fieldset style="background-color: cornsilk;width:40%; float:left">
            <legend>Nuevo contacto</legend>
            <form action="." method="post">
                Nombre<input type="text" name="nombre"/><br/>
                Teléfono<input type="text" name="tlf"/><br/>
                <?php
                if (!empty($contactos)) {
                    foreach ($contactos as $contacto => $telefono) {
                        ?>
                        <input type="hidden" value="<?= $telefono ?>" name="array[<?= $contacto ?>]">
                        <?php
                    }
                }
                ?>
                <input type="submit" value="Añadir contacto" name="add"/>
                <input type="submit" value="Eliminar contactos" name="del" <?= $disabled ?>/>
            </form>
        </fieldset>
        <fieldset style="background-color: cornsilk;width:20%; float:left">
            <legend>Listado de contactos</legend>
            <?= $msj ?>
        </fieldset>
        <p style="clear:left"><?= $error ?></p>
    </body>
</html>
