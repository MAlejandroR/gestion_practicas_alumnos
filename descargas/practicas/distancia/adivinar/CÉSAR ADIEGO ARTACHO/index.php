<h1>Juego adivina n&uacute;mero</h1><br/>
<h3>Selecciona un intervalo del men&uacute; de abajo</h3><br/>
<form action="jugar.php" method="POST">
    <input type="radio" name="gameOption" value="1"/>1-1.024(2^10) 10 intentos<br/>
    <input type="radio" name="gameOption" value="2"/> 1-65.536(2^16) 16 intentos<br/>
    <input type="radio" name="gameOption" value="3"/> 1-1.048.576(2^20) 20 intentos<br/>
    <button type="submit">empezar</button>
</form>

<h2>Piensa en un n&uacute;mero de ese intervalo</h2>
<br>
<h2>
    La aplicaci&oacute;n lo acertar&aacute; en el n&uacute;mero de intentos establecidos
    seg&uacute;n el intervalo
</h2>
<br/>
<h2>Cada vez que la aplicaci&oacute;n te especifique un n&uacute;mero deber&aacute;s de indicar</h2>
<ul>
    <li>Si el n&uacute;mero buscado es mayor</li>
    <li>Si el n&uacute;mero buscado es menor</li>
    <li>Si has acertado el n&uacute;mero</li>
</ul>
