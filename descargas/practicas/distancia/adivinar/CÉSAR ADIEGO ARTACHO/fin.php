<?php
    $tries = 0;
    $thinkedNumber = 0;
    $lostGame = false;
    if(isset($_GET["tries"])) {
        $tries = $_GET["tries"];
    }

    if(isset($_GET["number"])) {
        $thinkedNumber = $_GET["number"];
    }

    if(isset($_GET["lostGame"])) {
        $lostGame = $_GET["lostGame"];
    }

    if($lostGame) {
        echo "No he podido acertar el numero $thinkedNumber en los intentos establecidos";
    }
    else {
        echo "He acertado $thinkedNumber en $tries jugadas", "<br/>", "o", "<br/>", "no has sido sincero!!!";
    }
?>

<form action="index.php">
    <button type="submit">Reintentar</button>
</form>