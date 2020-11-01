<?php

spl_autoload_register(function ($clase) {
    require "$clase.php";
});
session_start();
$c = unserialize($_SESSION['clave']);
$msj = $_SESSION['msj'];
$arrayJugadas = unserialize($_SESSION['jugadas']) ?? [];

if (isset($_POST['reset'])) {
    $arrayJugadas = [];
    $msj = "<br>" . "mis jugadas" . "<br>";
    $c = new Clave();
}
if (isset($_POST['empezar'])) {
    $arrayJugadas = [];
    $msj = "<br>" . "mis jugadas" . "<br>";
    $c = new Clave();
}

if (isset($_POST['coloresJug'])) {
    $color1 = $_POST['colores1'];
    $color2 = $_POST['colores2'];
    $color3 = $_POST['colores3'];
    $color4 = $_POST['colores4'];
    $colores = [$color1, $color2, $color3, $color4];
    $arrayJugadas[] = $colores;
    $msj .= $color1 . " - " . $color2 . " - " . $color3 . " - " . $color4 . "<br>";
    if (sizeof($arrayJugadas) > 14) {
        header("Location:fin.php?combinacion='La combinacion de colores era $c'");
    }
    $contBienPos = 0;
    $contBienColor = 0;
    for ($i = 0; $i < 4; $i++) {
        switch (true) {
            case $c->getClave()[$i] == $colores[$i]:
                $contBienPos++;               
                break;
            default:
                foreach ($colores as $color){
                    if ($color == $c->getClave()[$i]){
                        $contBienColor++;
                    }
                }
                break;
        }
    }
    echo "Has acertado $contBienPos Colores en sus posiciones y $contBienColor colores";
    if ($contBienPos == 4) {
        header("Location:fin.php?combinacion=Has acertado la combinación de colores que era $c");
    }
}

if (isset($_POST['mos'])) {
    echo $c;
}
if (isset($_POST['ocu'])) {
    echo "";
}

$p = new Plantilla();
echo $p;
echo $msj;
$_SESSION['msj'] = $msj;
$_SESSION['clave'] = serialize($c);
$_SESSION['jugadas'] = serialize($arrayJugadas);
?>
