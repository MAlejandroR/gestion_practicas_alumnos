<?php
$agenda = [];
if (isset($_POST['enviar'])) {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $agenda = $_POST['agenda'];
            if (empty($nombre)) {
                $error = 'Por favor, rellene el nombre';
            }else{
                if (empty($telefono)) {
                    unset($agenda[$nombre]);
                }else{
                    if (!is_numeric($telefono)) {
                        $error = 'El número de teléfono debe ser numérico';
                    }else{
                        if(!in_array($agenda, $nombre)){
                            $agenda[$nombre] = $telefono;
                        }
                    }
                }
            }

    foreach ($agenda as $nombre => $telefono) {
            $list.='<tr>
    <td>' . $nombre. '</td>
    <td>' . $telefono . '</td>

    </tr>';
        }
}else{
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
    <script src='https://unpkg.com/vue'></script>
    <title> Agenda de contactos</title>
    <style>
        table, th, td {
  border: 1px solid black;
  background-color: blanchedalmond;
}
fieldset{
  background-color: blanchedalmond;  
}
a{
    color:red;
}
    </style>
</head>

<body>

<div class="listado_contactos">
    <fieldset>
    <legend>LISTADO DE CONTACTOS</legend>
    
    <table style="width:15%">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>  
        <?=$list?>
    </table>
        
        </fieldset>
</div>
<!-- Creamos el formulario para insertr los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action=index.php method="post">
        
        <a><?=$error?></a><br/>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
        <label for="telefono">Teléfono </label><input type="text" name="telefono" size="15"/><br/>
        <input type="submit" value="Añadir contacto" name="enviar">
        <input type="submit" value="Eliminar contactos" name="eliminar" <?= empty($agenda)? 'disabled' : ''?>>
        
        <?php
        foreach ($agenda as $nombre => $telefono){
            //Metemos inputs invisibles con el nombre(que actua de indice) con el valor de los clicks
            //De esta forma cada vez q clickamos recuperamos
            echo "<input type=hidden name='agenda[$nombre]' value='$telefono'>\n";
        }
        ?>
        <!-- Metemos los contactos existentes  ocultos en el formulario-->
            </form>
</fieldset>
<div style="clear:both ">
    <hr/>
    </div>

</body>

</html>
