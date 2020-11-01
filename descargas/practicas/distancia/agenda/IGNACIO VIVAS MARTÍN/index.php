
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda de Contactos</title>
        <link rel="stylesheet" href="./style.css" type="text/css">
    </head>
    <body>
        <?php
        $v = '';
        $numerocontac = 0;
        $agenda = array();

        if ($_REQUEST["btn"] == "Añadir") {

            error_reporting(E_ALL ^ E_NOTICE);
            $agenda = $_REQUEST['array'];

            $nombre = $_POST['nombre'];
            $telefono  = $_POST['telefono'];
            if ($nombre == "" || $telefono == "") {
                $v = 'Debe añadir todos los datos';
            } else {
                $agenda[$_REQUEST["nombre"]] = $_REQUEST["telefono"];
            }
        } else if ($_REQUEST["btn"] == "Eliminar") {
            $agenda = array();
        } else {
            $agenda = array();
        }

        

        function tabla($agenda) {
            echo' <h2>LISTADO DE CONTACTOS </h2>';
            echo' <table border="1">';
            echo' <thead>';
            echo' <tr>';
            echo' <th>Nombre</th>';
            echo' <th>Teléfono</th>';
            echo' </tr>';
            echo' </thead>';
            echo' <tbody>';
            foreach ($agenda as $nombre => $telefono) {
                if ($telefono != "") {
                    echo "<tr>";
                    echo "<td>" . $nombre . "</td>";
                    echo "<td>" . $telefono . "</td>";
                    echo "</tr>";
                }
            }
            echo' </tbody>';
            echo' </table>';
        }

       $contactos = count($agenda);       
       //  $mensaje = 'El numero de contactos es ' . count($agenda);
        
        echo'<div class="listado_contactos">';
        echo'<div class="center">LISTADO DE CONTACTOS</div>';
        echo'<hr>';
        
        echo' <div class="center">El numero de contactos es ' . $contactos . '  </div>';
        echo'</div>';

        echo'<fieldset>';
        echo' <legend>Nuevo Contacto</legend>';
        echo' <form action=index_.php method="post">';
        echo' <br>';
        echo'<label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>';
        echo'<label for="telefono">Teléfono</label><input type="number" name="telefono" size="9"/><br/>';
        echo'<input type="submit" value="Añadir" name="btn">';
        echo'<input type="submit" value="Eliminar" name="btn">';
        if (empty($agenda)) {
            echo "<input type=hidden name=array[] value =''>";
        } else {
            foreach ($agenda as $nombre => $telefono) {
                echo "<input type=hidden name= array[$nombre] value =$telefono>";
            }
        }
        tabla($agenda);
        echo' </form>';
        echo'</fieldset>';
        echo'<div style="clear:both ">';
        echo'</div>';
        ?>
    </body>
</html>
