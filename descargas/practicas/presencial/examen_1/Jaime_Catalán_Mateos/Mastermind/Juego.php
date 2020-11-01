<?php
spl_autoload_register(function($clase) {
    require "$clase.php";
});
    session_start();
    
    $gamaColores = ['Blanco','Morado','Negro', 'Naranja', 'Azul', 'Amarillo', 'Verde', 'Rojo'];
    
    switch ($_POST['submit']){
        case 'Empezar'://creamos el array de de colores
            for ($indice=0; $indice<4; $indice++){
                $aleatorio = rand(0, count($gamaColores)-1);
                $clave[$indice] = $gamaColores[$aleatorio];
            }
            $_SESSION['clave'] = $clave;
            $_SESSION['intentos'] = 0;
            $mensaje = "¡Dale chaval!";
            break;
        
        case 'Jugar':
            
            $clave = $_SESSION['clave'];//recogemos la clave de la variable sesion 
            $_SESSION['intentos'] += 1;//cuando le da a jugar sumanos un intento
            
            //creamos un array para guardar nuestros colores
            $jugada[] = $_POST['color1'];
            $jugada[] = $_POST['color2'];
            $jugada[] = $_POST['color3'];
            $jugada[] = $_POST['color4'];
            var_dump($jugada);
            var_dump($clave);
            
            
            //Comparamos los arrays en busca de coincidencias
            $compara = new Clave($clave, $jugada);
            $coloresAcertados = $compara->contarColores();
            $posicionesAcertadas = $compara->mirarPosicion();
            
            $mensaje="Has acertado $coloresAcertados colores en $posicionesAcertadas posiciones<br>"
                    . "Has puesto $jugada[0], $jugada[1], $jugada[2] y $jugada[3]";
            break;
        
        case 'muestraClave':
            $clave = $_SESSION['clave'];
            $intentos = $_SESSION['intentos'];
            $LaClaveDice = "Clave $clave[0], $clave[1], $clave[2] y $clave[3]. Este es el orden.";
            $mensaje = "Ya sabes la clave, discurre un poco chaval :D";
            break;
        
        default:
            header("Refresh:2;url=index.html");
            $mensaje = "No te pases de listo colega";
            break;
    }
    
