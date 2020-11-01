<?php
//Variables.
$title = "Agenda";
$legendForm = "Formulario";
$legendAgenda = "Agenda";
$telefonoNuevo = "";

//Ahora creo mi array. Éste será el encargado de almacenar las parejas clave/valor de la agenda.
//Tengo en cuenta la recarga de la página y lo primero es obtener la agenda que he almacenado en un hidden.
$agenda = filter_input(INPUT_POST, 'agenda', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
//En el caso de ejecutarse por primera vez el código, la agenda será null y por lo tanto la tengo que crear.
if ($agenda == null) {
    $agenda = [];
}

//Obtengo el valor de los inputs y los almaceno usando el filtro correspondiente.
$nombre = filter_input(INPUT_POST, 'nombre');
$nombre = trim($nombre);
$telefono = filter_input(INPUT_POST, 'telefono');
$envio = filter_input(INPUT_POST, 'submit');

//Función que comprueba los campos de los 'inputs' y que en base a eso da de alta, baja o modifica datos. Además
//devolverá un mensaje de error vacío si todo está bien o un mensaje con la información necesaria a la hora de 
//describir el error.
function compruebaCampos($nombre, $telefono, &$agenda) {
    //Inicializo un mensaje de error vacío, será el mensaje de error que devolveré.
    $errorCampos = "";
    //Si nombre está vacío:
    if (empty($nombre)) {
        //Muestro mensaje de error.
        $errorCampos .= "¡El campo nombre está vacío!";
    //Si nombre NO está vacío.
    }else{
        //Compruebo si teléfono está vacío.
        if (empty($telefono)) {
            //Si teléfono está vacío, elimino de la agenda el contacto.
             unset($agenda[$nombre]);
        //Si teléfono NO está vacío 
        }else{
            //Compruebo ahora que teléfono sea numérico
            if (is_numeric($telefono)) {
                //Si es numérico, añado el contacto a la agenda.
                $agenda[$nombre] = $telefono;
            }else{
                //Si no es numérico muestro mensaje de error.
                $errorCampos .= "El campo teléfono debe ser numérico";
            }
        }
    }
    //Retorno el error para poder mostrarlo.
    return $errorCampos; 
}

//Ahora compruebo que el formulario haya sido enviado
switch ($envio) {
    case 'Alta':
        //En caso de alta haré todas las funciones necesarias a través de mi función
        $errorCampos = compruebaCampos($nombre, $telefono, $agenda, $telefonoNuevo); 
        break;
    case 'ELiminar':
        //En el caso de 'ELiminar', elimino todos los valores de agenda limpiando el array.
        $agenda = [];
        break;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="practica4.css" />
    </head>
    <body>
        <div id="contenedor">
            <fieldset id="formulario">
                <legend><?php echo $legendForm ?></legend>
                <form action="index.php" method="POST">
                    <!--Campos de texto-->
                    <input type="text" name="nombre" value=""/>Introduce tu nombre
                    <br /><br />
                    <input type="text" name="telefono" value=""/>Introduce tu teléfono
                    <br>
                    <!--Botones-->
                    <input type="submit" name="submit" value="Alta"/>
                    <input type="submit" name="submit" value="ELiminar"/>
                    <!--Valores ocultos-->
                    <!--Recorro con un foreach la agenda, con el índice como "nombre" y valor como "telefono"-->
                    <?php foreach ($agenda as $nombre => $telefono): ?>
                        <!--Para cada vuelta del foreach, creo un input oculto para almacenar los valores del array-->
                        <input type="hidden" name="agenda[<?php echo $nombre; ?>]" value="<?php echo $telefono; ?>"/>
                    <?php endforeach; ?>
                </form>
                <?php
                echo "<h1 style='color:red;'>" . $errorCampos . "</h1>";
                ?>
            </fieldset>
            <!--CONENEDOR EN DONDE MUESTRO LOS CONTACTOS DE LA AGENDA-->
            <fieldset id="agenda">
                <legend><?php echo $legendAgenda ?></legend>
                <table>
                    <!--Recorro con un foreach la agenda, con el índice como "nombre" y valor como "telefono"-->
                    <?php foreach ($agenda as $nombre => $telefono): ?>
                        <!--Para cada vuelta del foreach, creo un <tr> con dos <td>, en donde coloco los valores-->
                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $telefono; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </fieldset>
        </div>
    </body>
</html>
