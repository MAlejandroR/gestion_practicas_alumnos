<!DOCTYPE html> 
<html>    
    <head>
      <title>Index juego</title>     
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend>
                VOY A ADIVINAR TU NUMERO
            </legend>
            <fieldset>
                <legend>Elige un juego</legend>
                <form action="jugar.php" method="post">
                    <input type="radio" name="jugada" value="10" checked="">1-1.024(2<sup>10</sup>). 10 intentos<br />
                    <input type="radio" name="jugada" value="15">1-65.536(2<sup>15</sup>). 15 intentos<br />
                    <input type="radio" name="jugada" value="20">1-1.048.536(2<sup>20</sup>). 20 intentos<br />
                    <input type="submit" value="Jugar">                    
                    <input type="hidden" name="sumar" value="1">
                </form> 
            </fieldset>          
                <br/>
            <h2>Piensa un n&uacutemero de ese intervalo</h2>
            <h2>La aplicaci&oacuten lo acertar&aacute en el n&uacutemero de intentos establecidos seg&uacuten el intervalo</h2>
            <hr />

            <h2>Cada vez que la aplicaci&oacuten te especifique un n&uacutemero deber&aacutes de indicar</h2>
            <ul>
                 <li>Si el n&uacutemero buscado es mayor</li>
                <li>Si el n&uacutemero buscado es menor</li>
                <li>Si has aceertado el n&uacutemero</li>
            </ul>
        </fieldset>
    </body>
</html>