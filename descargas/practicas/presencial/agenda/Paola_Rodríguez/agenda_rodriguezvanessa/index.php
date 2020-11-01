<?php
// VARIABLES NECESARIAS
$nombre = trim(filter_input(INPUT_POST, 'nombre'));
$telefono = trim(filter_input(INPUT_POST, 'telefono'));
$msj = "";
$hidden = "";
$habilitar = "disabled";
// (!empty($agenda)) ? $habilitar ="enabled": $habilitar="disabled";
// DEVUELVEME EL CONTENIDO DE AGENDA O UN ARRAY VACÍO SINO TIENE NADA
$agenda = $_POST['agenda'] ?? [];

// REALIZAMOS LA ACCIÓN ESCOGIDA POR EL USUARIO
switch ($_POST['submit']) {
    case 'Agregar':
        if ($nombre === "") {
            $msj = "Nombre no puede estar vacío.";
        } else if (!is_numeric($telefono)) {
            $msj = "Formato de telefono incorrecto.";
        } else {
            $agenda[$nombre] = $telefono;
            $habilitar = "enabled";
        }
        if (array_key_exists($nombre, $agenda) && $telefono == "") {
            unset($agenda[$nombre]);
        }
        break;
    case 'Eliminar':
        unset($agenda);
        $agenda = [];
        break;
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
        <title></title>
        <style>
            fieldset{
                width: 700px;
                background-color:  #e3e3e3 ;
            }
            body{
                background-color: navajowhite;
            }
            table{
                margin-top: 2%;
                border: 2px;
                border-style: solid;
                border-color: black;    
            }
            div{
                background-color:  #dacddf ;
            }
          
        </style>
    </head>
    <body>
        <div>
            <?= "<h3>Actualmente hay " . count($agenda) . " contactos</h3>" ?>
        </div>
        <fieldset>
            <legend><h4>Datos contacto</h4></legend>
            <form actio="." method="POST">
                <h1> <?= $msj ?></h1>
                Nombre <input type="text" name="nombre" value="<?= $nombre ?>"/><br/><br/>
                Telefono <input type="text" name="telefono"  value="<?= $telefono ?>"/><br/><br/>
                <?php
                foreach ($agenda as $nom => $tel) {
                    $hidden .= "<input type='hidden' name='agenda[$nom]' value='$tel'><br/>";
                }
                echo "$hidden";
                ?>

                <input type="submit" name="submit" value="Agregar" />
                <input type="submit" name="submit" value="Eliminar" <?= $habilitar ?> />            
            </form>
        </fieldset>
        <div align="left">
            <table>
                <tr>
                    <th><b>Mis contactos</b></th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                </tr>
                <?php
                foreach ($agenda as $nom => $tel) {
                    $columnas = "<tr><td>$nom</td><td>$tel</td></tr>";
                    echo $columnas;
                }
                ?>
            </table>
        </div>
    </body>
</html>
