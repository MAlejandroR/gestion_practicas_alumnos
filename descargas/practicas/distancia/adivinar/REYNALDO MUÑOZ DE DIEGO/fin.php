<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jugar</title>


<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cabecera">
  <h1>Práctica DWES - Adivina el número</h1>
</div>
<div id="principal">
  <?php 
  	$jugada = $_GET["jugada"];
	$intentos = $_GET["intentos"];
	
  	if ($jugada < $intentos) {
		echo "<h1>He acertado en el intento " . $jugada . " de los ". $intentos	. " disponibles</h1>";
		
	} else {
		echo "<h1>No has sido sincero. Se han agotado los intentos y no he adivinado el número, 
				y esto son matemáticas puras.</h1>";
	}
  
  ?>
  
  
  <p>Acabado el juego</p>
  
  <input name="nuevo" type="button" value="Jugar de nuevo" onclick="location.href='index.php'">

</div>
</body>
</html>