<?php
    spl_autoload_register(function($clase) {
    require "$clase.php";
});
session_start();
$mostrar ="Mostrar";
$disabled="";
$colores=['Azul','Rojo','Naranja','Verde','Violeta','Amarillo','Marrón','Rosa'];
switch($_POST['submit']){
    case 'Jugar':
        $contador = $_SESSION['contador'];
        $contador++;
        $clave = $_SESSION['clave'];
        $informacionJugada = $_SESSION['informacion'];
        
        $jugada[] = $_POST['color1'];
        $jugada[] = $_POST['color2'];
        $jugada[] = $_POST['color3'];
        $jugada[] = $_POST['color4'];
        
        if ($contador>=14){
            $disabled ="disabled";
            $informacionJugada="Has llegado al número máximo de intentos, has perdido"
                    . "<br> Haz click en reiniciar para volver a jugar";
        }else{
        $informacionJugada .= "Jugada numero $contador: $jugada[0] $jugada[1] $jugada[2] $jugada[3]<br>";
        $jugada= new Jugada($clave->toArray(), $jugada);
        $posicionesAcertadas = $jugada->comprobarJugada();
        if ($posicionesAcertadas===true){
            $informacionJugada="Enhorabuena!! Has ganado en tan solo $contador intentos"
                    . "<br> Haz click en reiniciar para volver a jugar";
            $disabled ="disabled";
        }
        }
        
        $_SESSION['informacion'] = $informacionJugada;
        $_SESSION['contador'] = $contador;
        break;
    case 'Mostrar':
        $clave = $_SESSION['clave'];
        $msj= $clave;
        $mostrar ="Ocultar";
        break;
    case 'Ocultar':
        $msj="";
        break;
    default:
        session_destroy();
        session_start();
        $contador = 0;
        $clave = new Clave();
        $clave->generarClave($colores);
        $_SESSION['clave'] = $clave;
        $_SESSION['contador'] = $contador;
        break;
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>
    <body>
        
        
                <fieldset>
            <legend>Establece la operación</legend>
            <form action="index.php" method="POST">
                <select name="color1">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value=$color>$color</option>";
                    }
                    ?>
                </select>
                <select name="color2">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value=$color>$color</option>";
                    }
                    ?>
                </select>
               <select name="color3">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value=$color>$color</option>";
                    }
                    ?>
                </select>
                <select name="color4">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value=$color>$color</option>";
                    }
                    ?>
                </select>
                
                <input type="submit" name="submit" value="Jugar" <?=$disabled?>>
                <input type="submit" name="submit" value="Reiniciar">                
            </form>
            </form>
        </fieldset>
        <fieldset id="ayuda" >
            <legend>Mostrar/esconder clave</legend>
            <form action="index.php" method="POST">
                <h3><?php echo $msj?></h3>
                <input type="submit" name="submit" value="<?=$mostrar?>" <?=$disabled?>/>
               
            </form>
        </fieldset>
        <fieldset id="rtdo">
            <legend>Jugadas</legend>
            <h3><?php echo $informacionJugada?></h3>
            <h4><?php echo $posicionesAcertadas?></h4>
        </fieldset>
    </body>
</html>
