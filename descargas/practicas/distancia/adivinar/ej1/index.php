<?php
//Leo el mensaje error por si vengo de datos.php, si no
//Asigno vacío para evitar warning
$msj_error=$_GET['error']??"";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba con 2 ficheros </title>
    <style>.error{
            color:red;
        }
    </style>
</head>
<body>
<fieldset>
    <span class="error"><?=$msj_error?></span>
    <legend>Inserta edad</legend>
    <form action="datos.php" method="POST">
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad">
        <input type="submit" value="Validar" name="submit">
    </form>
</fieldset>

</body>
</html>