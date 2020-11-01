<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
        $edad = rand(0,100);
        
        switch(true){
            case ($edad < 3): 
                echo "$edad Eres un bebe";
                break;
            case ($edad < 20):
                echo " $edad Eres un niño";
                break;
            case ($edad < 35):
                echo"$edad Eres Joven";
                break;
            case ($edad < 60):
                echo "$edad Eres adulto";
                break;
            case ($edad < 100):
                echo "$edad años, eres un jubilado";
                break;
            case ($edad < 200):
                echo "$edad años, es una edad no cotemplada en nuestra encuesta";
                break;   
        }  
        ?>
        <br>
        <a href="seleccion.php">Probar otra edad</a>
        <br>
        <a href="index.php">Volver</a>

    </body>
</html>