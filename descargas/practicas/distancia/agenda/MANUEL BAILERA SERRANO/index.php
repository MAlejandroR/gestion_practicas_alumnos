<?php
/* ----- DECLARACIÓN DE VARIABLES -------------------- */ 
$agenda = array(); 
$nombre = null;
$telefono = null;
$mensaje = null;

/* ----- FUNCIONES -------------------- */ 

// Esta función valida los datos introducidos y los agrega al array en caso de ser correctos
// Paso la variable agenda por referencia
function agregar(&$agenda, $nombre, $telefono) {
    // Inicializo la variable $mensaje
    $mensaje = null;

    if(!empty($nombre) && !empty($telefono)) {
    // Si el nombre no está vacío y el teléfono tampoco

        if (is_numeric($telefono)){
            // Si el teléfono está en formato numérico
                if (array_key_exists($nombre, $agenda)) {
                // Si el nombre existe en el array $agenda, se sobreescribe y se muestra un mensaje de confirmación
                $agenda[$nombre]=$telefono; 
                $mensaje = "<span class='ok'>Contacto actualizado correctamente</span><br />";  
            } else {
                // Si el nombre no existe en el array, se añade y se muestra un mensaje de confirmación
                $agenda[$nombre]=$telefono; 
                $mensaje = "<span class='ok'>Nuevo contacto agregado correctamente</span><br />";  
            }

        } else {
            // Si el dato introducido no es del tipo correcto, no se añade el contacto al array y se muestra un mensaje de error
            $mensaje = "<span class='error'>El número de teléfono ha de estar en formato numérico <br />y \"<b>$telefono</b>\" no lo está</span><br />";
        }

    } elseif(empty($nombre)) {
        // Si el nombre está vacío, no se añade el contacto al array y se muestra un mensaje de error
        $mensaje = "<span class='error'>El nombre no puede estar vacío</span><br />";

    } elseif(empty($telefono)) {
        // Si el teléfono está vacío
        if (array_key_exists($nombre, $agenda)) {
            // Si el nombre existe en el array $agenda, se elimina y se muestra un mensaje de confirmación
            unset($agenda[$nombre]); 
            $mensaje = "<span class='ok'>Se ha eliminado \"<b>$nombre</b>\"</span><br />";
        } else {
            // Si el nombre no existe en el array $agenda, no se elimina y se muestra un mensaje de error
            $mensaje = "<span class='error'>El teléfono no puede estar vacío</span><br />"; 
        }  

    }
    // La función devuelve el valor de la variable $mensaje
    return $mensaje;
}

// Vacía el array pasado como argumento
function eliminar(&$agenda){
    $agenda = array();
}

// Muestra en forma de tabla el array pasado como argumento
/**
 * @param $agenda la agenda de contactos
 * @return string html con formato tabla que contiene los contactos de la agenda para mostrar
 */
function listado($agenda) {

    if (count($agenda)>0) {
        // Si el número de elementos del array es mayor que 0, se muestra la tabla

        $listado_contactos= "<table><tr><th>Nombre</th><th>Teléfono</th></tr>";
        $n = 0;
        foreach ($agenda as $nombre =>$telefono) {
            //contatenamos el html
            $listado_contactos.= "<tr><td>$nombre</td><td>$telefono</td></tr>";
            $n++;
        }
        echo "</table>";
        echo "<p>Total contactos en la agenda: <span class='destacado'>" . count($agenda) . "</span></p>";
    } else {
        // Si el array está vacío, se muestra un mensaje
        echo "<p>Agenda sin contactos</p>";
    }
    return $listado_contactos;
}

/* ------------------------- */ 

if (isset($_POST['agregar'])) {  
    // Si se ha pulsado el botón "agregar"
    // Obtiene los valores de las variables $_POST y los almacena en otras variables
    if (isset($_POST['agenda'])) { 
        // Si se ha establecido $_POST['agenda'], almacena su valor en $agenda
        $agenda = $_POST['agenda'];
    } else {
        // Si no, inicializa el array
        // Otra forma sería: $agenda = $_POST['agenda']??array();
        $agenda = array();
    }
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    // Se ejacuta el función agregar()
    // El resultado de su ejecución se almacena en la variable $mensaje
    $mensaje = agregar($agenda, $nombre, $telefono); 
} elseif (isset($_POST['eliminar'])){
    // Si se ha pulsado el botón "eliminar"
    // Se ejecuta el función eliminar()
    eliminar($agenda); 
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo.css" />
    <title>Manuel Bailera - Agenda</title>
</head>
<body>
    <header>
        <h1><a href="./">Agenda</a></h1>
    </header>
	<main>

        <fieldset>
            <legend>Listado de contactos</legend>
            <!-- Mediante el función listado(), se muestra el contenido de la agenda -->
            <?php listado($agenda); ?>
		</fieldset>	

        <fieldset>
			<legend>Agregar nuevo contacto</legend>
            <form action=index.php method="POST">
                <label for="nombre">Nombre</label><input type="text" name="nombre"/><br />
                <label for="telefono">Teléfono </label><input type="text" name="telefono"/><br />
                <input type="submit" value="Añadir contacto" name="agregar">
                <!-- Si no hay contactos, se deshabilita el botón "Eliminar contactos" -->
                <input type="submit" value="Eliminar contactos" name="eliminar" <?php echo (count($agenda)>0)? "" : "disabled"; ?>>
            <?php 
                // Se recorre el array $agenda y se asigna el valor de sus pares indice => valor
                // a campos ocultos del formulario
                // para poder recuperarlos posteriormente por el función POST
                foreach($agenda as $nombre => $telefono) {
                    echo '<input type="hidden" name="agenda['.$nombre.']" value="'.$telefono.'" />';
                }
            ?>
        </form>
        <!-- Se muestra el mensaje contenido en la variable $mensaje -->
        <p><?php echo $mensaje; ?></p>
        </fieldset>	    

	</main>
    <footer>
        <p>Manuel Bailera Serrano</p>
    </footer>
</body>
</html>