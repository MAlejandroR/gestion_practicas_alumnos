 <!DOCTYPE html>
	<html>
	<head>
		<title>Practica 3</title>
	</head>
	<body>
		<h1>Programa que adivina el número elegido en un rango</h1>
		<br/>
		<h2>Selecciona el intervalo deseado para jugar y pulse comenzar</h2>
		
		<form action="jugar.php" method="POST">
			<input type="radio" name ="Intervalo" value="10"> 1-1.024(2^10). 10 intentos <br/>
			<input type="radio" name ="Intervalo" value="16"> 1-65.536(2^16). 16 intentos <br/>
			<input type="radio" name ="Intervalo" value="20"> 1-1.048.576(2^20). 20 intentos <br/>
			<input type="submit" value="Jugar">
		</form>
	</body>
</html> 