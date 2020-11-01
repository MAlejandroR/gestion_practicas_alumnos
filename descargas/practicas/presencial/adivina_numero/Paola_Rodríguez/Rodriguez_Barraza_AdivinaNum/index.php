<?php
$intentos = $_GET['intentos'];
$nivel = $_GET['nivel'];
$a = null;
$b = null;
$c = null;
switch ($nivel) {
    case 10:
        $a = "checked";
        break;
    case 15:

        $b = "checked";
        break;
    case 20:

        $c = "checked";
        break;
    default:
        $a = "checked";
        break;
}
// $variable = "checked";
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Adivinee  un número</title>
        <style>
            fieldset{
                background-color: beige;
                border: 1px;
                border-style: solid;
                width: 400px;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend>Escoja el nivel de dificultad</legend>
            <form action="jugar.php" method ="POST">
                1 al 1024 <input type ="radio" name ="intentos" <?=$a?>  value ="10"/><br/>
                1 al 65.536<input type ="radio" name ="intentos" <?=$b?> value ="15"/> <br/>
                1 al 1.048.536 <input type ="radio" name ="intentos" <?=$c?> value="20"/> <br/> <br/>               
                <input type ="submit" name ="submit" value ="Empezar"/> <br/>
            </form>
        </fieldset>
    </body>
</html>
