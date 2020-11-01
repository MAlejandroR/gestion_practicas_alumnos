<?php
include 'funciones.php';
//PENDIENTE Arrays
//main
$visible = "disabled";
if ($_POST["del"]) {
    $datos = '';
    $visible = "disabled"; //estado boton eliminar
}
if (isset($_POST["add"])) {
    $visible = "";
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $datos = $_POST["datos"];



    //no nombre, si numero ->agrego
    if (check($nombre) and checknum($telefono)) {
        echo "Nombre no valido pero el numero si";

        $datos = $datos . "<br><tr><td>" . $nombre . "</td><td>" . $telefono . "</td></tr>";
    }
    //si nombre, no numero ->elimino
    if (!check($nombre) and ! checknum($telefono)) {
        echo "Numero no valido";
        //unset($datos[$nombre]); //error
    }
    //si nombre, si numero & nombre [repetido] -> sustituir
    if (!checkrep($contactos,$nombre) and checknum($telefono)) {

        $datos = $datos . "<br><tr><td>" . $nombre . "</td><td>" . $telefono . "</td></tr>";
    }
    //si nombre, si numero & nombre [no repetido]-> agregar
    if (checkrep($contactos,$nombre) and checknum($telefono)) {
        //si array esta vacio lo creo
        if (empty($contactos)) {
            $contactos = [$nombre, $telefono];
            echo "array creaado";
        } else {
            $contactos = ['nombre' => $nombre, 'telefono' => $telefono];
            array_push($contactos, $nombre, $telefono);
            var_dump($contactos);
            $datos = $_datos . "<tr><td>" . $nombre . "</td><td>" . $telefono . "</td></tr>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="estilo.css" type="text/css">
        <title> Agenda de contactos</title>
    </head>
    <body>
        <header>
            Agenda de contactos: sin contactos actualmente
        </header>
        <div class="listado_contactos">
            <div class="center">LISTADO DE CONTACTOS</div>
            <hr>
            <div class="center">
                Agenda 
                <table>
                    <tr><td>Nombre</td><td>Telefono</td></tr>
                    <!--contactos-->
<?php echo $datos; ?>
                </table>   
            </div>
        </div>
        <!-- Creamos el formulario para insertr los nuevos datos-->
        <fieldset>
            <legend>Nuevo Contacto</legend>
            <form action="index.php" method="post">
                <br>
                Nombre
                <input type="text" name="nombre" size="15">
                <br>
                Teléfono
                <input type="text" name="telefono" size="15">
                <br>


                <input type="hidden" name="datos" value="<?php echo $datos; ?>">


                <input type="submit" value="Añadir contacto" name="add">
                <input type="submit" value="Eliminar contactos" name="del" <?php echo $visible; ?> >
                <!-- Metemos los contactos existentes  ocultos en el formulario-->
            </form>
        </fieldset>
        <div style="clear:both ">
            <hr>
        </div>
    </body>
</html>
