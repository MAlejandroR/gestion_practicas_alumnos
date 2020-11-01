<?php
if (isset($_POST['submit'])) {
    //Leo la edad, la valido
    $edad = $_POST['edad'];
//Si es correcta envío a datos.php y me llevo el valor de la variable
    if ($edad <= 10) {///
        header("Location:index.php?error=Edad $edad es incorrecta");
        exit;
    } else
        //Si no lo es me quedo en index y generro un mensaje  que luego validaré
        $msj_error = "Edad <strong>$edad</strong> incorrecto, vuelve a insetarla";
}else {//En este caso he accedido aquí sin pasar por el index, por lo que redireciono a index
    header("Location:index.php?error=No puedes acceder directamente aquí");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Hola usuario de <?= $edad ?> años de edad</h2>

</body>
</html>