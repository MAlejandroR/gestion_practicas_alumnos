<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica 03 - DWES | Fernando Cebrián Carreras</title>
    </head>
    <body>
    <fieldset style="margin-left:25%;text-align: center;width:600px;border-color:red">
    <legend><h2>ADIVINA EL NÚMERO</h2></legend>
    <h3>Piensa un número y la aplicación lo acertará antes de agotar el número de intentos establecidos</h3>
    <p>Cada vez que la aplicación te especifique un número, deberás de indicar si el número buscado <strong>es mayor</strong>, si el número buscado<strong> es menor</strong> o si ha <strong>acertado</strong> el número </p>
    </fieldset>
    <br />
    <fieldset style="margin-left:31%;text-align: left;width:400px;border-color:blue">
    <legend><b>Selecciona un intervalo y haz clic en jugar</b></legend>
    <form action="jugar.php" method="POST">
    <p><input type="radio" name="opcion" value="1" style="margin-left:25%" checked>1-1.024(2<sup>10</sup>) / 10 intentos </p><p><input type="radio" name="opcion" value="2" style="margin-left:25%"/>1-65.536(2<sup>16</sup>) / 16 intentos</p><p><input type="radio" name="opcion" value="3" style="margin-left:25%"/>1-1.048.576(2<sup>20</sup>) / 20 intentos</p>
    <input type="submit" name="boton" value="Jugar" style="width:250px;height:30;margin-left:20%"/>
    <p><input type="hidden" name="intentos" value="0"></p>
    <p><input type="hidden" name="inferior" value="1"></p>
    </fieldset>
    </form>
    </body>
</html>
