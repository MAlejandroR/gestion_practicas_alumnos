<!DOCTIPE html>

<?php
$tipo = $_POST["tipo"];
$maximo = pow(2, $tipo);
$intentos = $tipo;
$oportunidades = 0;
$f = fopen("log.txt", "a");
$maximo2 = $maximo / 2;


switch ($_POST['enviar']) {
//Boton jugar:
    case 'Jugar':
        
        $maximo = $_POST["maximo"];
        $maximo2 = $_POST["maximo2"];
        $oportunidades = $_POST["oportunidades"];
        $intentos = $_POST["intentos"];
        $oportunidades++;
        $maximo = $maximo / 2;

        switch ($_POST['resultado']) {
            //marcamos mayor
            case 'mayor':

                if ($oportunidades > 10) {
                    header("Location:/Adivina_Numeros/final.php");
                    exit;
                } else {
                    $maximo2 = $maximo2 + intdiv($maximo, 2);
                    $fecha = date("d-m-Y H:i:s", time());
                    fwrite($f, "$fecha . El usuario ha dicho que el número es MAYOR. Lleva $oportunidades intentos");
                    fwrite($f, PHP_EOL);
                }
                break;
                
            //marcamos menor
            case 'menor':

                if ($oportunidades > 10) {
                    header("Location:/Adivina_Numeros/final.php");
                    exit;
                } else {
                    $maximo2 = $maximo2 - intdiv($maximo, 2);
                    $fecha = date("d-m-Y H:i:s", time());
                    fwrite($f, "$fecha . El usuario ha dicho que el número es MENOR. Lleva $oportunidades intentos");
                    fwrite($f, PHP_EOL);
                }
                break;
                
            //marcamos igual
            case 'igual':

                $oportunidades = $_POST["oportunidades"];
                $fecha = date("d-m-Y H:i:s", time());
                fwrite($f, "$fecha . El usuario ha dicho que el número es CORRECTO!! Lleva $oportunidades intentos");
                fwrite($f, PHP_EOL);
                header("Location:/Adivina_Numeros/final.php?oportunidades=$oportunidades");
                exit;
                break;
        }
        break;
    
//Boton reiniciar
    case 'Reiniciar':

        $tipo = $_POST["tipo"];
        $maximo = pow(2, $tipo);
        $intentos = $tipo;
        $oportunidades = 0;
        $f = fopen("log.txt", "a");
        $maximo2 = $maximo / 2;
        break;
    
//Boton Volver
    case 'Volver':
        
        $intentos2 = $_POST["intentos2"];
        header("Location:/Adivina_Numeros/index.php?intentos=$intentos");
        exit;
        break;
}
//cerramos el fichero
fClose($f);
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Juego_Adivina_Numeros</title>
    </head>
    <body>
        Empieza el juego <br/>
        <h3>¿El número es <?php echo $maximo2 ?>?</h3>
        <h5>Llevas <?php echo $oportunidades ?> oportunidades<br/></h5>
        Indica cómo es el número que has pensado<br/>
        <form action="juego.php" method="POST">

            <input type="radio" value="mayor" name="resultado">Mayor<br/>
            <input type="radio" value="menor" name="resultado">Menor<br/>
            <input type="radio" value="igual" name="resultado">Igual<br/>

            <input type="submit" name="enviar" value="Jugar">
            <input type="submit" name="enviar" value="Reiniciar">
            <input type="submit" name="enviar" value="Volver">

            <input type="hidden" value="<?php echo $maximo2 ?>" name="maximo2">
            <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
            <input type="hidden" value="<?php echo $maximo ?>" name="maximo">
            <input type="hidden" value="<?php echo $oportunidades ?>" name="oportunidades">
            <input type="hidden" value="<?php echo $tipo ?>" name="tipo">

        </form>
    </body>
</html>



