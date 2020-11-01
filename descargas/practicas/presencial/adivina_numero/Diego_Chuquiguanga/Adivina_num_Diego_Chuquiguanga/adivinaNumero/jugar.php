<?php
//opción de la primera pantalla además del valor comenzar

$op = filter_input(INPUT_POST, 'op');

//recuperación de valores en  la página jugar 
$num = filter_input(INPUT_POST, 'numero');
$max = filter_input(INPUT_POST, 'max');
$min = filter_input(INPUT_POST, 'min');
$intentos = filter_input(INPUT_POST, 'intentos');
$contador = filter_input(INPUT_POST, 'contador');
$opcion = filter_input(INPUT_POST, 'opcion');
$pensado = filter_input(INPUT_POST, 'numeroPensado');

//búsqueda de la opción a jugar. 
//carga los valores de la opción
switch ($op) {

    case "op1":

        $num = 512;
        $max = 1024;
        $min = 1;
        $intentos = 10;
        $contador = 0;
        
        break;
    case "op2":

        $num = 16384;
        $max = 32768;
        $min = 1;
        $intentos = 15;
        $contador = 0;
     

        break;
    case "op3":

        $num = 524288;
        $max = 1048576;
        $min = 1;
        $intentos = 20;
        $contador = 0;
      
        break;
}



//control de intentos según la opción escogida
if ($intentos >= 1) {


    //variable con valores  de los botones "jugar","volver","reiniciar"
    switch ($opcion) {


        //opción donde se restara los intentos y incrementara contador de interntos, 
        //además de asignar valores a la variables según opción escogida en "mayor""menor""igual" 
        case 'jugar':


            switch ($pensado) {

                case "mayor":
                    $contador++;
                    $intentos--;
                    $min = $num;

                    break;

                case 'menor':
                    $contador++;
                    $intentos--;
                    $max = $num;
                    break;

                case 'igual'://opción donde se redirige a la pagina final con el mensaje del número acertado y los intentos 

                    $msj .= "HE HACERTADO TU NÚMERO" . $num . " en " . $contador . " intentos ";
                    header('location:fin.php ');
                    exit();

                default ://default por si la opción no ha sido escogida
                    $msj .= "Igual no selecciono una opción";
                    break;
            }//fin del switch jugar 

            break;

        case 'reiniciar'://opción que permite jugar otra vez, poniendo el contador a cero

            $intentos=$contador+$intentos;
            switch ($intentos){
                case 10;
                    $num = 512;
                    $max = 1024;
                    $min = 1;
                    $intentos =$intentos;
                    $contador = 0;
                    break;
                case 15:
                     $num = 16384;
                    $max = 32768;
                    $min = 1;
                    $intentos = $intentos;
                    $contador = 0;
                    break;
                case 20:
                    $num = 524288;
                    $max = 1048576;
                    $min = 1;
                    $intentos = $intentos;
                    $contador = 0;
                    break;
            }
            break;

        case 'volver'://opción que redirige a la página principal del juego
            header("location:principal.php");
            exit();
            break;
    }//fin primer switch
} else { //si los intentos han finalizado el juago finaliza y se envia a la página final
   
    $msj .= "¡ HE FALLADO O NO HAS SIDO SINCERO !";
    header("location:fin.php");
}

//condicional donde se desarrolla el cálculo del numero a adivinar 
if ($opcion == 'mayor') {
    $num = (round(($max - $min) / 2)) + $min;
} else {
    $num = (round(($max - $min) / 2) + $min);
}
?>
<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Juego</title>
        <style>
            body{
                background: #F7F7F7;
            }
            .principal{
                width: 900px;
                margin-left:500px;
                margin-right:100px;
                margin-top: 150px;
            }
            .cabecera{
                background: #3B5998;
                border-radius: 23px;
                margin: 35px;               
                color: white;
                height: 55px;
                text-align: center;
            }
            fieldset,label{
                text-align: center;
                background: #DFE3EE;
                display: block;
                margin: 10px;
            }
            .botones{
                display: inline;
                margin: 15px;
                margin-left: 200px;


            }
            .botones input{
                margin: 15px;
                border-radius: 23px;
                color: white;
                font-size: 35px;
                background: #3B5998;

            }
        </style>
    </head>
    <body>

        <div class="principal">
            <div class="cabecera">
                <h1> Empezamos a jugar</h1>
            </div>
            <div class="cuerpo">
                <div class="informacion">
                    <h2>El número es  <?= $num ?> ?</h2>
                    <h3>Jugada <?= $intentos ?></h3>
                </div>
                <form action="jugar.php" method="POST">
                    <fieldset><!--opciones del número pensado-->
                        <legend>Indica cómo es el número qué has pensado</legend>
                        <label><input type="radio" name="numeroPensado" value="mayor">Mayor</label>
                        <label><input type="radio" name="numeroPensado" value="menor">Menor</label>
                        <label><input type="radio" name="numeroPensado" value="igual">Igual</label>
                        
                       <!--inputs ocultos que permiten almacenar información para déspues recuperarla-->
                        <input type="hidden" value="<?php echo $num ?>" name="numero">
                        <input type="hidden" value="<?php echo $max ?>" name="max">
                        <input type="hidden" value="<?php echo $min ?>" name="min">
                        
                       <!--inputs ocultos que permiten almacenar información para déspues recuperarla en la página final "Actualmente desavilitada "-->     
                        <input type="hidden" value="<?php echo $intentos ?>" name="intentos">                       
                        <input type="hidden" value="<?php echo $contador ?>" name="contador">
                        <input type="hidden" value="<?php echo $msj ?>" name="mensaje">
                    </fieldset>
                    
                    <div class="botones"> <!--botones-->
                        <input type="submit" value="reiniciar" name="opcion">
                        <input type="hidden" value="<?php echo $reinicia ?>" name="restart">

                        <input type="submit" value="jugar" name="opcion">         

                        <input type="submit" value="volver" name="opcion">
                    </div>

                </form> 

            </div>
        </div>
    </body>
</html>
