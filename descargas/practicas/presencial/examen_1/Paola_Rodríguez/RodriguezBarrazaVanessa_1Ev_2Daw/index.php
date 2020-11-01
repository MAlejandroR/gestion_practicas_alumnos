<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Bienvenido al juego MasterMind</h1>
        <h2>Instruciones del juego</h2>
        <ul>
            <li>Debes seleccionar 4 colores en cada turno</li>
            <li>Si consigue tanto en color y posicición se te indicarán tantas como hayas acertado</li>
            <li>Debes adivinar antes de agotar tus 14 intentos</li>
            <li>Da click en jugar!</li>
        </ul>
        <form action="Jugar.php" method="POST"/>
        <input type="submit" value="empezar" name="empezar"/>
    </form>
</body>
</html>
