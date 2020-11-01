<?php

$oportunidades=$_GET["oportunidades"];

if (isset($oportunidades)){
    echo "<h1>He adivinado en $oportunidades intentos!</h1>";
}else{
    echo "<h1>He fallado porque no has sido sincero</h1>";
}
