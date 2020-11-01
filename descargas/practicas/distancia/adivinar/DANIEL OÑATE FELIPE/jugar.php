 <!DOCTYPE html>
	<?php
			$resultado = $_POST['resultado'];
			$rangoMaxTotal=$_POST['Intervalo'];
			$acertado=false;
			if(empty($resultado))
			{
				$jugada=1;
				$numeroJugado=pow(2,$_POST['Intervalo'])/2;
				$rangoMax=pow(2,$_POST['Intervalo']);
				$rangoMin=1;
			}else
			{
				$jugada = $_POST['jugada']+1;
				
				$numeroJugado=$_POST['numJugado'];
				$rangoMax=$_POST['rangoMax'];
				$rangoMin=$_POST['rangoMin'];
				switch($resultado)
				{
					case "mayor":
						$rangoMin = $numeroJugado;
						$numeroJugado = $numeroJugado+(int)(($rangoMax-$numeroJugado)/2);
						break;
					case "menor":
						$rangoMax = $numeroJugado;
						$numeroJugado = $numeroJugado-(int)(($numeroJugado-$rangoMin)/2);
						break;
					case "igual":
						$acertado=true;
						break;
				}
			}
		?>
	<html>
	<head>
		<title>Practica 3</title>
		<?php
			if($acertado || ($jugada-1)==$rangoMaxTotal){
				echo "<meta http-equiv='refresh' content='0;url =fin.php?a=".$acertado."&j=".($jugada-1)."'>";
			}
		?>
	</head>
	<body>
		<h1>JUGANDO</h1>
		<h2>¿Tu número es mayor, menor o igual a <?php echo $numeroJugado;?>?</h2>
		<h3>Jugada <?php echo $jugada; ?></h3>
		<form action="jugar.php" method="POST">
			<input type="hidden" name ="Intervalo" value="<?php echo $rangoMaxTotal;?>">
			<input type="hidden" name ="rangoMax" value="<?php echo $rangoMax;?>">
			<input type="hidden" name ="rangoMin" value="<?php echo $rangoMin;?>">
			<input type="hidden" name ="numJugado" value="<?php echo $numeroJugado;?>">
			<input type="hidden" name ="jugada" value="<?php echo $jugada;?>">
			<input type="radio" name ="resultado" value="mayor"> mayor <br/>
			<input type="radio" name ="resultado" value="menor"> menor <br/>
			<input type="radio" name ="resultado" value="igual"> igual <br/>
			<input type="submit" value="Jugar" action="fin.php">
		</form>
		<form action="Index.php">
			<input type="submit" value="volver">
		</form>
		<form action="jugar.php" method="POST">
			<input type="hidden" name ="Intervalo" value="<?php echo $rangoMaxTotal;?>">
			<input type="hidden" name ="rangoMin" value="1">
			<input type="hidden" name ="numJugado" value="0">
			<input type="hidden" name ="jugada" value="0">
			<input type="hidden" name ="texto" value="">
			<input type="submit" value="Reiniciar">
		</form>
	</body>
</html> 