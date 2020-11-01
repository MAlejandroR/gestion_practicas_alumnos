<?php

$num= rand (1,100);
$msj="";
if($num%2===0){
    $msj=" par";
}else{
    $msj=" impar";
}
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
<?php 
echo "el numero $num es ";
echo $msj;
 header("Refresh:3; url=index.php");
?>
    </body>
</html>
