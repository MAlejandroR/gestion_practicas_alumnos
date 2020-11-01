<?php
$numreinicio;

if ($_POST["desdeindex"] == "si") {
    $exponente = $_POST["juego"] - 1;
    $jugadas = 1;
    $num = pow(2, $exponente);
    $exponenteinicial = $_POST["juego"];
} elseif ($_POST["resultado"] == "mayor") {
    $exponente = $_POST["exponente"];
    $jugadas = $_POST["jugadas"];
    $num = $_POST["numero"] + round(pow(2, $exponente));
    $exponenteinicial = $_POST["expinicial"];
} elseif ($_POST["resultado"] == "menor") {
    $exponente = $_POST["exponente"];
    $jugadas = $_POST["jugadas"];
    $num = $_POST["numero"] - round(pow(2, $exponente));
    $exponenteinicial = $_POST["expinicial"];
} elseif ($_POST["resultado"] == "igual") {
    $jugadas = $_POST["jugadas"];
    header("Location:fin.php?jugadas=$jugadas");
} elseif ($_POST["mandar"] == "Reiniciar") {
    $exponente = $_POST["expinicial"] - 1;
    $jugadas = 1;
    $num = pow(2, $exponente);
    $exponenteinicial = $_POST["expinicial"];
}
?>
<html>
    <head>
        <style>
            body{
                background-color:#FFA07A;
            }
        </style>
    </head>
    <body>  
        <fieldset>
            <legend>Empieza el juego</legend>
        <h1>¿El numero es <?= $num ?>?</h1><br/>
        <h3><?= "Jugada número " . $jugadas ?></h3>
        <fieldset>
        <legend>Indica cómo es respecto al número que has pensado</legend>
        <form action="jugar.php" method="post">
            <input type="radio" name="resultado" value="mayor" checked/>Mayor<br/>
            <input type="radio" name="resultado" value="menor"/>Menor<br/>
            <input type="radio" name="resultado" value="igual"/>Igual<br/>
            <input type="hidden" name="numero" value="<?= $num ?>">
            <input type="hidden" name="exponente" value="<?= $exponente = $exponente - 1 ?>">
            <input type="hidden" name="expinicial" value="<?= $exponenteinicial ?>">
            <input type="hidden" name="jugadas" value="<?= $jugadas = $jugadas + 1 ?>">
            <input type="submit" name="mandar" value="Jugar">  
        </form> 
        </fieldset>
        <hr>
        <form action="jugar.php" method="post">
            <input type="hidden" name="expinicial" value="<?= $exponenteinicial ?>">
            <input type="submit" name="mandar" value="Reiniciar">
        </form>
        <form action="index.php" method="post">

            <input type="submit" name="mandar" value="Volver">
        </form>
        </fieldset>
    </body>
</html>
