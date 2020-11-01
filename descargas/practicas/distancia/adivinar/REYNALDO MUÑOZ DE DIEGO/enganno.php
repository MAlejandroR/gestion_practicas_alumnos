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
  	//Recibimos por GET el número de jugadas, el de intentos y el valor del número medio (que es un float, por eso sabemos que hemos acertado)
  	$jugada = $_GET["jugada"];
	$intentos = $_GET["intentos"];
	$numeroMedio = $_GET["numeroMedio"];
	
  	
		echo "<h2>He acertado en el intento " . $jugada . " de los ". $intentos	. " disponibles</h2>";
		echo "<h2>El número era el</h2>";
		echo "<h1 id='enganno'>" . $numeroMedio . "</h1>";
		echo "<h2>y no me has avisado. No sé si debería dejarte jugar más</h2>";

  ?>
  
  
  <p>Acabado el juego</p>
  
  <input name="nuevo" type="button" value="Jugar de nuevo" onclick="location.href='index.php'">

</div>
</body>
</html>