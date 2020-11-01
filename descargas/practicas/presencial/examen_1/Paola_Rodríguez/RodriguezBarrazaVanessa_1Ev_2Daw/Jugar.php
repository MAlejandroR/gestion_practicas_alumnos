<?php
spl_autoload_register(function ($clase) {
    require "$clase.php";
});

/* session_start();
  $clave = new Clave();
  $clave->generarClave();

  $all_jugadas = isset($_SESSION['jugadas']) ? unserialize($_SESSION['jugadas']) : [];

  $jugada = new Jugada();
  $all_jugadas = $jugada;

  $_SESSION['jugadas'] = serialize($all_jugadas); */




//Venimos de index.php, lo más optimo es que fuera .hmtl pero me daba fallos y la dejé tal cual para avanzar.
if (filter_input(INPUT_POST, 'empezar')) {
    $clave = new Clave();
    $clave->generarClave();
}
echo "Estas en jugar";
var_dump($clave);

// Si el jugador ha presionado jugar
//Leo los valores que me devuoleve el formulario
if (isset($_POST['jugar'])) {

//Declaro un array para guaradar mi jugada y poder compararlo con la clave generada
    $jugadaActual = [];

    $color1 = filter_input(INPUT_POST, 'color1');
    $color2 = filter_input(INPUT_POST, 'color2');
    $color3 = filter_input(INPUT_POST, 'color3');
    $color4 = filter_input(INPUT_POST, 'color4');

//Los asigno de ésta forma porque es más visual
    $jugadaActual[0] = $color1;
    $jugadaActual[1] = $color2;
    $jugadaActual[2] = $color3;
    $jugadaActual[3] = $color4;

//Guardo la longitud del array
    $longitud = count($jugadaActual);

// Agrego la jugada a mi arrays de jugadas_totales en la clase Jugada
// Recojo el valor de mi clave actual
    $clave = $_POST['clave'];



// Me declaro un arrayAuxiliar que necesitaré para comparar ambas claves (cliente-juego)
// Recorro el array actual y comparo con mi clave de juego los valores y las  los valores y las posiciones
    for ($i = 0; $i < $longitud; $i++) {
        for ($j = 0; $j < $longitud; $j++) {
// Si el color de jugada actual
// Se encuentra en la clave de la partida
            if ($jugadaActual[$i] == $clave[$j]) {
                $arrayAuxiliar = $i;
            }
        }
    }

    if (count($arrayAuxiliar) == 4) {
        $msj = "Has acertado!";
    }
} else if ($_POST['reset']) {
    $clave = new Clave();
    $clave->generarClave();
    $jugada = new Jugada();
    $jugada-- > borrarJugadas();
}

//TENGO QUE CREAR UN MÉTODO PARA COMPARAR LA JUGADA ACTUAL CON LA CLAVE
?>

<fieldset>
    <legend><h1>Establece la operación</h1></legend>


    <form action="Jugar.php" method="POST">
        <h1>Seleccione los colores de la partida</h1>
        <select name="color1">
            <option value="Azul"> Azul </option>
            <option value="Rojo"> Rojo </option>
            <option value="Naranja"> Naranja </option>
            <option value="Verde"> Verde </option>
            <option value="Violeta"> Violeta </option>
            <option value="Amarillo"> Amarillo </option>
            <option value="Marron"> Marron </option>
            <option value="Rosa"> Rosa </option>
        </select>

        <select name="color2">
            <option value="Azul"> Azul </option>
            <option value="Rojo"> Rojo </option>
            <option value="Naranja"> Naranja </option>
            <option value="Verde"> Verde </option>
            <option value="Violeta"> Violeta </option>
            <option value="Amarillo"> Amarillo </option>
            <option value="Marron"> Marron </option>
            <option value="Rosa"> Rosa </option>
        </select>

        <select name="color3">
            <option value="Azul"> Azul </option>
            <option value="Rojo"> Rojo </option>
            <option value="Naranja"> Naranja </option>
            <option value="Verde"> Verde </option>
            <option value="Violeta"> Violeta </option>
            <option value="Amarillo"> Amarillo </option>
            <option value="Marron"> Marron </option>
            <option value="Rosa"> Rosa </option>
        </select>

        <select name="color4">
            <option value="Azul"> Azul </option>
            <option value="Rojo"> Rojo </option>
            <option value="Naranja"> Naranja </option>
            <option value="Verde"> Verde </option>
            <option value="Violeta"> Violeta </option>
            <option value="Amarillo"> Amarillo </option>
            <option value="Marron"> Marron </option>
            <option value="Rosa"> Rosa </option>
        </select>
        <!--Utilizo $_POST porque la variable de $_SESSION me daba fallos a la hora de abrir y cerrar session-->
        <input type="hidden" name="<?php $clave ?>" name="clave[]"/>
        <input type="hidden" name="<?php $msj ?>" name="msj"/>

        <br/><br/>

        <input type="submit" value="jugar"/>
        <input type="submit" value="reset"/>
    </form>
</fieldset>
