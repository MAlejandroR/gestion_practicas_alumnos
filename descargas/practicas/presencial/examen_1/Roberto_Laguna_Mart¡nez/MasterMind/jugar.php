<?php
spl_autoload_register(function ($clase) {//cargo las clases
    require "$clase.php";
});
session_start();//inicio sesión para poder guardar valores y recuperarlos

if (isset($_POST['reiniciar'])) {//botón para reiniciar, cerrando la sesión y volviendo a crearla
    session_destroy();
    session_start();
}
$totalJugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : []; //creo la sesión  y con una condición ternaria si no estuviera creada la creo
$clave = new Clave();
$jugada = new Jugada(filter_input(INPUT_POST, 'r1'), filter_input(INPUT_POST, 'r2'), filter_input(INPUT_POST, 'r3'), filter_input(INPUT_POST, 'r4'));
//genero la jugada recogiendo los datos del formulario para la jugada
$totalJugadas[] = $jugada;//creo el array que guarda las jugadas
if(sizeof($totalJugadas)>14){//si hay más de 14 jugadas en el array lo paso al fin y reinicio la sesión para empezar de 0
    session_destroy();
    header("Location:fin.php?mensaje=Lo siento has superado los intentos permitidos.");
}
$_SESSION['jugadas'] = serialize($totalJugadas);//serializo las jugadas para poder mantenerlas
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="width:40%">
            <legend>Mi jugada</legend>
            <form action="" method="POST">
                <select name="r1">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Verde</option>
                    <option>Violeta</option>
                    <option>Amarillo</option>
                    <option>Marrón</option>
                    <option>Rosa</option>
                </select>    
                <select name="r2">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Verde</option>
                    <option>Violeta</option>
                    <option>Amarillo</option>
                    <option>Marrón</option>
                    <option>Rosa</option>
                </select>
                <select name="r3">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Verde</option>
                    <option>Violeta</option>
                    <option>Amarillo</option>
                    <option>Marrón</option>
                    <option>Rosa</option>
                </select>
                <select name="r4">
                    <option>Azul</option>
                    <option>Rojo</option>
                    <option>Naranja</option>
                    <option>Verde</option>
                    <option>Violeta</option>
                    <option>Amarillo</option>
                    <option>Marrón</option>
                    <option>Rosa</option>
                </select><br/>
                <input type="submit" name="submit" value="Probar"/>&nbsp;&nbsp; <input type="submit" name="submit" value="Reiniciar"/>   
            </form>
        </fieldset>
        <fieldset style="width:40%">
            <legend>Jugadas realizadas</legend>
            <h1><?php//muestro las jugadas totales 
                foreach ($totalJugadas as $num => $jugada) {
                    echo "<h2>Jugada número $num <span style='color:red'>$jugada</span></h2>";
                }
                ?></h1>            
        </form>
    </fieldset>
    <fieldset style="width:40%">
        <legend>Clave generada</legend>
        <h1><?= $clave ?></h1>
        <input type="button" name="submit" value="Mostrar"/>&nbsp;&nbsp; <input type="button" name="submit" value="Ocultar"/>   
    </form>
</fieldset>

</body>
</html>



