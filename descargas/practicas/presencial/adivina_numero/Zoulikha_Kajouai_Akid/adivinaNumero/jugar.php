<?php
if ($_POST["jugada"] != (-1)) {
    if ($_POST["sumar"] == 1) {
        $exp = $_POST["jugada"] - 1;
        $ronda = $_POST["jugada"];
        $num = pow(2, $exp);
        $inicio = $_POST["jugada"];
    } elseif ($_POST["sumar"] == "true") {

        $exp = $_POST["jugada"] - 1;
        $ronda = $_POST["jugada"];
        $inicio = $_POST["inicial"];
        $num = $_POST["num"] + round(pow(2, $exp));
    } elseif ($_POST["sumar"] == "false") {

        $exp = $_POST["jugada"] - 1;
        $ronda = $_POST["jugada"];
        $inicio = $_POST["inicial"];
        $num = $_POST["num"] - round(pow(2, $exp));
    } elseif ($_POST["sumar"] == "null") {
        $ronda = $_POST["jugada"];
        $num = $_POST["num"];
        $inicio = $_POST["inicial"];
        header("Location:fin.php?jugadas=$ronda&num=$inicio");
    }
} else {
    $ronda = $_POST["jugada"];
    $num = $_POST["num"];
    $inicio = $_POST["inicial"];
    header("Location:fin.php?jugadas=$ronda&num=$inicio");
}
?>
<!doctype html>
<html>        
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>

    <body>
        <h1>VOY A ADIVINAR TU NUMERO</h1>
<?php
echo"<h1>El numero es " . $num . " ?</h1>";
echo"<h3>" . (($inicio + 1) - $ronda) . "º Jugada </h3> ";
?>
        <fieldset>
            <legend>Empieza el juego</legend>
            <fieldset>
                <legend>Indica como es el número que has pensado</legend>
                <form action="jugar.php" method="post">
                    <input type="radio" name="sumar" value="true" checked="">Mayor<br>
                    <input type="radio" name="sumar" value="false">Menor<br>
                    <input type="radio" name="sumar" value="null">Igual<br>
                    <input type="hidden" name="num" value="<?= $num ?>">
                    <input type="hidden" name="jugada" value="<?= $ronda = $ronda - 1 ?>">
                    <input type="hidden" name="inicial" value="<?= $inicio ?>"><br>
                    <input type="submit"  value="jugar">
                </form>
            </fieldset>

            <form action="accion.php" method="post">
                <input type="hidden" name="jugada" value="<?= $inicio ?>">
                <input type="hidden" name="sumar" value="1"><br><br>
                <input type="submit"  value="reiniciar">
                <button type="button" ><a href="index.php" >Volver</a></button>
            </form>
        </fieldset>
    </body>
</html>