
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--
        Apunte 3 del profesor
            El estilo por separado en un archivo .CSS
        -->
         <link rel="stylesheet" href="estilo.css" type="text/css"/>
    </head>
    <body>
        <fieldset>
            <legend><h1>Juego MasterMind</h1></legend>
            <br>
            <h2> Tienes que averiguar una combinacion de 4 colores</h2>
            <br>
            <h2> Tienes 14 jugadas para lograrlo</h2>
            <br />
            <h2> Tras cada jugada se le indicara la cantidad de colores y posiciones acertados </h2>
            <br />
            <h2> Para acertar han de coincidir tanto los colores como sus posiciones</h2>
            <br />
            <form action="jugada.php" method="POST">
                <input type="submit" value="empezar" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend><h1>Mis requisitos</h1></legend>
            <br>
            <h2> Se ha de leer correctamente los valores seleccionados</h2>
            <br>
            <h2> Se ha de controlar que no se sobrepasen los intentos ni se repitan los colores</h2>
            <br />
            <h2> Se ha de indicar correctamente la cantidad de colores y posiciones acertados </h2>
            <br />
            <h2> Opciones de juego correctas </h2>
        </fieldset>
    </body>
</html>
