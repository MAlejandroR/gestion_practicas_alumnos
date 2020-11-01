<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #D7F3FF;"> 


	<h2>
	Tienes que pensar un numero que este en uno de los intervalos que selecciones de los que hay abajo.</br>
	La maquina tiene el numero de intentos mostrados a la derecha para adivinar el numero.
	<h2>

	<form action= "jugar.php" method="GET">
		<div>
		Entre 1 - 1.024(2^10)<input type="radio" value="niv1" name="difficulty" checked><br>
		Entre 1 - 65.536(2^16)<input type="radio" value="niv2" name="difficulty"><br>
		Entre 1 - 1.048.576(2^24)<input type="radio" value="niv3" name="difficulty"><br>
		</div>
		<input type="submit">
	</form>

</body>
</html>