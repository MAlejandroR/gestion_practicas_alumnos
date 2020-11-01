<!DOCTYPE html>
<!-- LISTA DE REQUISITOS QUE TIENE QUE HACER EL PROGRAMA
1. Generar una clave para el juego. La clave la genera la clase que lleva el mismo nombre.
   1.1. Creación de la clase Clave.
   1.2. Elaboración de la algoritmia necesaria en el constructor para construir la clave adecuadamente
   1.3. Tostring y otros métodos.
2. Crear el botón capaz de mostrar la clave anterior.
   2.1. Crear jugar.php.
   2.2. Implementar un switch case que de momento soló tendrá el case del botón "mostrar".
   2.3. Crear variable de sesión con la clave anterior.
   2.4. Dentro del case realizar la algoritmia necesaria para mostrar el código.
   2.5. Crear el formulario, incluso con los botones que todavía quedan por implementar.
3. Clase jugada
   3.1 Creación de la clase jugada.
   3.2. Realización del constructor necesario dentro de dicha clase para poder jugar cumpliendo las reglas del juego.
   3.3. Realización del constructor para comprobar si ha acertado o no el usuario
   3.4. Creación de tostring dentro de jugar.php
   3.5. Añadir un case dentro de jugar.php con el botón jugar, en el que se implementará lo anterior.
4. Reset
   4.1. Añadir al case de dentro de jugar uno para el reset con la algoritmia necesaria.
   4.2. Verificar que todas las aperturas y cierres de sesión del código son correctas.
5.Página fin.php
   4.1. Diseño de dicha página
   4.2. Colocación de headers en aquellos casos en los que es necesaria la redirección a fin.php
6. Testeo de la aplicación.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Juego mastermind</h1>
        <form action="jugar.php" method="post">
            <input type="submit" value="Iniciar" name="empezar"/>
        </form>
        <p>Alumno: LUIS ROYO ANTÍN</p>
    </body>
</html>
