<?php
$agenda = $_POST['nombres'] ?? []; //si encuntra algun valor agrega, si no la inicializa un array
//if($agenda != ""){
//    $oculta= false;
//}else{
//    $oculta = false;
//} revisar los valores 
if (isset($_POST['submit'])) {//verifica que se haya presionado algun botón
    $nombre = filter_input(INPUT_POST, 'nombre');
    $numero = filter_input(INPUT_POST, 'numero');
    $op = filter_input(INPUT_POST, 'submit'); //recoge el valor del botón seleccionado
    
    switch ($op) {
        case 'agregar':
            if (!$nombre == "" && $numero == null) {//verifica que solo haya introducido el nombre para eliminarlo seguidamente

                foreach ($agenda as $nom => $telefono) {//recorre el array 
                    if ($nom == $nombre) {//compara los valores del array con el valor introducido, si encuentra el valor sigue a eliminarlo
                        $msj2 = "<script> alert('¡ Has eliminado a $nombre !');</script> ";
                        unset($agenda[$nombre]); //elimina los datos del indice nombre 
                    }//fin if comparar nombre de la agenda
                }//fin foreach
            } else if (!$nombre == "" && is_numeric($numero)) {//caso contrario Si, el nombre no está vacío y el teléfono no es numérico agreda el nombre y número en la agenda
                $agenda[$nombre] = $numero; //usa la variable nombre como índice y a ese indice se le agrega el valor número
                    } else {
                        
                        $msj = "<script> alert('Revisa los campos por favor');</script> ";
                        $agenda = $_POST['nombres'] ?? []; //tras emitir la alvertencia se guarda el array con los datos anteriores  
                    }
        break;

        case 'eliminar':
            header("location:Agenda.php"); //vuelve a cargar la página borrando todos los datos de la agenda
        break;
    }//fin del switch
}//fin if submit
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda </title>
        <style>
            body{
                background:white;    
            }
            .cabecera{
                background: #0E967C;
                color: white;
                width: 800px;
                margin-top: 50px;
                margin-left: 425px;
                text-align: center;
                border-radius: 23px;
            }
            fieldset{

                width: 800px;
                margin-left: 400px;
                padding: 30px;
                border-radius: 20px;
                
            }

            .botones{
                width: 800px;
                margin-left: 650px;
                display: block;

            }
            .botones input{
                margin: 25px;
            }
         
            .visualiza div{
                display: inline;
                margin-left: 100px;
            }
            div table {
                margin-left: 300px;
              
            }
            

        </style>

    </head>
    <body>
        <div id="padre">
            <div class="cabecera">
                <h1> Agenda de contactos </h1>
            </div>
            <div class="cuerpo">
                <form action="Agenda.php" method="POST">
                    <fieldset class="contacto"> <!--datos a introducir-->
                        <legend> Contacto </legend>

                        <label>Nombre<input type="text" value="" name="nombre"></label>
                        <br/>
                        <label>Teléfono<input type="text" value="" name="numero"></label>


                    </fieldset><!--datos a introducir-->
                    <div class="botones">

                        <input type="submit" value="agregar" name="submit">                        
                        <input type="submit" value="eliminar" name="submit">

                    </div>
                        <?php
                        foreach ($agenda as $nombre => $telefono) {
                            echo "<input type='hidden' name='nombres[$nombre]' value ='$telefono'>";
                        }
                        ?>                     

                </form>

                <fieldset class="visualiza">
                    <legend>listado contactos</legend>
                    <div class="datos">
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                            </tr>
                                <?php
                                foreach ($agenda as $nombre => $telefono) {
                                    echo "<tr><td>$nombre</td>  <td>$telefono</td></tr>";
                                }
                                ?>
                        </table>
                    </div> 
                </fieldset>
            </div>       
        </div>
            <?= $msj, $msj2 ?>

    </body>
</html>
