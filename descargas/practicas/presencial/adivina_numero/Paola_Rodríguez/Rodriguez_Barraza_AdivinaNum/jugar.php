<?php
// GUARDO EL VALUE (10,15,20) QUE RECOJO DEL INDEX.PHP

$intentos = $_POST['intentos']; //el número de intentos permitidos
// GUARDO EL NUMERO DE INTENTOS PARA NO PERDER EL VALOR INICIAL EN CASO DE PRESIONAR REINICIAR
$nivel = (int) $intentos;
$turno = $_POST['turno'];
$msj = "<h2>Has adivinado al intento $turno </h2>";

// SI EL USUARIO SE HA AGOTADO LOS INTENTOS LO REDIRIJO A FIN.PHP
if ($intentos === $turno) {
    $msj = "<h2>Se te han acabado los turnos, era el intento $turno/h2>";
    header("Location: fin.php?msj=$msj");
    exit();
}

switch ($_POST['submit']) {

    //TANTO REINICAR COMO EMPEZAR TENDRAN LOS MISMOS VALORES INICIALES.  
    case "Reiniciar": //---> DESDE JUGAR.PHP        
        
    case "Empezar": //---> DESDE INDEX.PHP
        // RECOJO, CALCULO Y ALAMACENO EN INPUTS DE TIPO HIDDEN LOS DATOS QUE
        // NECESARIOS PARA EMPEZAR LA PARTIDA.     
        $turno = 1;
        $min = 1;
        $max = pow(2, $nivel);
        $num_usuario = round((($max - $min) / 2) + $min);
        break;

    case 'Jugar':

        $min = $_POST['min'];
        $max = $_POST['max'];
        $num_usuario = $_POST['num_usuario'];
        $turno = $_POST['turno'];
        $turno ++;        
        // RECOGEMOS EL VALOR QUE NOS DEVUELVE LA SELECCIÓN DE UNO DE LOS BOTONES DE TIPO RADIO
        // SI NOS HAN ESCOGIDO UNA DE LAS OPCIONES
        //SE OPERA SEGÚN LO INDICADO Y SE DESCUENTA UN INTENTO.
        switch ($_POST['respuesta_usuario']) {
            case "mayor":
                $min = $num_usuario;                
                break;
            case "menor":
                $max = $num_usuario;
                break;
            case "igual":
                header("Location:fin.php?msj=$msj");
                exit();
                break;
            default :
                header("Location:index.php?nivel=$nivel");
                break;
        }//Fin del switch de jugar
        
        break; // Fin de jugar.

    case 'Volver':
        $nivel = $_POST['nivel'];
        header("Location:index.php?nivel=$nivel");
        break;
}
// RECALCULAMOS EL NÚMERO DE USUARIO
$num_usuario = round((($max - $min) / 2) + $min);
$preg = "<h2>Es tu número el $num_usuario ?</h2><br/><h4> Jugada $turno</h4>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Jugando...</title>
        <style>
            #uno{
                background-color: beige;
                border: 1px;
                border-style: solid;
                width: 400px;
            }
            #dos{
                background-color: #FDEDEC;
                border: 1px;
                border-style: solid;
                width: 200px;
            }
        </style>
    </head>
    <body>
        <fieldset id="uno">
            <legend>Juego en curso</legend>


            <fieldset id="dos">
                <legend>Indicame para adivinar</legend>
                <form action="jugar.php" method ="POST">

                    <p><?= $preg ?></p>                    
                    <input type="hidden" name="num_usuario" value="<?= $num_usuario ?>"/>
                    <input type="hidden" name="max" value="<?= $max ?>"/>
                    <input type="hidden" name="min" value="<?= $min ?>"/>
                    <input type="hidden" value="<?= $intentos ?>" name="intentos"/>                  
                    <input type="hidden" value="<?= $nivel?>" name="nivel"/>
                    <input type="hidden" value="<?= $turno ?>" name="turno"/>

                    Es Mayor <input type ="radio" name ="respuesta_usuario" value ="mayor"/><br/>
                    Es Menor <input type ="radio" name ="respuesta_usuario" value ="menor"><br/>
                    Es igual  <input type ="radio" name ="respuesta_usuario" value="igual"/><br/><br/>

                    <input type ="submit" name = "submit" value ="Jugar"/>
                    <input type ="submit" name = "submit" value ="Volver"/>
                    <input type ="submit" name = "submit" value ="Reiniciar"/><br/>
                </form>
            </fieldset>
        </fieldset>
    </body>
</html>
