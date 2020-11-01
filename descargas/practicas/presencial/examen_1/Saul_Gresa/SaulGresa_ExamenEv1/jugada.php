<!--  
Apunte 1 del profesor
    El PHP arriba
-->

<?php
spl_autoload_register(function ($clase) {
    require "$clase.php";
});

session_start();

if($_POST['reset']){
    session_destroy();
    session_start();
}
$i = 0;
$a = enabled;
$all_claves = isset($_SESSION['claves']) ? unserialize($_SESSION['claves']) : [];

if($all_claves == []){
   $clave = new Clave();
   $all_claves[] = $clave;
} else {
   $clave = filter_input(INPUT_POST, 'clave');
}

foreach ($all_claves as $a => $clave){
    echo "<h2>Jugada número $a <span style='color:red'>$clave</span></h2>";
    $valores = $clave->getCombinacion();
    foreach ($valores as $valor){
        echo $valor;
    }
}

if(isset($_POST['jugar'])){
    $i = filter_input(INPUT_POST, 'int');
    $i++;
    if($i < 14){
        $c1 = filter_input(INPUT_POST, 'c1');
        $c2 = filter_input(INPUT_POST, 'c2');
        $c3 = filter_input(INPUT_POST, 'c3');
        $c4 = filter_input(INPUT_POST, 'c4');
        $intento=0;
        $contAciertos = 0;
        $contPos = 0;
        foreach ($all_claves as $a => $clave){
            $valores = $clave->getCombinacion();
            foreach ($valores as $valor){
                $intento++;
                if($c1 == $valor && $intento == 1){
                    $contPos++;
                }
                if($c2 == $valor && $intento == 2){
                    $contPos++;
                }
                if($c3 == $valor && $intento == 3){
                    $contPos++;
                }
                if($c4 == $valor && $intento == 4){
                    $contPos++;
                }
                if($c1 == $valor || $c2 == $valor || $c3 == $valor || $c4 == $valor){
                    $contAciertos++;
                }
            }
        }   
        if($contAciertos == 4 && $contPos == 4){
            $msj = "Has ganado";
            $a = disabled;
        } else {
            $msj = "Has acertados $contAciertos colores, estando $contPos en la posicion correcta";
        }
    } else {
        $msj = "Has superado la cantidad de intentos";
        $a = disabled;
    }

}

$_SESSION['claves'] = serialize($all_claves);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--
        Apunte 3 del profesor
            El estilo por separado en un archivo .CSS
        -->
         <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>
    <body>
        <h2><?= $msj ?></h2>
        <fieldset id="uno">
            <legend>Opciones de juego</legend>
            <form action="" method="POST">
                <input type="submit" value="Mostrar/Ocultar codigo" name="mc">
                <input type="submit" value="Reset" name="reset">
                <input type="hidden" value="<?= $clave ?>" name="clave">
                <input type="hidden" value="<?= $i ?>" name="int">
            </form>
        </fieldset>
        <?php if(isset($_POST['mc'])){ ?>
        <fieldset id="dos" >
            <legend>Muestro la clave</legend>
            <?= $clave ?>
        </fieldset>
        <?php } ?>
         <fieldset id="tres" >
            <legend>Selecciona una clave</legend>
            <form action="" method="POST">
                <select name="c1">
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Verde">Verde</option>
                    <option value="Violeta">Violeta</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Marron">Marron</option>
                    <option value="Rosa">Rosa</option>
                </select>
                <select name="c2">
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Verde">Verde</option>
                    <option value="Violeta">Violeta</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Marron">Marron</option>
                    <option value="Rosa">Rosa</option>
                </select>
                <select name="c3">
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Verde">Verde</option>
                    <option value="Violeta">Violeta</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Marron">Marron</option>
                    <option value="Rosa">Rosa</option>
                </select>
                <select name="c4">
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Verde">Verde</option>
                    <option value="Violeta">Violeta</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Marron">Marron</option>
                    <option value="Rosa">Rosa</option>
                </select>
                <br />
                <input type="submit" <?= $a ?> value="jugar" name="jugar">
            </form>
        </fieldset>
    </body>
</html>
