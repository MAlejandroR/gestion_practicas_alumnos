<!DOCTYPE html>
 
<html lang="es">
	<head>
		<title>Manuel Bailera - Adivina número</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./css/estilo.css" />
	</head>
<body>
    <header>
		<h1><a href="./">Juego adivina número</a></h1>
    </header>
	
	<main>
		<h2>Selecciona un intervalo del menú de abajo</h2>

		<fieldset>
			<legend>Esteblece intervalo</legend>
			<form action="jugar.php" method="POST">
				<input type="radio" name="opcion" value="10" checked><span class="destacado">1 - 1.024 (2<sup>10</sup>).</span> 10 intentos<br>
				<input type="radio" name="opcion" value="16"><span class="destacado">1 - 65.536 (2<sup>16</sup>).</span> 16 intentos<br>
				<input type="radio" name="opcion" value="20"><span class="destacado">1 - 1.048.576 (2<sup>20</sup>).</span> 20 intentos<br>
				<input type="submit" value="Empezar" name="submit">
			</form>
		</fieldset>	

		<p>Piensa un número de ese intervalo</p>
		<p>La aplicación lo acertará en el número de intentos establecidos según el intervalo</p>
		<p>Cada vez que la aplicación te especifique un número deberás de indicar</p>
		<ul>
			<li>Si el número buscado es mayor</li>
			<li>Si el número buscado es menor</li>
			<li>Si has acertado el número</li>
		</ul>
	</main>
    <footer>
        <p>Manuel Bailera Serrano</p>
    </footer>
</body>
</html>