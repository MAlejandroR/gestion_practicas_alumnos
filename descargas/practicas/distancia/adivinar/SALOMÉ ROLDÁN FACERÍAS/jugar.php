<?php 

//Primero leemos las variables Index
$num_intentos_static = filter_input(INPUT_POST, 'num_intentos'); 
$num_intentos = filter_input(INPUT_POST, 'num_intentos'); 
$clicks=0;
$msjeFin="";
$msj="";
//Inicializamos las variables Jugar
$array = array();


//$jugada= 0;
$max=  $num_intentos_static;
$min= 1;
$num_rand=rand ($min ,$max );
$num= pow(2, $num_rand);


if (isset($_POST['submit'])) {
    
    $clicks=++$_POST['num_intentos_cont']; 
    $num_intentos=--$_POST['num_intentos_index']; 
    $num_intentos_static=$_POST['num_intentos_static'];
    $num=$_POST['num']; 
    $max=$_POST['max']; 
    $min=$_POST['min']; 
      for ($x = 1; $x <= $num_intentos_static; $x++)
      {
          $array[] = $x;    
      }
    $num_rand=$_POST['num_rand']; 
    $posicion=array_search($num_rand, $array);
    switch ($_POST['submit']) { 
        case "jugar" :
            if($num_intentos>=1){
                if(isset($_POST['rtdo'])) {
                    if($_POST['rtdo'] == 'mayor'){
                        $min_nuevo=$posicion+1;
                        $num_rand=rand ($min_nuevo ,$max );
                        $num= pow(2, $num_rand);
                        $min=$min_nuevo;
                    }
                    else 
                        if($_POST['rtdo'] == 'menor'){
                        $max_nuevo=$posicion+1;
                        $num_rand=rand ($min ,$max_nuevo );
                        $num= pow(2, $num_rand);
                        $max=$max_nuevo;
                        }
                    else
                        if($_POST['rtdo'] == 'igual'){
                            $msjeFin= " Ves que listo que soy !!!!! :). En $clicks jugadas!!!";
                            header("Location:fin.php?mensaje=$msjeFin");
                        }
                    
                } else{
                   
    $num_rand=rand ($min ,$max );
     $num= pow(2, $num_rand);
                }
            }else{
                //supera los intentos
                $msjeFin= "No has sido sincero!!!:( Tenias $num_intentos_static intentos  ";
                header("Location:fin.php?mensaje=$msjeFin");
            }
            break;
        case "reiniciar" :
            $num_intentos=$num_intentos_static;
            $max=$num_intentos_static;
            $min= 1;
            $num_rand=rand ($min ,$max );
            $num= pow(2, $num_rand);
            $clicks=0;

            break;
        case "volver" :
            header('Location: index.php');
            break; 
        default: $msj = "No has seleccionado ninguna opción"; 
            break; 
        } 
}
else $msj="Inicializamos click por haber accedido a la página escribiendo su solicitud en la url"; 

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="width: 60%;float:left;margin-left: 20%;">

    <fieldset style="width:40%;">
        <legend>Empieza el juego</legend>
        <form action="jugar.php" method="POST" >
            <h2> El número es <?php echo $num ?> ?</h2>
            <h5> Jugadas realizadas <?php echo $clicks ?>  Jugadas restantes <?php echo $num_intentos ?>   </h5>
            <fieldset>
                <legend>Indica cómo es el número qué has pensado</legend>
                <input type="radio" name="rtdo" value='mayor' checked> Mayor<br />
                <input type="radio" name="rtdo" value='menor'> Menor<br />
                <input type="radio" name="rtdo" value='igual'> Igual<br />
            </fieldset>
            <hr/>
            <input type="submit" value="jugar" name="submit" >
            <input type="submit" value="reiniciar" name="submit"  >
            <input type="submit" value="volver" name="submit" >
            <input type="hidden" value="<?php echo $clicks ?>" name="num_intentos_cont">
            <input type="hidden" value="<?php echo $num_intentos ?>" name="num_intentos_index">
            <input type="hidden" value="<?php echo $num_intentos_static ?>" name="num_intentos_static">
            <input type="hidden" value="<?php echo $num ?>" name="num">
            <input type="hidden" value="<?php echo $max ?>" name="max">
            <input type="hidden" value="<?php echo $min ?>" name="min">
            <input type="hidden" value="<?php echo $num_rand ?>" name="num_rand">
        </form>
    </fieldset>
</body>
</html>
