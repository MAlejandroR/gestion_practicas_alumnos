<?php
//Variables que recogen los datos de los inputs 
$nom = filter_input(INPUT_POST, 'nombre');
$num = filter_input(INPUT_POST, 'numero');
$agenda = filter_input(INPUT_POST, 'agenda', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
//variable para el mensaje que se muestra cuando introducen un dato alfnumérico
//en el campo teléfono
$err = "";
//variable booleana para saber si ya hay una persona en la agenda
$esta = false;
//si la agenda es nula la creo 
if ($agenda == null) {
    $agenda = [];
}
//las distintas posibilidades que hay cuando le das a añadir
if (isset($_POST['anadir'])) {
    $nom = trim($nom);
    switch (true) {       
        //caso num vacío borra el contacto
        case !empty($nom) && empty($num):          
            unset($agenda[$nom]);
            break;
        //caso que los dos datos son correctos
        //añade el elemento a la agenda
        case !empty($nom) && is_numeric($num):
            $agenda[$nom] = $num;
            break;
        //caso num no numérico si ya había una entrada con ese nombre 
        //lo deja como está 
        case !empty($nom) && !is_numeric($num) && !empty($num):
            foreach ($agenda as $nombre => $tlf) {
            //si está en la agenda es true si no false
                $esta = ($nombre == $nom)? true : false;          
                //si no está muestra el mensaje
                $err = ($esta)? "" : $err = "El campo teléfono debe ser numérico";
             
            }
            break;
    }
}
//cuando le da a borrar se borra toda la agenda
if (isset($_POST['borrar'])) {
    $agenda = [];
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
        <title>Practica 4 - Jorge Alloza</title>
    </head>
    <body>
        <fieldset style="width: 48%; height: 250px; background-color: lemonchiffon; display: inline-block; border-color: powderblue;">
            <legend><h2>Introduce el número</h2></legend>
            <!-- Inputs de nombre y telefono -->
            <form action="index.php" method="POST">
                Nombre: <br>
                <input type="text" name="nombre" value=""><br>
                Teléfono: <br>
                <input type="text" name="numero" value=""><br>
                <!-- Valores hidden uno por cada elemento del array -->
                <?php foreach ($agenda as $nom => $num): ?>
                    <input type="hidden" name="agenda[<?php echo $nom ?>]" value="<?php echo $num ?>">
                <?php endforeach; ?>
                <!-- Inputs de añadir y borrar -->
                <input style="width: 120px; margin-top: 5px;" type="submit" value="Añadir" name="anadir">
                <input style="width: 120px; margin-top: 5px;" type="submit" value="Borrar" name="borrar">
            </form>
            <?php
            echo "<h2 style='color: darkblue;'>" . $err . "</h2>";
            ?>
        </fieldset>            
        <fieldset style="width: 48%; height: 250px; background-color: powderblue; float: right; border-color: lemonchiffon;">
            <legend><h2> Agenda</h2></legend>
            <h2 style="color: lemonchiffon;">Contactos:</h2><br>
            <table>
                <?php
                //creo un una linea en la tabla por cada elemento del array
                foreach ($agenda as $nom => $num):
                    //creo una celda por cada nombre y telefono    
                    ?>
                    <tr>
                        <td style="border: 1px solid; padding: 5px; border-color: lemonchiffon;">
                            <?php echo $nom ?>
                        </td>
                        <td style="border: 1px solid; padding: 5px; border-color: lemonchiffon;">
                            <?php echo $num ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table> 
        </fieldset>

    </body>
</html>
