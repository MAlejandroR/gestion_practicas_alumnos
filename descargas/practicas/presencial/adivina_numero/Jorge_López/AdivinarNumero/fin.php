<?php

$oportunidades=$_GET["oportunidades"];

if (isset($oportunidades)){
    echo "<h1>Has acertado en $oportunidades!!!</h1>";
}else{
    echo "<h1>He fallado porque no has sido sincero</h1>";
}

