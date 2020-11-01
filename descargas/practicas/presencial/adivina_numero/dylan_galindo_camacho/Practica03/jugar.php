<?php

    // Que la aplicacion adivide el nº que hemos pensado en el rango elegido...    
    $opcionRadio = "";
    $num_intentos = 0;
    $rango = filter_input(INPUT_GET, 'info'); //$_GET['info']; // Lo que envia del index.php (intervalo...)
    // Segun el valor del rango tendrea 'x' intentos...
    if ($rango == 1024) {
        // Si el rango es 1024 tendra 10 intentos, para adivinar el nº pensado...
        $num_intentos = 10;
    } elseif ($rango == 65536) {
        // Si el rango es 65536 tendra 15 intentos, para adivinar el nº pensado...
        $num_intentos = 15;
    } else {
        // Si el rango es 1048576 tendra 20 intentos, para adivinar el nº pensado...
        $num_intentos = 20;
    }
        
    $intentos = 1; 
    $num = $rango / 2; // Primer opcion (la mitad del intervalo seleccionado) para indicarle si es el nº buscado...
    $min = 1; // Nº minimo... (0)
    $max = $rango; // Nº maximo...
    $info = "El número es $num?";
    $infoIntentos = "<b>Jugada $intentos</b> (nº de intentos)";
    // Para el LOG la ruta del fichero
    $ruta = "./log.txt";
    
        
    // Funcion donde obtenemos el valor del radio, y segun el valor realizaremos operaciones...
    // Donde asignaremos el nuevo valor min, max, nº de intentos... 
    function opcion($opcion) {
        global $min, $max, $num, $rango, $info, $infoIntentos, $intentos, $num_intentos;

        switch ($opcion) {
            case "mayor":
                // Le decimos a la app que necesitamos un nº MAYOR para adivinar el nº pensado...
                // Obtenemos el nº generado que esta en input(hidden), es decir,
                // el nº que informamos (El número es 'x') mitad del min+max...
                $num = filter_input(INPUT_POST, 'num_generado'); // Obtener el nº indicado, cambia segun la opcion elegida...
                // Como estamos en la opcion MAYOR, el nº minimo sera el nº generado anterior 512 y ya no 1...
                $min = $num; // Asignamos el nuevo nº minimo...
                // Obtenemos el valor que esta en un input(hidden) el ultima valor maximo generado...
                $max = filter_input(INPUT_POST, 'max');
                // Obtenemos el nuevo nº a mostrar por ejemplo, min=512 y max=1024, el num=768 se muestra al usuario... 
                // Si el nº pensado es mayor, seguimos con lo anterior el min=num, max=1024, asi sucesivamente...
                //$num = ($min+$max)/2; //El valor a informar es la mitad... del nuevo nº min y max...
                //intdiv(dividendo, divisor) para rodondear que no nos de un float o double SOLO INT...
                $num = intdiv(($min+$max),2); //El valor a informar es la mitad... del nuevo nº min y max...
                // Informamos al usuario si el nº elegido es el pensado...
                $info = "El número es $num?";
                // Obtenemos el valor de los intentos que esta en input(hidden)...
                $intentos = (int) filter_input(INPUT_POST, 'intentos');
                $intentos++; // Sumamos los intentos que lleva...
                $infoIntentos = "<b>Jugada $intentos</b> (nº de intentos)"; // Informamos de la jugada...
                
                // Log
                fichero($intentos, $num);
                
                // Si el nº de intentos es 10 que finalice el juego
                if($intentos > $num_intentos) { //if ($intentos >= 10){
                    header("Refresh:0; url=fin.php?intent=$intentos&num=$num");
                    exit();                               
                }
                
                break;

            case "menor":
                // Le decimos a la app que necesitamos un nº MENOR para adivinar el nº pensado...
                // Lo mismo que el anterior obtenemos el 1º nº que generamos (la mitad del intervalo)
                $num = filter_input(INPUT_POST, 'num_generado');
                // Como estamos en la opcion MENOR, nº MAX=$num (nº que generamos), es decir, que ahora
                // tenemos que generar un nº de 1 a la mitad del intervalo, y ya no el valor maximo del mismo
                // Ej: 1º intervalo (1024) min=1, max=1024 ahora sera max=512 y generaremos un nº entre 1 a 512...
                
                $max = $num; // Asignamos al nº maximo, es decir, el nº generado (mitad del intervalo...)...
                // Obtenemos el valor que esta en un input(hidden) el ultima valor minimo generado...
                $min = filter_input(INPUT_POST, 'min');
                // Operacion para obtener el nuevo nº a generar para informar si es el nº pensado...
                //$num = ($min+$max)/2; // Nuevo valor al nº generado para saber si es el nº pesado...
                //intdiv(dividendo, divisor) para rodondear que no nos de un float o double SOLO INT...
                $num = intdiv(($min+$max),2); //Nuevo valor al nº generado para saber si es el nº pesado...
                // Informamos al usuario si el nº elegido es el pensado...
                $info = "El número es $num?";
                // Obtenemos el valor de los intentos que esta en input(hidden)...
                $intentos = (int) filter_input(INPUT_POST, 'intentos');
                $intentos++; // Sumamos los intentos que lleva...
                $infoIntentos = "<b>Jugada $intentos</b> (nº de intentos)"; // Informamos de la jugada...
                
                // Log
                fichero($intentos, $num);
                
                // Si el nº de intentos es 10 que finalice el juego
                if($intentos > $num_intentos) { //if ($intentos >= 10){
                    header("Refresh:0; url=fin.php?intent=$intentos&num=$num");
                    exit();                               
                }               
                
                break;
            
            case "igual":
                // Indicamos que el nº generado por la app es igual al nº pensado...
                // Obtenemos el valor de los intentos que esta en input(hidden)...
                $intentos = (int) filter_input(INPUT_POST, 'intentos');
                $infoIntentos = "<b>Jugada $intentos</b> (nº de intentos)"; // Informamos de la jugada...
                $num = filter_input(INPUT_POST, 'num_generado');
                
                // Log
                fichero($intentos, $num);
                
                header("Refresh:0; url=fin.php?intent=$intentos&num=$num");
                exit();
                break;
            
            default:
                break;
        }
    }
  
    // Fucion para el Log...
    function fichero($intentos, $num) {
        // ruta para abrir o crear si no existe el fichero...
        //$ruta = "/var/www/Practica03/log.txt";
        //$ruta = "./log.txt";
        global $ruta;
        $file = fopen($ruta, "a+");
        $hora = date("H:i:s");
        
        fwrite($file, "Hora: ($hora), número de la jugada ($intentos intentos), número aportado $num");
        fwrite($file, PHP_EOL);
        fclose($file);
    }
    
    // Clic en algun BTN (name="enviar")
    switch (filter_input(INPUT_POST, 'enviar')) {
        case "Jugar":
            // Optenemos el valor del radio (Opcion seleccionada...)
            $opcionRadio = filter_input(INPUT_POST, 'opcion');            
            
            // Si ha elegido una opcion, realizar operaciones, sino informar del error...
            if (isset($opcionRadio)){
                // Funcion que realiza operacion segun el radio seleccionado...
                opcion($opcionRadio);
            }
            else 
                // Si no elige una opcion, informar...
                $info = "<style> h3 {color: red;}</style>Debes seleccionar una opción.";      
            break;

        case 'Reiniciar':
            // Clic BTN Reset (nuevo nº aleatorio, intentos...)            
            $num = $rango / 2;             
            $info = "El número es $num?";
            $intentos = 0;
            
            // Al pulsar el BTN Reiniciar, que elimine el fichero... y vuelva a escribir los nuevos valores...
            // Con unlink(file) -> Eliminamos el fichero, pasando la ruta...
            unlink($ruta);
            break;
        
        case 'Volver':
            // Clic BTN volver -> redigirir a index y enviar los intentos
            //header("Location: index.php");          
            header("Refresh:0; url=index.php?intent=$rango");
            exit();
            break;

        default:
            // Por defecto entra la 1º vez aqui... lo que obtenemos del index es decir el rango / 2
            // escribimos el 1º numero generado en el fichero, es decir, rango 1024 escribimos 512 primero luego segun la opcion...
            fichero($intentos, $num);
            break;
    }
    

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adivinar número</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>               
        <fieldset>
            <legend>Empieza el juego</legend>
            <!-- Sintaxis abreviada, símbolo igual justo después de la etiqueta de apertura de PHP. 
            Antes de PHP 5.4.0, este tipo de sintaxis abreviada únicamente funciona con la opción 
            de configuración short_open_tag activada. como el <h3> info - Line 11 -->
            <h3><?=$info?></h3>
            <p><?php echo $infoIntentos ?></p>
            <form action="" method="POST">                
                <fieldset>
                    <legend>Indica cómo es el número qué has pensado</legend>        
                    <div>
                        <input type="radio" name="opcion" value="mayor" />Mayor<br />
                        <input type="radio" name="opcion" value="menor" />Menor<br />
                        <input type="radio" name="opcion" value="igual" />Igual<br />
                    </div>                    
                </fieldset>
                <hr />
                <!-- Campos ocultos que obtendran los nuevos valores, ya sea el nuevo valor max, min, intentos... -->
                <input type="hidden" value="<?php echo $num ?>" name="num_generado">
                <input type="hidden" value="<?php echo $min ?>" name="min">
                <input type="hidden" value="<?php echo $max ?>" name="max">
                <input type="hidden" value="<?php echo $intentos ?>" name="intentos">
                <!-- BTN -->                
                <input type="submit" name="enviar" value="Reiniciar">
                <input type="submit" name="enviar" value="Volver">
                <input type="submit" name="enviar" value="Jugar">
            </form>
        </fieldset>
    </body>
</html>