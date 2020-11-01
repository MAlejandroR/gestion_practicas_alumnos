?php
$intentos = $_GET['intentos'] ?? 10;


?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport"
    <title>Adivina n&uacutemero</title>
    <link rel="stylesheet" href="estilo.css" type="text/css"/>
</head>
<body>


<fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
    <legend><h1>Juego adivina n&uacutemero</h1></legend>
    <h2>    Selecciona un intervalo del men&uacute de abajo</h2>
    <h4 style="color:red">Debes de seleccionar una opción para jugar</h4>
    <fieldset>
        <legend>Esteblece interfalo</legend>
        <form action="jugar.php" method="POST">
            <input type="radio" name="num_intentos" value=10 <?php echo $intentos == 10 ? "checked" : null ?>> 1-1.024(2<sup>10</sup>). 10 intentos<br />
            <input type="radio" name="num_intentos" value=15 <?php echo $intentos == 15 ? "checked" : null ?> > 1-65.536(2<sup>16</sup>). 16 intentos<br />
            <input type="radio" name="num_intentos" value=20 <?php echo $intentos == 20 ? "checked" : null ?> > 1-1.048.576(2<sup>20</sup>). 20 intentos<br />
            <input type="submit" value="empezar" name="submit">
        </form></fieldset>
    <br />
    <h2>    Piensa un n&uacutemero de ese intervalo</h2>
    <h2>    La aplicaci&oacuten lo acertar&aacute en el n&uacutemero de intentos establecidos seg&uacuten el intervalo</h2>
    <hr />

    <h2>    Cada vez que la aplicaci&oacuten te especifique un n&uacutemero deber&aacutes de indicar</h2>
    <ul>
        <ol>Si el n&uacutemero buscado es mayor</ol>
        <ol>Si el n&uacutemero buscado es menor</ol>
        <ol>Si has aceertado el n&uacutemero</ol>
    </ul>


</fieldset>
