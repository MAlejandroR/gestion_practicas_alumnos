<?php
    $eliminar = "disabled";
    switch ($_POST['enviar']) {
        case 'add':
            $agenda = $_POST['agenda'];
            
            $nombre = filter_input(INPUT_POST, 'nombre');//asignamos los valores
            $telefono = filter_input(INPUT_POST, 'telefono');
            
            
            if(array_key_exists($nombre, $agenda)){//comprobamos existencia del nombre
                if(($telefono)==""){
                    //Si el num de telefono es nulo se borra del array
                    unset($agenda[$nombre]);    //Esto solo borra el telefono y no el nombre
                    $mensaje = "Se ha borrado el contacto $nombre";
                }else{
                    //Si no es nulo se actualiza el numero de telefono
                    $agenda[$nombre]=$telefono;
                    $mensaje = "Se ha actualizado ese contacto";
                }
                
            }else{
                //Si el nombre no existe todavia en la agenda
                if($nombre==""){
                    //Si el nombre es nulo no lo dejara añadir a la agenda
                    $mensaje = "El nombre no puede estar vacío";
                }else{
                    //Si el nombre es correcto habrá que comprobar el telefono
                    if(is_numeric($telefono)){
                        $agenda[$nombre] = $telefono;
                        $mensaje = "Contacto añadido exitosamente";
                    }else{
                        $mensaje = "El telefono solo puede contener numeros o no "
                                . "puede estar vacío";
                    }
                }
            }
            $eliminar = "";
            break;
        case 'remove':
            /**No hace falta hacer nada, Antes de añadir se lee el array, si no se hace, 
             * el array se borra de forma automatica */
            break;
    }

?>