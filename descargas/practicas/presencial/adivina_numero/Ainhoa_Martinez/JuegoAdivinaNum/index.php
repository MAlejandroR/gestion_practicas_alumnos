<?php
if(isset($_POST['Empezar'])){
    header("jugar.php");
}
$intentos = 'checked';
if(isset($_GET['intentos'])){
    $intentos = $_GET['intentos'];
    
    switch ('intentos') {
        case 10:
            $checked_10 = 'checked';
            break;
        case 15:
            $checked_15 = 'checked';
            break;
        case 20:
            $checked_20 = 'checked';
            break;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina número</title>
        <style>
            fieldset#principal {
                background: #aeedd6;
                width: 700px;
                margin: 0 auto;
            }
            fieldset#inter {
                width: 60%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <fieldset id="principal">
            <legend><h2>Juego adivina un número</h2></legend>
            <h3>Selecciona un intervalo del menú</h3>
            <fieldset id="inter">
                <legend>Establece intervalo</legend>
                <input type="radio" name="intentos" checked <?php echo $checked_10 ?> value="10">1-1024 <strong>10</strong> intentos<br />
                <input type="radio" name="intentos" <?php echo $checked_15 ?> value="15">1-32.768 <strong>15</strong> intentos<br />
                <input type="radio" name="intentos" <?php echo $checked_20 ?> value="20">1-1.048.576 <strong>20</strong> intentos<br />
                <br />
                <form action="jugar.php" method="POST">
                    <input type="submit" name="submit" value="Empezar">
                </form>
            </fieldset>
            <h3>Piensa un número de ese intervalo</h3>
            <h4>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h4>
            <hr />
            <h3>Cada vez que la aplicación te especifique un número deberás indicar</h3>
            <p>Si el número buscado es mayor</p>
            <p>Si el número buscado es menor</p>
            <p>Si has acertado el número</p>
        </fieldset>
    </body>
</html>
