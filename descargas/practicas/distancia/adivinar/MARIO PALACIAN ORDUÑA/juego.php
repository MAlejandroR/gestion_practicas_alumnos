<?php
$seguimiento=null;
$njugada=1;
if (isset($_POST["opcion"]) ) {
    
    $opcion = $_POST["opcion"];

    switch ($opcion) {
        case "o1":
            $max = 1024;
            $intentos = 10;
            break;
        case "o2":
            $intentos = 16;
            $max = 65365;
            break;
        case "o3":
            $intentos = 20;
            $max = 1048576;
            break;
    }
    //generamos aleatorio
    $numgen = rand(1, $max);


    //echo "opcion:intentos" . $opcion . ":" . $intentos;
} else {
    //echo "jugando n " . $intentos;
//pendiente (fallo header)?¿
    if (isset($_POST["volver"])) {
        header("Location:index.html");
        Exit();
    }
    if (isset($_POST["jugar"])) {
        $numgen = $_POST["nalea"];
        $res = $_POST["respuesta"];
        $max = $_POST["max"];
        $seguimiento=$_POST["seguimiento"];
        $njugada=$_POST["njugada"];
        $intentos = $_POST["intentos"] - 1;
        $seguimiento= $seguimiento."Num generado=".$numgen." numero de jugada=".$njugada."<br>";  
        echo $seguimiento;
        $njugada=$njugada+1;
        if ($intentos > 0 and $res != "igual") {

            switch ($res) {
                case "maq":
                    $numgen = rand($numgen, $max);
                    break;
                case "meq":
                    $max = $numgen;
                    $numgen = rand(1, $max);
                    break;
                case "igual":
                    echo "Yeahh he acertado!!";
                    break;
            }
            /*
            echo $intentos . " intentos<br>";
            echo $numaleatorio . " nalea<br>";
            echo $res . " respuesta<br>";
            echo $max . " max<br>";
             * 
             */
        } else {
            header("Location:fin.php");
            Exit();
        }//intentos
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adivina el numero</title>
    </head>
    <body>
        <form action="juego.php" method="post">
            <fieldset>
                <legend>Empieza el juego</legend>
                Es el numero <?php echo $numgen; ?> ??
                <br>
                Es mayor<input type="radio" value="maq" name="respuesta" >
                <br>
                Es menor<input type="radio" value="meq" name="respuesta">
                <br>
                Es igual<input type="radio" value="igual" name="respuesta">
                <br>
                <input type="hidden" name="intentos" value='<?php echo $intentos; ?>'>
                <input type="hidden" name="nalea" value= '<?php echo $numgen; ?>' >
                <input type="hidden" name="max" value= '<?php echo $max; ?>' >
                <input type="hidden" name="seguimiento" value= '<?php echo $seguimiento; ?>' >
                <input type="hidden" name="njugada" value= '<?php echo $njugada; ?>' >
                <input type="submit" value="volver" name="volver"/>
                <input type="reset" value="reiniciar">
                <input type="submit" value="jugar" name="jugar">
            </fieldset>
        </form>
    </body>
</html>
