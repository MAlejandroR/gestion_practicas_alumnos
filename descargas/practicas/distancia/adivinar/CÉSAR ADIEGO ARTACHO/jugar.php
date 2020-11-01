<?php
var_dump($_POST);
    $selectedOption = 0;
    $gameAction = "play";
    $tries = 0;
    $minValue = 1;
    $maxValue = 1;
    $thinkedNumberAtGame = 0;
    $thinkedNumberAtTry = 0;
    $thinkedNumberAtPreviousTry = 0;
    $maximumTries = 0;
    
    if(isset($_POST["gameOption"])) {
        $selectedOption = $_POST["gameOption"];
    }

    if(isset($_POST["gameAction"])) {
        $gameAction = $_POST["gameAction"];
    }

    if(isset($_POST["thinkedNumberAtGame"])) {
        $thinkedNumberAtGame = $_POST["thinkedNumberAtGame"];
    }

    if(isset($_POST["thinkedNumberAtPreviousTry"])) {
        $thinkedNumberAtPreviousTry = $_POST["thinkedNumberAtPreviousTry"];
    }

    if(isset($_POST["maximumTries"])) {
        $maximumTries = $_POST["maximumTries"];
    }

    if(isset($_POST["tries"])) {
        $tries = $_POST["tries"];
    }
    else {
        initializeGame($selectedOption);
        $thinkedNumberAtGame = rand($minValue, $maxValue);
        $thinkedNumberAtTry = rand($minValue, $thinkedNumberAtGame);
    }

    if(($gameAction == "higher") || ($gameAction == "lower")) {
            $tries = $_POST["tries"];
            $tries++;

            if($tries < $maximumTries) {
                if($gameAction == "higher") {
                     $minValue = $thinkedNumberAtPreviousTry;
                     $maxValue = round($thinkedNumberAtPreviousTry * 2);

                     if($maxValue > $thinkedNumberAtGame) {
                        $maxValue = $thinkedNumberAtGame;
                     }
                }
                else if($gameAction == "lower") {
                    $maxValue = $thinkedNumberAtPreviousTry;
                    $minValue = round($thinkedNumberAtPreviousTry / 2);

                    if($minValue < 1) {
                        $minValue = 1;
                    }
                }
                echo "Min Value: $minValue; MaxValue: $maxValue<br/>";
                $thinkedNumberAtTry = rand($minValue, $maxValue);
            }
            else {
            header("Location:fin.php?number=$thinkedNumberAtGame&lostGame=true");
            }
    }
    else if($gameAction == "equal"){
        header("Location:fin.php?number=$thinkedNumberAtGame&tries=". ($maximumTries - ($maximumTries - $tries) + 1));
    }    
    

    echo "El n&uacute;mero es ", $thinkedNumberAtTry, "?<br/>";
    echo "Te quedan ", $maximumTries - $tries, " jugadas";
    ?>

<form action="index.php">
    <button type="submit">Volver</button>
</form>

<form action="jugar.php" method="POST">
    <input type="hidden" name="gameOption" value="<?php echo $selectedOption; ?>"/>
    <button type="submit">reiniciar</button>
</form>

<form action="jugar.php" method="POST">
    <input type="hidden" name="tries" value="<?php echo $tries;?>"/>
    <input type="hidden" name="gameOption" value="<?php echo $selectedOption;?>"/>
    <input type="hidden" name="thinkedNumberAtGame" value="<?php echo $thinkedNumberAtGame;?>"/>
    <input type="hidden" name="thinkedNumberAtPreviousTry" value="<?php echo $thinkedNumberAtTry;?>"/>
    <input type="hidden" name="maximumTries" value="<?php echo $maximumTries;?>"/>
    <input type="radio" name="gameAction" value="higher"/>Mayor
    <input type="radio" name="gameAction" value="lower"/>Menor
    <input type="radio" name="gameAction" value="equal"/>Igual
    <button type="submit">jugar</button>
</form>
    
<?php
    function initializeGame($selectedOption) {
        global $maximumTries, $maxValue;

        switch($selectedOption) {
            case 1:
                $maximumTries = 10;
            break;
            case 2:
                $maximumTries = 16;
            break;
            case 3:
                $maximumTries = 20;
                break;
        }

        $maxValue = pow(2, $maximumTries);
    }
?>