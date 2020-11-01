<?php

//-------------------Variables obtenidas-------------------
$agenda = $_POST["agenda"];
$boton = trim($_POST["enviar"]);
$nombreIntroducido = trim($_POST["nombre"]);
$telefonoIntroducido = $_POST["telefono"];
$advertencia = "";

//-------------------Acciones botones-------------------
if ($boton == "Añadir contacto") {
	
    if (empty($nombreIntroducido)){
        $advertencia = "<p style='color:red'>Debes facilitar un nombre para crear el contacto</p><br/>";
    }else{
          
        $anadir = true;
        foreach($agenda as $nombre => $telefono){
            if ($nombre == $nombreIntroducido){		
                if (empty($telefonoIntroducido)){
                    unset($agenda[$nombre]);
                    $anadir = false;
                    break;
                }		
            }
        } 
        if ($anadir){
            if (empty($telefonoIntroducido)){
                $advertencia = "<p style='color:red'>Debe facilitar un teléfono para el contacto  <span class=variable>$nombreIntroducido</span>.</p><br/>";
            } else if (!is_numeric($telefonoIntroducido)){
                $advertencia = "<p style='color:red'>El teléfono debe ser numérico y <span class=variable>$telefonoIntroducido</span> no lo es.</p><br/>";
            }else $agenda[$nombreIntroducido] = $telefonoIntroducido;
        }
    }         
	
}else if ($boton == "Eliminar contactos") {
    unset($agenda);
}

//-------------------Mostrar contador-------------------
$header; $divCenter; $botonEliminar;
$tamannio = sizeof($agenda);
if ($tamannio == 0) {
	$header = "sin contactos actualmente";
	$divCenter = "Agenda sin contactos";
	$botonEliminar = "disabled";
}else{
	$header = "con " . $tamannio . " contactos";
	$divCenter = "<table><tr><th>Nombre</th><th>Teléfono</th></tr>";
	foreach($agenda as $nombre => $telefono){
		$divCenter .= '<tr><td>'.$nombre.'</td><td>'.$telefono.'</td></tr>';
	}
	$divCenter .= "</table>";
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda de contactos</title>	
        <link rel="stylesheet" href="./estilo.css" type="text/css">
        <script src='https://unpkg.com/vue'></script>		
    </head>
    <header>Agenda de contactos: <?php echo $header ?></header>
    <body>
	
	<div class="listado_contactos">
            <div class="center">LISTADO DE CONTACTOS</div>
            <hr>
            <div class="center">
                <?php echo $divCenter ?>
            </div>
	</div>
		
	<!-- Creamos el formulario para insertr los nuevos datos-->
	<fieldset>
            <legend>Nuevo Contacto</legend>
            <form action = "index.php" method="post">
                <br>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" size="15"/><br/>
                <label for="telefono">Teléfono </label>
                <input type="text" name="telefono" size="15"/><br/>
                <input type="submit" name="enviar" value="Añadir contacto">
                <input type="submit" name="enviar" value="Eliminar contactos" <?php echo $botonEliminar ?> >

                <?php
                    foreach($agenda as $nombre => $telefono){
                        echo '<input type="hidden" name="agenda['.$nombre.']" value="'.$telefono.'"/>';
                    }
                ?>
            </form>
	</fieldset>
		
	<div style="clear:both ">
            <hr/>
            <?php echo $advertencia ?>
	</div>
    </body>
</html>
