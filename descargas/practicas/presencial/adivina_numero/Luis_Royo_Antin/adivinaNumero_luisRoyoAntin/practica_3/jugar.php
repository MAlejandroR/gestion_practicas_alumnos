<!--
AUTOR: LUIS ROYO ANTÍN 2ºDAW
-->
<?php
//$opcion la recibe del index.php. Es la opción que ha elegido el usuario, entre las tres posibles.
$opcion = filter_input(INPUT_POST, "opcion");
//$opcionJuego la recibe del formulario de más abajo. Tendrá un valor u otro en función de si el usuario
//selecciona "mayor", "menor" o "igual". 
$opcionJuego = filter_input(INPUT_POST, "opcionJuego");
//El número de jugada también lo recibe del formulario de más abajo. Se irá incrementando siempre que el usuario
//seleccione "mayor" o "menor". 
$numeroJugada = filter_input(INPUT_POST, "numeroJugada");
//El límite de jugadas también se envía a través del formulario. Me interesa que sea así, ya que lo tengo que tener
//siempre presente porque llevaré al usuario a fin.php en el momento en el que el número de jugada sea mayor
//que dicho límite. 
$limiteJugadas = filter_input(INPUT_POST, "limiteJugadas");
//El submit lo recibo fundamentalmente para resetear, como se puede ver en el if-else
$submit = filter_input(INPUT_POST, "submit");
//Por defecto estará chequeada la opción "mayor". Todo ello con el objetivo de evitar problemas, si el usuario decide refrescar
//la página durante el juego, por ejemplo. 
$checkedMayor = "checked";

//Si el usuario ha reseteado o viene del index.php, el programa pondrá el mínimo a cero, el número de jugada a
//uno (porque al entrar en una opción el programa ya divide el máximo entre dos) y establecerá el máximo y 
//el primer número posible. 
if ($submit == "Reset" OR isset($opcion)) {
    $numeroJugada = 1;
    $min = 0;
    //En función de la opción marcada por el usuario en index.php el límite será uno u otro. 
    switch (true) {
        case $opcion == "10":
            $limiteJugadas = 10;
            break;
        case $opcion == "15":
            $limiteJugadas = 15;
            break;
        case $opcion == "20":
            $limiteJugadas = 20;
            break;
    }
    //El máximo quedará establecido en función del límite con una potencia de base dos: 
    $max = pow(2, $limiteJugadas);
    //Como comentaba líneas arriba, el primer número posible será una división del máximo entre dos. 
    $numeroPosible = $max / 2;
} else {
    //En el caso de que el usuario no venga del index, ni haya reseteado, nos queda la opción de que esté 
    //jugado (condición del if) o el resto de opciones (por ejemplo refrescar la página en el navegador)
    if (isset($opcionJuego)) {
        switch (true) {
            //Si el usuario marca la opción "igual" o supera el número de jugadas permitidas, el programa
            //le llevará a fin.php, con la información necesaria para poderle mostrar un mensaje en fin.php, 
            //en función de si ha acertado el número o no. 
            case $opcionJuego == "=":
            case $numeroJugada > $limiteJugadas:
                header("Location: fin.php?numeroJugada=$numeroJugada&limiteJugadas=$limiteJugadas");
                break;
            //Los máximos y los mínimos cambiarán en función de si elige "mayor" o "menor". 
            //También el programa marcará el radio buttom correspondiente a la opción que haya elegido el usuario:
            case $opcionJuego == "<";
                $max = filter_input(INPUT_POST, 'numeroPosible');
                $min = filter_input(INPUT_POST, 'min');
                $numeroPosible = round((($max - $min) / 2) + $min);
                $numeroJugada++;
                $checkedMenor = "checked";
                break;
            case $opcionJuego == ">";
                $max = filter_input(INPUT_POST, 'max');
                $min = filter_input(INPUT_POST, 'numeroPosible');
                $numeroPosible = round((($max - $min) / 2) + $min);
                $numeroJugada++;
                $checkedMayor = "checked";
                break;
        }
    } else {
        header("Location: index.php?");
    }
}
?>

<!DOCTYPE html
    <html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <fieldset style="background-color: rosybrown;width:40%">
        <legend><b>Empieza el juego</b></legend>
        <h3>¿El número es <?= $numeroPosible ?>?</h3>
        <p>Jugada número <?= $numeroJugada . "/" . ($limiteJugadas + 1) ?> </p>
        <form action="jugar.php" method="post">
            <input type="radio" name="opcionJuego" value=">" <?= $checkedMayor ?>/>Mayor<br/>
            <input type="radio" name="opcionJuego" value="<" <?= $checkedMenor ?>/>Menor<br/>
            <input type="radio" name="opcionJuego" value="=" />Igual<br/>
            <!-- He colocado echos en los values porque el programa necesita los valores de esas variables
            para ir mostrando números y haciendo cálculos, conforme el usuario o la usuaria va jugado (es decir, 
            marcando opción "menor" o "mayor"-->
            <input type="hidden" value="<?= $numeroPosible ?>" name="numeroPosible">
            <input type="hidden" value="<?= $max ?>" name="max">
            <input type="hidden" value="<?= $min ?>" name="min">
            <input type="hidden" value="<?= $numeroJugada ?>" name="numeroJugada">
            <input type="hidden" value="<?= $limiteJugadas ?>" name="limiteJugadas">
            <input type="submit" value="Jugar" name="submit"/>
            <input type="submit" value="Reset" name="submit"/>
        </form>
        <!-- En caso de que el usuario haga click sobre "volver", se le redireccionará al index. 
        También el programa le enviará al index la opción, con el objetivo de que, si por ejemplo ha marcado
        la primera opción, esta sea la que aparezca marcada en el radio buttom del index-->
        <form action='index.php' method='post'>
            <input type="submit" value="Volver" name="volver"/>
            <input type="hidden" value="<?= $limiteJugadas ?>" name="opcionJugar"/>
        </form>
    </fieldset>
</body>
</html>

