<?php
$v = '';
$numerocontac = 0;
$array = array();

if($_REQUEST["btn"] =="Añadir Contacto") {
        
    error_reporting(E_ALL ^ E_NOTICE);
    $array = $_REQUEST['array'];
    
    if($_REQUEST["nombre"]=="" || $_REQUEST["telefono"]==""){
    $v = 'Debe añadir todos los datos';
       
    }else{
       $v='Añadido'; 
    
    error_reporting(E_ALL ^ E_NOTICE);
    
    
    $array[$_REQUEST["nombre"]] = $_REQUEST["telefono"];
        
       
       
    }
}else if($_REQUEST["btn"]=="Eliminar Contactos"){
 $array = array();
}else
{
    $array = array();
}

 $numerocontac = count($array);

function creartabla  ($array)
{
  echo' <h2>LISTADO DE CONTACTOS </h2>';
  echo' <table align="center" border="1"  width="750px">';
  echo' <thead>';
  echo' <tr>';
  echo' <th>Nombre</th>';
  echo' <th>Teléfono</th>';
  echo' </tr>';
  echo' </thead>';
  echo' <tbody>';
    foreach ($array as $nombre=>$telefono)
    {
         if($telefono!="") {     
            
        
     
       
      echo "<tr>";
      echo "<td>".$nombre."</td>";
      echo "<td>".$telefono."</td>";
      echo "</tr>";  
   }
    }
  echo' </tbody>';
  echo' </table>';
}

  if($numerocontac == 0){
                    $msg = ' Agenda sin contactos ';
                    $visible = 'disabled';
                } else{
      
 
                    $msg ='El numero de contactos es '.count($array);
                    $visible= 'enabled';
                }


echo'<div class="listado_contactos">';
  echo'<div class="center">LISTADO DE CONTACTOS</div>';
  echo'<hr>';
   echo' <div class="center">'.$msg.'  </div>';
echo'</div>';

echo'<fieldset>';
   echo' <legend>Nuevo Contacto</legend>';
   echo' <form action=agenda.php method="post">';
       echo' <br>';
        echo'<label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>';
        echo'<label for="telefono">Teléfono</label><input type="number" name="telefono" size="15"/><br/>';
        echo'<input type="submit" value="Añadir Contacto" name="btn">';
        echo'<input type="submit" value="Eliminar Contactos" name="btn" '.$visible.' >';
         if(empty($array)){      
                      echo "<input type=hidden name=array[] value =''>";      
              
            }else{
                 foreach ($array as $nombre => $telefono) {
                        echo "<input type=hidden name= array[$nombre] value =$telefono>";
                  } 
                }
creartabla($array);
           echo' </form>';
echo'</fieldset>';
echo'<div style="clear:both ">';
   echo'<hr/>';
    echo "<p style='color:red'>".$v."</p><br />";
   echo'</div>';
?>
