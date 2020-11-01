<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina el número</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Juego adivina el número</h1>
    <form action="jugar.php" method="POST">
        <fieldset>
            <legend>Selecciona un intervalo</legend>
            <div>
                <label><input type="radio" name="intervalo" value="10"> 1 – 1024 (2<sup>10</sup>) <span class="text--gray">10 intentos</span></label>
                <label><input type="radio" name="intervalo" value="16"> 1 – 65536 (2<sup>16</sup>) <span class="text--gray">16 intentos</span></label>
                <label><input type="radio" name="intervalo" value="20"> 1 – 1048576 (2<sup>20</sup>) <span class="text--gray">20 intentos</span></label>
            </div>
            <div class="buttons">
                <input class="button" type="submit" value="Empezar">
            </div>
        </fieldset>
    </form>
</body>
</html>
