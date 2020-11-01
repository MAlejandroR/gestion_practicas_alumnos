
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina el número</title>
        <style>
            body{
                background:#F7F7F7;
            }
            .presentacion{
                width: 900px;
                margin-left:500px;
                 margin-right:100px;
                 margin-top: 150px;
            }
            h1{
                background: #3B5998;
                border-radius: 23px;
                margin: 35px;               
                color: white;
                height: 55px;
                text-align: center;
            }
            fieldset,ul,label{
                text-align: center;
                background: #DFE3EE;
                display: block;
                margin: 10px;
            }
            legend{ font-size: 20px;}
            h2{text-align: center;}
            .enviar{
                border-radius: 23px;
                margin: 15px;
                margin-left: 400px;
                font-size: 35px;
                color: white;
                background: #3B5998;
                     
            }
            .reglas{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?= "<span style ='color: red'> $error </span>" ?>
        <div class="presentacion">
            <h1>Juego de adivina el número</h2>
            <form action="jugar.php" method="POST">
                <h2>Selecciona un intervalo del menú de abajo</h2>
                <fieldset>
                    <legend>Establece intervalo</legend>
                    <label><input type="radio" name="op" value="op1"> 1 - 1.024 (2¹⁰). 10 intentos</label>
                    <br/>
                    <label><input type="radio" name="op" value="op2"> 1 - 32.768 (2¹⁵). 15 intentos</label>
                    <br/>
                    <label><input type="radio" name="op" value="op3"> 1 - 1.048.576 (2²⁰). 20 intentos</label>
                </fieldset>
                
                <input class="enviar" type="submit" value="Empezar" name="empezar"><!--control de fallo en boton empezar -->
              
            </form>
            <div class="reglas">
                <h2>Piensa un número de ese intervalo </h2>
                <p>la aplicacion lo acertará en el número de interntos establecidos
                según el intervalo</p>
                <p>cada vez que la aplicación te especifique un número deberás de indicar</p>
                <ul style="list-style: none">
                    <li>Si el número buscado es mayor</li>
                    <li>Si el número buscado es menor</li>
                    <li>Si has aceertado el número</li>
                </ul>
                
            </div>     
            
        </div>
    </body>
</html>
