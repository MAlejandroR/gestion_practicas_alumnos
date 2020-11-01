 <!DOCTYPE html>
	<?php
		$Array = array();
		$Insertado = false;
	?>
	<html>
	<head>
		<title>Practica 4</title>
		
	</head>
	<body>
		<h1>Agenda Telefónica</h1>
		<?php
			if(Isset($_POST['Array']))
			{
				if(Isset($_POST['txtNombre']) && $_POST['txtNombre'] =='')
				{
					echo '<p>El Nombre introducido está en blanco</p></br>';
				}
				if(Isset($_POST['txtNumero']) && !is_numeric($_POST['txtNumero']))
				{
					echo '<p>El Numero introducido no es numérico</p></br>';
				}
				$ArrayUnserialized = unserialize($_POST['Array']);
				foreach($ArrayUnserialized as $valor)
				{
					$nombreValor = substr($valor, 0, strpos($valor, ':')-1);
					if($nombreValor == $_POST['txtNombre'])
					{
						if(Isset($_POST['txtNombre']) && $_POST['txtNombre'] !='')
						{
							if(Isset($_POST['txtNumero']) && $_POST['txtNumero']!='')
							{
								$contactoActualizado = $_POST['txtNombre'].' : '.$_POST['txtNumero'];
								array_push($Array, $contactoActualizado);
							}
							$Insertado = true;		
						}else
						{
							array_push($Array, $valor);
						}
					}else
					{
						array_push($Array, $valor);
					}
					
				}
				if((Isset($_POST['txtNombre']) && $_POST['txtNombre'] !='') && (Isset($_POST['txtNumero']) && $_POST['txtNumero']!=''))
				{
					$contacto = $_POST['txtNombre'].' : '.$_POST['txtNumero'];
					if(!$Insertado)
					{
						array_push($Array, $contacto);
					}
						
				}
				foreach($Array as $contacto)
				{
					echo $contacto.'</br>';
					
				}
				
			}
		?>
		<form action="index.php" method="POST">
			<input type="hidden" name ="Array" value='<?php  echo serialize($Array);?>'>
			Nombre: <input type="text" name ="txtNombre">  <br/>
			Número: <input type="text" name ="txtNumero">  <br/>
			<input type="submit" value="Añadir a agenda">
		</form>
		<?php
			if(sizeof($Array)>=1)
			{
				echo '<form action="index_.php">
							<input type="submit" value="Eliminar teléfonos">
					  </form>';
				
			}
		?>
		
		
	</body>
</html> 
