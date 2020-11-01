<?php
//Leo datos del formulario
$agenda = $_POST['agenda'] ?? []; //Inicializo/leo la agenda
$telefono = filter_input (INPUT_POST,'telefono',FILTER_VALIDATE_INT);
$nombre = $_POST['nombre'];


if (is_null ($nombre)) { //Valido que haya nombre
    $error = "nombre no puede estar vacío";
} else if (is_null ($telefono)) {//Si el teléfono está vacío, lo borro
    if (array_key_exists ($nombre, $agenda))//Para evitar warning me aseguro que existe
        unset ($agenda[$nombre]); //Borro contacto
} else { //Todo ok, añado contacto
    $agenda[$nombre] = $telefono;
}

//Creo los inputs de tipo hidden con los contactos (la agenda)
//Creo la tabla para mostrar los contactos
foreach ($agenda as $nom => $tel) {
    $html_hidden .= "<input type=hidden name='agenda[$nom]' value=$tel>";
    $tabla_contactos .= "<tr><td>$nom</td><td>$tel</td></tr>";
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!--    <link rel="stylesheet" href="./estilo.css" type="text/css">-->
    <script src='https://unpkg.com/vue'></script>
    <title> Agenda de contactos</title>
</head>
<header>
    Agenda de contactos
</header>
<body>
<?= $error ?>

<div class="listado_contactos">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>
        <?= $tabla_contactos ?>
    </table>
    <div class="center">

    </div>
</div>
<!-- Creamos el formulario para insertr los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action=index.php method="post">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" size="15"/>
        <br/>
        <label for="telefono">Teléfono </label>
        <input type="number" name="telefono" size="15"/>
        <br/>
        <input type="submit" value="Añadir contacto" name="enviar">
        <input type="submit" value="Eliminar contactos" name="enviar" <?php echo $deshabilitado ?> >
        <?= $html_hidden ?>
    </form>
</fieldset>
</body>
