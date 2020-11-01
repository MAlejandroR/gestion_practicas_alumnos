<?php
/* Programa una pequeña agenda
  Con la tecnología conocida hasta ahora debes programar una especie de pequeña agenda
  según se especifica. (No usar sesiones, ni ficheros, ni bases de datos)
  Es una aplicación para mantener una pequeña agenda en una única página web programada
  en PHP.
  Los valores de la agenda sólo se mantendrán mientras estoy conectado de manera continua
  con en navegador, cuando reinicie el navegador la agenda empezará vacía.
  La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de
  teléfono. Además, no podrá haber nombres repetidos en la agenda.

  En la parte superior de la página web se mostrará el contenido de la agenda. En la parte
  inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre
  y otro para el número de teléfono.
  Cada vez que se envíe el formulario:
  Se producirá una advertencia :
  Si el nombre está vacío
  Si el teléfono no es numéricio
  Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío,
  se añadirá a la agenda.
  Por otro lado cumplirá estos requisitos funcionales:
  Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono,
  se sustituirá el número de teléfono anterior.
  Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono,
  se eliminará de la agenda la entrada correspondiente a ese nombre.
  Se podrán borrar todos los contactos de la agenda.
  El botón borrar contactos sólo estará habilitado si hay contactos en la agenda */

//Declaro las variables que voy a necesitar
$disabled = "disabled"; // para habilitar el input "Eliminar contactos"
$nombre_esp = htmlspecialchars($_POST['nombre']); // Leo el nombre introducido
$nombre = trim($nombre_esp);// Elimino los espacios en blanco si los hubiese
$telefono_esp = htmlspecialchars($_POST['telefono']); // Leo el teléfono introducido
$telefono = trim($telefono_esp);// Elimino los espacios en blanco si los hubiese
$agenda = $_POST['agenda'] ?? []; // Leo el contenido de agenda si tiene algo o le doy valor de array vacio
$lista_hidden = ''; // Contiene los hidden inputs para la siguiente recarga de página
$tabla_contactos = ''; // Contiene la tabla visible de contactos
// En función de a qué submit le dé haré una cosa u otra
switch ($_POST['submit']) {
    case 'Añadir':
        // Si el nombre está vacío
        if ($nombre === "") {
            // Muestro mensaje de error al usuario
            $error = "El nombre no puede estar vacío";
            // Si el teléfono no son números
        } else if (!is_numeric($telefono)) {
            // Muestro mensaje de error al usuario
            $error = "El teléfono no es correcto";
        } else {// Si todo está correcto
            // Añade el usuario a la agenda
            $agenda[$nombre] = $telefono;
        }
        // Si el nombre(el índice en este caso) ya está en la agenda
        // y el teléfono está vacío
        if (array_key_exists($nombre, $agenda) && $telefono === "") {
            // Doy el valor de cadena vacía para que no salga el mensaje de error
            $error = "";
            // y elimino el índice y su contenido de la agenda
            unset($agenda[$nombre]);
        }
        // Si la agenda no está vacía
        if (!empty($agenda)) {
            // Habilito el botón "Eliminar contactos"
            $disabled = "enabled";
            // Creo los elementos HTML
            $titulo_tabla = "<table border='1'><tr><th>Nombre</th><th>Telefono</th></tr>";
            $fin_tabla = "</table>";
            foreach ($agenda as $nombre => $telefono) {
                $lista_hidden .= "<input type='hidden' name='agenda[$nombre]' "
                    . "value='$telefono'/>";

                $tabla_contactos .= "<tr><td>$nombre</td>
                                <td>$telefono</td></tr>";
            }
        }else{
            $titulo_tabla="";
            $fin_tabla="";
        }
        
        break;
    case 'Eliminar':
        // Recorro los contactos de la agenda con un foreach
        foreach ($agenda as $nombre => $telefono) {
            // y los elimino
            unset($agenda[$nombre]);
        }
        break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AGENDA</title>
    </head>
    <header style="background-color: blueviolet; color: white; text-align: center;margin-left: 25%;width: 50%">
        <h1>Agenda con <?= count($agenda) ?> contactos</h1>
    </header>
    <body style="background-color: lightgrey">
        <fieldset style="width: 40%;float:left;margin-left: 5%; background:linen">
            <legend>Agenda de contactos</legend>
            <form action="index.php" method="post">
                <label>Nombre</label>
                <input type="text" name="nombre" value=""/>
                <label>Telefono</label>
                <input type="text" name="telefono" value=""/>
                <?= $lista_hidden ?>
                <br/>
                <span style="color:red"><?= $error ?></span>
                <br/>
                <input type="submit" name="submit" value="Añadir"/>
                <input type="submit" name="submit" value="Eliminar" <?= $disabled ?>/>
                <br/>

            </form>
        </fieldset>
        <fieldset style="width: 40%;float:right;margin-right: 5%; background:linen">
            <h3>LISTADO DE CONTACTOS</h3>
            <hr/>
            <?= $titulo_tabla ?>
            <?= $tabla_contactos ?>
            <?= $fin_tabla ?>
        </fieldset>

    </body>
</html>
