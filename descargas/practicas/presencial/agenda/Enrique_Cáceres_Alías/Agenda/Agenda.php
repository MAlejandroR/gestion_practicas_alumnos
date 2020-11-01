<?php
var_dump($_POST);

switch ($_POST['submit']) {
    case 'agregar':
        
        $getuser = filter_input(INPUT_POST, 'user', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $usuario = filter_input(INPUT_POST, 'usuario');
        $usuario = trim($usuario);
        $numero = filter_input(INPUT_POST, 'numero');

        $expReg = "/^\d{9}$/";

        if (preg_match($expReg, $numero) && ($usuario != "")) {
            $getuser[$usuario] = $numero;
            
            
        }
        elseif ($usuario != "") {
            foreach ($getuser as $nom => $telef) {
                if($nom == $usuario){
                    unset($getuser[$usuario]);
                }
            }
        }
        else {
            echo "<p style='color:red;'>Número no válido o Nombre vacio</p>";
        }
        
        break;
    case 'eliminar':
        unset($getuser);
        break;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            td{ /* Todas las celdas de la tabla... */
                border: 1px solid black; /* tendrá un borde de 1 px */
            }
            body{
                background-color: gainsboro;
            }
            input[type=text] {
                border: 2px solid aquamarine;
                border-radius: 4px;
            }

            fieldset{
                background-color: darkorange;
                width: 30%;
                border-radius: 10px;
            }
            #f2{
                background-color: lightblue;
                width: 15%;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend>Nuevo contacto</legend>
            <form action="Agenda.php" method="POST">
                Nombre <input type="text" name="usuario" > <br> 
                Numero <input type="text" name="numero" > <br> 
                <input type="submit" value="agregar" name="submit">
                <input type="submit" value="eliminar" name="submit" <?php if ($getuser == 0) { ?> disabled <?php } ?>>
                <?php
                foreach ($getuser as $nom => $clicks) {
                    echo"<input type='hidden' value='$clicks' name='user[$nom]'>";
                }
                ?>
            </form>
        </fieldset>

        <fieldset id="f2">
            <legend>Agenda de contactos</legend>
            <table>

                <?php
                foreach ($getuser as $nom => $clicks) {

                    echo "<tr><td> $nom </td> <td> $clicks </td></tr>";
                }
                ?>

            </table>
        </fieldset>


    </body>
</html>
