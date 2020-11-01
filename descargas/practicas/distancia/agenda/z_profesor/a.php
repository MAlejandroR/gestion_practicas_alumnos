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

<div class="listado_contactos">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>
        <tr><td>Manuel</td><td>telefono de manuel</td></tr>    </table>
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
        <input type="submit" value="Eliminar contactos" name="enviar"  >
        <input type=hidden name='agenda[Manuel]' value=telefono de manuel>    </form>
</fieldset>
</body>
