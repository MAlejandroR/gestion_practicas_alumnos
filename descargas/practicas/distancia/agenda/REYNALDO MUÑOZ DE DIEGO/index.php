<?php 
	//Array para almacenar los contactos
	$agenda = array ();
	$mensaje = "";
	$deshabilitaboton = "";
		
	if (isset ($_POST['guardar'])) {
		
		//Si tenemos datos en los inputs ocultos "miagenda" los incorporamos al array $agenda
		if (!empty ($_POST ['miagenda'])){
				$agenda = $_POST ['miagenda'];
			}
			
		//Comporbamos que el campo nombre no esté vació y que el número de teléfono sea un valor numérico
	
		if (empty(trim($_POST['nombre']))){
			$mensaje = "Debe completar el campo nombre";
		} else if (!empty(trim($_POST['telefono'])) && !is_numeric($_POST['telefono'])) {
			$mensaje = "El teléfono debe ser un número";
		} else {
			
		// Si se cumplen las condiciones para el envío asignamos valor a variable $nombre

			$nombre = $_POST['nombre'];
			
			//Y comprobamos si el campo Teléfono está vacío y el nombre existe 
			//en la agenda: si es así la opción Guardar elimina (unset) el contacto; 
			//si no existe el nombre avisamos de imposibilidad de eliminar

			if (empty ($_POST['telefono']) && isset ($agenda[$nombre])) {
				unset($agenda[$nombre]);
			} else if (empty ($_POST['telefono']) && !isset ($agenda[$nombre])) {
				$mensaje = "No existen contactos con ese nombre para eliminarlos";						
			
			//Si el campo teléfono está correcto se agrega el contacto a la agenda
			} else {
				$telefono = $_POST['telefono'];
				$agenda [$nombre] = $telefono;
			}
		}
	}
	
	//Si el array $agenda está vacío deshabilitamos la opción Eliminar contactos
	if (empty ($agenda)) {
		$deshabilitaboton = "disabled";
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

<style type="text/css">
body {
	background-color: #F8F8F8;
	color: #666666;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
input {
	color: #900;
}
#error {
	color: #C00;
}
#contenedor {
	width: 800px;
	margin-right: auto;
	margin-left: auto;
}
#contenedor #agenda {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #999;
	padding-bottom: 25px;
}
#contenedor #formulario  {
	margin-top: 25px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 25px;
	padding-bottom: 25px;
}

#pie {
	color: #900;
	text-align: center;
}
</style>


</head>

</head>
<body>
<div id="contenedor">

	<div id="agenda">
 		
     <!-- Personalizamos el título añadiendo el número de contactos de la agenda (count)-->
	 <h1><?php echo "Agenda de contactos con " . count($agenda) . " contactos";?></h1>
        <table  width="450px" border="0" align="center">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Teléfono</th>
				</tr>
			</thead>
			<tbody>
   			<!-- Creamos en la tabla el número de filas con dos columnas necesarias para incorporar
            todos los contactos incluidos en el array $sagenda recorriéndolo con foreach-->
   			<?php
        	foreach ($agenda as $indice=>$valor){
				echo '<tr><td align="center">' . $indice . '</td><td align="center">' . $valor . '</td></tr>';
			}
			?>
        
        	</tbody>
        </table>

	</div>

	   
  <div id="formulario">
    	
        <!-- Cargamos el valor de la variable mensaje avisando al usuario 
        El menssaje variará dependiendo de las circunstancias -->
   	<p id="error"><?php echo $mensaje;?></p>
        
        <!-- Creamos el formulario para recoger los datos de los contactos y almacenarlos en el array $agenda
        El array será indexado utilizando como clave el nombre y como valor el teléfono-->
        
		<form name="contactos" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p><label for="nombre">Nombre</label>
        <input name="nombre" type="text" id="nombre"></p>
        <p><label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono"></p>
        <p><input type="submit" name="guardar" id="guardar" value="Guardar contacto">
        <input type="submit" name="eliminar" id="eliminar" value="Eliminar contactos" <?php echo $deshabilitaboton?>>
        
        <!-- Guardamos los elementos del array en inputs ocultos para poder recuperarlos cada vez que
        recarguemos la página y mostrarlos en la tabla de contactos -->
        <?php foreach ($agenda as $indice=>$valor) {
            echo '<br/><input type="hidden" name="miagenda[' .$indice.']" value="'.$valor.'"></br>';
			}
        ?></p>
        </form>
	
	</div>

</div>

</body>
</html>