


<?php
/* Luisa Fernández Práctica Agenda 2ª DAW */
//inicializo variables
$disabled = 'disabled'; //esta la utlizaré para habilitar o deshabilitar el boton de eliminar
$msj = ""; //el contenido de la tabla
$mensaje_final = ""; //el mensaje con los errores y avisos
$nombres = [];  //el array de los nombres
$tabla = ""; //la tabla completa
$encabezado = "sin contactos actualmente"; //el detalle de si hay algún contacto o no en la agenda
if (isset($_POST['submit'])) {//comienzo dandole a agregar o eliminr
    $disabled = $_POST['disabled'] ?? 'disabled';
    $nombres = $_POST['nombres'] ?? [];
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING) ?? "";
    $nombre = trim($nombre); //le quito los espacios al nombre, pra luego poder comprarlo
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING) ?? 1;
    $nombres[$nombre] = $telefono; //ininicalizo el array

    function validar($nom, $tel, $nombres) {//esta función la uso para serpara las distitas posibilidades
        //de entradas en el formulario
        foreach ($nombres as $entrada => $dato) {
            if ($nom == null) {
                return 2;
                break;
            } else if ($nom == $entrada && $tel == null) {
                return 3;
                break;
            } else if ($nom == $entrada && !is_numeric($tel)) {
                return 4;
                break;
            } else if ($nom != null && $tel == null) {
                return 5;
                break;
            } else if ($nom != null && !is_numeric($tel)) {
                return 6;
                break;
            } else if ($nom != null && $tel != null) {
                return 7;
                break;
            }
        }
    }

    switch ($_POST['submit']) {
        case 'agregar'://si le doy a añadir
            $option = validar($nombre, $telefono, $nombres);
            switch ($option) {
                case 2://si no hay nombre lo pido, y elimino la entrada de array para que no me la imprima
                    $mensaje_final = "Debe introducir un nombre";
                    unset($nombres[$nombre]);
                    break;
                case 3://si esta el nombre pero no el teléfono elimino la entrada
                    $mensaje_final = "Contacto $nombre eliminado satisfactoriamente";
                    unset($nombres[$nombre]);
                    break;
                case 4:
                    //si en la casilla de teléfono de un nombre ya existente introduzco carateres no númericos elimino el contacto
                    $mensaje_final = "Como los caracteres introducidos no son válidos, borramos el contacto";
                    unset($nombres[$nombre]);
                    break;
                case 5://si no hay número de teléfono mando aviso
                    $mensaje_final = " Debe introducir un número, $nombre";
                    unset($nombres[$nombre]);
                    break;
                case 6://si no son un teléfono valido aviso
                    $mensaje_final = "Los carácteres introducidos no son un teléfono válido, $nombre.";
                    unset($nombres[$nombre]);
                    break;
                case 7:
                    //en este caso se ha añadido correctamento
                    $nombres[$nombre] = $telefono;
                    $mensaje_final = "El contacto $nombre se ha añadido correctamente";
                    break;
            }
            foreach ($nombres as $entrada => $dato) {
                $msj .= "<tr><td> $entrada </td><td>$dato</td></tr>";
            }
            //este es el mensaje con los datos de la entrada que
            //ira a la tabla.
            break;
        case 'eliminar':
            foreach ($nombres as $nombre => $telefono) {
                unset($nombres[$nombre]);
            }
            break;
    } $disabled = ($nombres != null) ? 'enabled' : 'disabled'; //aquí determino si el atributo
    //del boton enviar esta habilitado o deshabilitado
    if ($nombres != null) {//aquí monto la tabla
        $tabla = "<table style='border:1px solid black'>
                      <tr style='border:1px solid black'>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                      </tr>
                       $msj
                       </table>";
        $encabezado = "con uno o multiples contactos";
    } else {
        $encabezado = " sin contactos actualmente";
    }
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <title> </title>
        <link rel="stylesheet" href="./estilo.css" type="text/css">
    </head>

    <body>
        <header>
            Agenda de contactos: <?= $encabezado ?></header>
        <div class="listado_contactos">
            <div class="center">LISTADO DE CONTACTOS</div>
            <hr>
            <div class="center">
                Agenda
                <?= $tabla ?>
            </div>
        </div>

        <fieldset>
            <legend>Introduce contactos</legend>
            <form action = "index.php" method = "POST">
                <br />
                <label for="nombre">Nombre</label>   <input type = "text" name ="nombre" size="15" ><br />
                <label for="telefono">Teléfono </label><input type = "text" name ="telefono" size="15" ><br />
                <input type = "submit" name ="submit" value = "agregar">
                <input type = "submit" name ="submit" value = "eliminar" <?= $disabled ?>>


                <?php
                foreach ($nombres as $nombre => $telefono) {
                    echo"<input type='hidden' name='nombres[$nombre]' value=$telefono>" ?? "";
                }
                ?>
            </form>
        </fieldset>
        <div style="clear:both ">
            <hr/>
            <p style='color:red'><?= $mensaje_final ?> </p><br /></div>
    </body>
</html>
