<?php
$resultado = filter_input(1, "resultado"); //Leo el número de intentos que he mandado por GET
$dificultad = filter_input(1, "dificultad"); //Leo la dificultad que he mandado por GET

if ($resultado == "") {//No se ha llegado a la página desde jugar.php
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>



        <h1>Pantalla de fin</h1>

        <?php
        if ($resultado <= $dificultad + 1) {//Si el usuario ha acertado
            echo "    He terminado en $resultado jugadas.<br>";
        } else {//Si se ha pasado de intentos.
            echo "Me has hecho trampas :P<br>";
        }
        ?>

        <form class="" action="index.php" method="post">

            <input type="submit" name="submit" value="Reiniciar">
            <input type="hidden" name="dificultad" value="<?= $dificultad ?>"><!--Mando por Post la dificultad al index -->

        </form>

    </body>
</html>
