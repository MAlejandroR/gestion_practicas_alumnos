<?php
$i=0;
$suma=0;
while($i!=100){
    if($i%2==0){
        
        $suma=$suma+$i;
               
    }$i++; 
}
echo "La suma es de: ". $suma;
header("Refresh:2; url=index.php");

?>
