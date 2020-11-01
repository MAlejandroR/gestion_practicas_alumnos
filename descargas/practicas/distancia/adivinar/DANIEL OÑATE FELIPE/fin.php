 <!DOCTYPE html>
	<html>
	<head>
		<title>Practica 3</title>
	</head>
	<body>
		<h1>JUGANDO</h1>
		<h2><?php 
				if(isset($_GET['a']) && $_GET['a']){
					echo "Lo he acertado! en la jugada ".$_GET['j']."!";
				}else{
					echo "No has sido sincero!";
				}
			?>
		</h2>
		<form action="Index.php">
			<input type="submit" value="Reiniciar">
		</form>
		
	</body>
</html> 