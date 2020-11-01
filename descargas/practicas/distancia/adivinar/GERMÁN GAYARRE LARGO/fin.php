<?php
 

$solucion = filter_input(INPUT_GET, 'solucion');
 
 
$solucion = $_GET['solu'];
 * 
 */
?>
 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fin de juego</title>
    </head>
    <body>
      <?php
       if ($solu = true) {
    
    <p>'he acertado!'</p>
} else {
    <p>'se han acabado los intentos :('</p>
}
?>

<form action=""<?PHP echo $_SERVER['PHP_SELF']?> method="GET">
     <input type="submit" value="reiniciar" name="enviar">
     </form>
     <?php
if ($_GET["submit"] ) {
    header("Location:index.php");
    exit();
       ?>
        

    </body>
</html>