<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adivina número</title>
    </head>
    <body>
        <fieldset style="width: 50%;float: left;margin-left: 20%;background: bisque">
            <legend><h1>Juego adivina número</h1></legend>
            <h2>    Te adivino un número que tu generas</h2>
            <h2>    El número debe estar entre 1 y 1024</h2>
            <h2>    Cada vez que te mande un número deberas indicar</h2>
            <ul>
                <ol>Si el número es mayor</ol>
                <ol>Si el número es menor</ol>
                <ol>Si he acertado el número</ol>
            </ul>
            <h2>    Tengo 10 intentos</h2>
            <h2>    Se indicará el numero de intentos que me quedan</h2>
            <form action="jugar.php" method="POST">
                <input type="submit" value="Empezar" name="submit">
            </form>
        </fieldset>

    </body>
</html>
