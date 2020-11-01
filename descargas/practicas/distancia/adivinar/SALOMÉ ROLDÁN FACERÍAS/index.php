<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Adivina número</title>
   </head>
<body>


<fieldset style="width: 50%;float:left;margin-left: 20%;">
    <legend><h1>Juego adivina número</h1></legend>
    <h2>    Selecciona un intervalo del men&uacute de abajo</h2>
    <fieldset>
        <legend>Esteblece intervalo</legend>
        <form action="jugar.php" method="POST">
            <input type="radio" name="num_intentos" value=10 checked> 1-1.024(2<sup>10</sup>). 10 intentos<br />
            <input type="radio" name="num_intentos" value=16  > 1-65.536(2<sup>16</sup>). 16 intentos<br />
            <input type="radio" name="num_intentos" value=20  > 1-1.048.576(2<sup>20</sup>). 20 intentos<br />
            <input type="submit" value="empezar" name="submitEmpezar">
        </form></fieldset>
    <br />
    <h2>    Piensa un número de ese intervalo</h2>
    <h2>    La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>
    <hr />

    <h2>    Cada vez que la aplicación te especifique un número deberás de indicar</h2>
    <ul>
        <ol>Si el número buscado es mayor</ol>
        <ol>Si el número buscado es menor</ol>
        <ol>Si has aceertado el nnúmero</ol>
    </ul>


</fieldset>